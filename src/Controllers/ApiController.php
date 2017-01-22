<?php

namespace Controllers;
use Helper\JsonResponse;

class ApiController
{
    public function user()
    {
        $allowSortBy = [
            'firstName',
            'lastName',
            'email',
            'role',
            'department',
        ];

        $orderBy = $_GET['orderby'];
        // if (!in_array($orderBy, $allowSortBy)) {
        //     echo 'error';
        //     exit;
        // }
        $userModel = new \Models\User;
        $users = $userModel->getUsers($orderBy);
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


