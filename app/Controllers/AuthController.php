<?php

namespace app\controllers;

use app\utils\Request;
use app\utils\Views;

class AuthController
{
    public function auth()
    {
        $DB = new \app\utils\DataBase();
        $request = Request::getBody();

        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL))
            return Views::render('login', ['errors' => [
                'email' => 'Invalid Email',
            ]]);

        if (!(strlen($request->password) > 8))
            return Views::render('login', ['errors' => [
                'password' => 'Password must be at least 8 characters long'
            ]]);

        $query = $DB->query("SELECT * FROM users WHERE email = :email", [
            'email' => $request->email
        ]);

        var_dump($query->fetchAll());
    }
    public function logout($uriParams = null)
    {
        var_dump("Este es el Admin Controller");
    }
}
