<?php

namespace app\controllers;

use app\utils\Request;
use app\utils\Views;

class BusinessController
{
  public static function index($uriParams = null)
  {
    try {
      $DB = new \app\utils\DataBase();
      $query = $DB->query("SELECT * FROM business");

      if ($query->rowCount() > 0) {
        $businesses = $query->fetchAll();
        return $businesses;
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

      // insert into business table name 
      $query = $DB->query("INSERT INTO business (name) VALUES (:name)", [
        'name' => $request->name
      ]);

      if ($query->rowCount() > 0) {
        return Views::render("dashboard", [
          "success" => [
            "Empresa Agregada"
          ]
        ]);
      } else {
        return Views::render("dashboard", [
          "errors" => [
            "Error al Crear Empresa"
          ]
        ]);
      }
    } catch (\Throwable $th) {
      dump($th);
    }
  }
}
