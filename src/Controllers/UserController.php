<?php

namespace Controllers;


class UserController
{
    public function index()
    {
        return render('index', [
            'message' => 'test',
        ]);
    }

    public function user($id = null)
    {
        $userModel = new \Models\User;
        $users = $userModel->getUsers();
        var_dump($users);
        exit;
    }
}


