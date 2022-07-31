<?php

namespace app\controllers;

use app\utils\Request;
use app\utils\Views;

class RoutesController
{
  public static function index()
  {
    try {
      $DB = new \app\utils\DataBase();
      $query = $DB->query("SELECT * FROM routes");

      if ($query->rowCount() > 0) {
        $routes = $query->fetchAll();
        return $routes;
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

      $request->business_id = (int) $request->business_id;
      $request->places_start_id = (int) $request->places_start_id;
      $request->places_finish_id = (int) $request->places_finish_id;
      $request->price = (float) $request->price;

      // insert into route table name, business_id, place_id, price
      $query = $DB->query("INSERT INTO routes (business_id, start, finish, price) VALUES (:business_id,  :start, :finish, :price)", [
        'business_id' =>  $request->business_id,
        'start' => $request->places_start_id,
        'finish' => $request->places_finish_id,
        'price' => $request->price
      ]);

      if ($query->rowCount() > 0) {
        $routeId = $DB->lastInsertId();

        foreach ($request->places_and_routes as $place_and_route) {
          $query = $DB->query("INSERT INTO places_on_the_route (routes_id, places_id) VALUES (:routes_id, :places_id)", [
            'routes_id' => $routeId,
            'places_id' => $place_and_route
          ]);
        }

        return Views::render("dashboard", [
          "success" => [
            "Ruta Agregada"
          ]
        ]);
      } else {
        return Views::render("dashboard", [
          "errors" => [
            "Error al Crear Ruta"
          ]
        ]);
      }
    } catch (\Throwable $th) {
      dump($th);
    }
  }
}
