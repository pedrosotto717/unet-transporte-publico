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
      <h3>Haznos saber tus Sugerencias</h3>
      <?php Views::include("create-suggest"); ?>
    </div>
  </div>
</body>

</html>