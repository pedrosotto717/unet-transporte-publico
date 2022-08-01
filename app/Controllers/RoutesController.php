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

      $query = $DB->query("SELECT R.id, R.price, B.name as business, 
              PS.street as start_street, PS.name as start_place_name,
              PF.street as finish_street, PF.name as finish_place_name 
              FROM routes R 
              JOIN places PS 
              join places PF
              join business B 
              ON R.start = PS.id
              and R.finish = PF.id 
              and B.id = R.business_id;");

      if ($query->rowCount() > 0) {
        $routes = $query->fetchAll();
        return $routes;
      } else {
        return [];
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

  public static function getRoutesByBusiness($id)
  {
    try {
      $DB = new \app\utils\DataBase();
      $query = $DB->query("SELECT * FROM routes");

      // select routes by business_id
      $query2 = $DB->query("SELECT * FROM routes WHERE business_id = :business_id", [
        'business_id' => $id
      ]);

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

  public function getRoutesByPlaces()
  {
    try {
      $DB = new \app\utils\DataBase();
      $request = Request::getBody();

      $query = $DB->query("
            select  r.id as route_id , price, b.name as business, p.name as start_place_name, p.street as start_place_street,
            p2.name as finish_place_name, p2.street as finish_place_street
            from routes r join business b on r.business_id = b.id 
            join places p on r.`start` = p.id join places p2 on r.finish = p2.id 
            where r.id in ((select routes_id from places_on_the_route potr where potr.places_id = :point)
            union
            (select r.id from routes r where r.`start` = :point)
            union
            (select r.id from routes r where r.finish = :point)) ", [
        'point' => $request->point_id,
      ]);

      if ($query->rowCount() > 0) {
        $routes = $query->fetchAll();

        if (count($routes) > 0) {
          $routes["places_on_the_route"] = [];

          foreach ($routes as $route) {
            if (isset($route['route_id'])) {
              $points = $DB->query(
                "
                select p.street, p.name, potr.places_id 
                from places_on_the_route potr join places p on p.id = potr.places_id where potr.routes_id = :id
            ",
                [
                  'id' => $route['route_id']
                ]
              );

              $points = $points->fetchAll();

              $routes["places_on_the_route"][] = $points;
            }
          }

          return Views::render("home", [
            "routes" => $routes
          ]);
        } else {
          return Views::render("home");
        }
      } else {
        return Views::render("home");
      }
    } catch (\Throwable $th) {
      dump($th);
      return null;
    }
  }
}
