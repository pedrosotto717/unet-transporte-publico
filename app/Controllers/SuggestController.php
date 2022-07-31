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
      $query = $DB->query("
            SELECT us.comment, us.first_name, us.last_name, us.email, us.phone, us.business_id  as bussiness 
            from user_suggest us  where business_id is null union
            
            (SELECT U.comment as comment, U.first_name as first_name, U.last_name as last_name, 
            U.email as email, U.phone as phone, B.name as bussiness 
            FROM user_suggest U JOIN business B ON U.business_id = B.id)
        ");

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

      // insert into user table first_name, last_name, email, phone, comment, business_id
      $query = $DB->query("INSERT INTO user_suggest (first_name, last_name, email, phone, comment, business_id) VALUES (:first_name, :last_name, :email, :phone, :comment, :business_id)", [
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'phone' => $request->phone,
        'comment' => $request->comment,
        'business_id' => $request->business_id
      ]);

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
