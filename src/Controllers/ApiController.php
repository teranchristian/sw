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

        $orderBy = getParameter($_GET['orderby']);
        $sortBy = getParameter($_GET['sortBy']);

        if (isset($sortBy) && !in_array($sortBy, ['ASC', 'DESC'])) {
            echo 'error';
            exit;
        }

        if (isset($orderBy) && !in_array($orderBy, $allowSortBy)) {
            echo 'error';
            exit;
        }

        $userModel = new \Models\User;
        $users = $userModel->getUsers($orderBy, $sortBy);
        $response = [
            'users' => $users,
            'total' => count($users)
        ];
        echo JsonResponse::responseSuccess($response);
    }

    private function mapFields($field)
    {

    }
}


