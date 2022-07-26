<?php

use app\utils\Views;

require __DIR__ . '/../app/utils/Autoload.php';

$app = new \app\utils\Application();

$app->router->get("/admin", [\app\controllers\AdminController::class, "index"]);

$app->router->get("/", function ($params) {
  return Views::render("home");
});

$app->router->get("/login", function ($params) {
  return Views::render("login");
});

$app->router->post("/auth", [\app\controllers\AuthController::class, "auth"]);


$app->run();
