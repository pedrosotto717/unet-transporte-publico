<?php

require __DIR__ . '/../app/utils/Autoload.php';

$app = new \app\utils\Application();

$app->router->get("/admin", [\app\controllers\AdminController::class, "index"]);

$app->router->get("/", function ($params) {
  return require_once __DIR__ . '/../views/home.php';
});


$app->run();
