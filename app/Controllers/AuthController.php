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
                $user = (object) $query->fetch();
                if (password_verify($request->password, $user->password)) {
                    unset($user->password);
                    startSession();
                    setSession("user", [
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                        'role' => $user->role
                    ]);
                    return Views::render("dashboard");
                } else {
                    return Views::render("login", [
                        "errors" => [
                            "Password incorrect"
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
        endSession();
        unset($_COOKIE['PHPSESSID']);
        redirect("/");
    }
}
