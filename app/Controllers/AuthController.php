<?php

namespace app\controllers;

use app\utils\Request;
use app\utils\Views;

class AuthController
{
    public function auth()
    {
        try {
            $DB = new \app\utils\DataBase();
            $request = Request::getBody();

            $query = $DB->query("SELECT * FROM users WHERE email = :email", [
                'email' => $request->email
            ]);

            if ($query->rowCount() > 0) {
                $user = $query->fetch();
                if (password_verify($request->password, $user->password)) {
                    $_SESSION['user'] = $user;
                    header('Location: /');
                } else {
                    return Views::render('login', [
                        'errors' => [
                            'Password is incorrect'
                        ]
                    ]);
                }
            } else {
                return Views::render('login', [
                    'errors' => [
                        'User not found'
                    ]
                ]);
            }
        } catch (\Throwable $th) {
            dump($th);
        }
    }
    public function logout($uriParams = null)
    {
        var_dump("Este es el Admin Controller");
    }
}
