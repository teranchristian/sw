<?php

namespace Controllers;
use Helper\JsonResponse;

class ApiController
{

    public function user($id = null)
    {
        $userModel = new \Models\User;
        $users = $userModel->getUsers();
        $response = [
            'users' => $users,
            'total' => count($users)
        ];
        echo JsonResponse::responseSuccess($response);
    }
}


