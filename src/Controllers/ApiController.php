<?php

namespace Controllers;
use Helper\JsonResponse;

class ApiController
{

    private $db = null;

    function __construct()
    {
        $this->db = new \Helper\DatabaseConnection();
    }

    public function user($request = null, $id = null,  $orderBy = null, $sortBy = null)
    {
        $allowSortBy = [
            'first_name',
            'last_name',
            'email',
            'role',
            'department',
        ];

        var_dump($request);
        exit;
        $userModel = new \Models\User($this->db);

        if (isset($id)) {
            if (!isset($id) && !is_integer($id)) {
                echo JsonResponse::responseError("'id' parameter invalid");
            }
            $user = $userModel->getUser($id);
            $response = [
                'user' => $user,
            ];
        } else {
            if (isset($orderBy) && !in_array($orderBy, $allowSortBy)) {
                echo JsonResponse::responseError("'orderBy' parameter invalid");
            }

            if (isset($sortBy) && !in_array($sortBy, ['ASC', 'DESC'])) {
                echo JsonResponse::responseError("'orderBy' parameter invalid");
            }
            $users = $userModel->getUsers($orderBy, $sortBy);

            $response = [
                'users' => $users,
                'total' => count($users)
            ];
        }

        echo JsonResponse::responseSuccess($response);
    }
}
