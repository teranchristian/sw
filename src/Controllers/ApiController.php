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

    public function user()
    {
        $allowSortBy = [
            'first_name',
            'last_name',
            'email',
            'role',
            'department',
        ];

        $orderBy = getParameter($_GET['orderBy']);
        if (isset($orderBy) && !in_array($orderBy, $allowSortBy)) {
            echo JsonResponse::responseError("'orderBy' parameter invalid");
        }

        $sortBy = getParameter($_GET['sortBy']);
        if (isset($sortBy) && !in_array($sortBy, ['ASC', 'DESC'])) {
            echo JsonResponse::responseError("'orderBy' parameter invalid");
        }

        $userModel = new \Models\User($this->db);
        $users = $userModel->getUsers($orderBy, $sortBy);
        $response = [
            'users' => $users,
            'total' => count($users)
        ];
        echo JsonResponse::responseSuccess($response);
    }

}


