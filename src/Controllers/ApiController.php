<?php

namespace Controllers;
use Helper\JsonResponse;

class ApiController
{
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
            JsonResponse::responseError("'orderBy' parameter invalid");
        }

        $sortBy = getParameter($_GET['sortBy']);
        if (isset($sortBy) && !in_array($sortBy, ['ASC', 'DESC'])) {
            JsonResponse::responseError("'orderBy' parameter invalid");
        }


        $userModel = new \Models\User;
        $users = $userModel->getUsers($orderBy, $sortBy);
        $response = [
            'users' => $users,
            'total' => count($users)
        ];
        JsonResponse::responseSuccess($response);
    }

    private function mapFields($field)
    {

    }
}


