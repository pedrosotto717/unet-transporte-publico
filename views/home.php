<?php

use app\utils\Views; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php Views::include("head"); ?>
</head>

<body>
  <?php Views::include("header"); ?>

  <div class="container">
    <div class="form-container">

      <?php Views::include("create-suggest"); ?>
    </div>
    <div class="show-routes">
      <?php Views::include("show-routes"); ?>
    </div>

      <div class="search-routes">
          <?php Views::include("search-routes", [
              'routes' => $routes ?? []
          ]); ?>
      </div>
  </div>
</body>

</html>