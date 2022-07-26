<?php

use app\utils\Views;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php Views::include("head", [
    "title" => "Dashboard"
  ]); ?>
</head>

<body>
  <?php Views::include("header"); ?>

  <div class="container container--dashboard">
    <h1 class="dashboard__title">¡Hola <?= getSession('user.name'); ?>! </h1>

    <?php
    if (isAuthenticated() && isAdmin())
      Views::include("dashboard-admin");
    else if (isAuthenticated())
      Views::include("dashboard-employee");
    ?>
  </div>

  <?php Views::include("footer"); ?>
  <?php Views::include("scripts"); ?>
</body>

</html>