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

}


