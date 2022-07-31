<?php

namespace app\controllers;

use app\utils\Request;
use app\utils\Views;

class SuggestController
{
  public static function index($uriParams = null)
  {
    try {
      $DB = new \app\utils\DataBase();
      $query = $DB->query("SELECT * FROM user_suggest");

      if ($query->rowCount() > 0) {
        $suggestions = $query->fetchAll();
        return $suggestions;
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
      $DB = new \app\utils\DataBase();
      $request = Request::getBody();

      if (isset($request->business_id)) {
        $query = $DB->query("INSERT INTO user_suggest (first_name, last_name, email, phone, comment) VALUES (:first_name, :last_name, :email, :phone, :comment)", [
          'first_name' => $request->first_name,
          'last_name' => $request->last_name,
          'email' => $request->email,
          'phone' => $request->phone,
          'comment' => $request->comment,
        ]);
      } else {
        $query = $DB->query("INSERT INTO user_suggest (first_name, last_name, email, phone, comment, business_id) VALUES (:first_name, :last_name, :email, :phone, :comment, :business_id)", [
          'first_name' => $request->first_name,
          'last_name' => $request->last_name,
          'email' => $request->email,
          'phone' => $request->phone,
          'comment' => $request->comment,
          'business_id' => isset($request->business_id) ? $request->business_id : null
        ]);
      }

      // insert into user table first_name, last_name, email, phone, comment, business_id

      if ($query->rowCount() > 0) {
        return Views::render("home", [
          "success" => [
            "Sugerencia Agregada"
          ]
        ]);
      } else {
        return Views::render("home", [
          "errors" => [
            "Sugerencia no Agregada"
          ]
        ]);
      }
    } catch (\Throwable $th) {
      dump($th);
      return null;
    }
  }
}
