<?php

namespace app\controllers;

use app\utils\Request;
use app\utils\Views;

class PlaceController
{
  public static function index()
  {
    try {
      $DB = new \app\utils\DataBase();
      $query = $DB->query("SELECT * FROM places");

      if ($query->rowCount() > 0) {
        $places = $query->fetchAll();
        return $places;
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

      // insert into place table name, street 
      $query = $DB->query("INSERT INTO places (name, street) VALUES (:name, :street)", [
        'name' => $request->name,
        'street' => $request->street
      ]);

      if ($query->rowCount() > 0) {
        return Views::render("dashboard", [
          "success" => [
            "Lugar Agregado"
          ]
        ]);
      } else {
        return Views::render("dashboard", [
          "errors" => [
            "Error al Crear Lugar"
          ]
        ]);
      }
    } catch (\Throwable $th) {
      dump($th);
    }
  }
}
