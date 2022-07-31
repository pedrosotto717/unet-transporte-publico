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
    <div>
      <?php Views::include("show-routes"); ?>
    </div>
  </div>
</body>

</html>