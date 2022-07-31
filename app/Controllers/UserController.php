<?php

namespace app\controllers;

use app\utils\Request;
use app\utils\Views;

class UserController
{

  public static function index($uriParams = null)
  {
    try {
      $DB = new \app\utils\DataBase();
      $query = $DB->query("SELECT * FROM users");

      if ($query->rowCount() > 0) {
        $users = $query->fetchAll();
        return $users;
      } else {
        return null;
      }
    } catch (\Throwable $th) {
      dump($th);
      return null;
    }
  }

  public function store($uriParams = null)
  {
    try {
      isAuthenticated();

      $DB = new \app\utils\DataBase();
      $request = Request::getBody();

      if ($this->verifyUser($request->email)) {
        return Views::render("dashboard", [
          "errors" => [
            "users" => "El usuario ya existe"
          ]
        ]);
      }

      // insert into user table name, email, password
      $query = $DB->query("INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, :role)", [
        'name' => $request->name,
        'email' => $request->email,
        'password' => password_hash($request->password, PASSWORD_DEFAULT),
        'role' => 'EMPLOYEE'
      ]);

      if ($query->rowCount() > 0) {
        return Views::render("dashboard", [
          "success" => [
            "Usuario Agregado"
          ]
        ]);
      } else {
        return Views::render("dashboard", [
          "errors" => [
            "Error al Crear Usuario"
          ]
        ]);
      }
    } catch (\Throwable $th) {
      dump($th);
    }
  }

  // verify if user already exists
  public static function verifyUser($email)
  {
    try {
      $DB = new \app\utils\DataBase();
      $query = $DB->query("SELECT * FROM users WHERE email = :email", [
        'email' => $email
      ]);

      if ($query->rowCount() > 0) {
        return true;
      } else {
        return false;
      }
    } catch (\Throwable $th) {
      dump($th);
      return false;
    }
  }
}
