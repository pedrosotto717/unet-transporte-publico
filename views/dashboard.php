<?php

use app\utils\Views;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php Views::include("head", [
    "title" => ""
  ]); ?>
</head>

<body>
  <?php Views::include("header"); ?>

  <div class="container">
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