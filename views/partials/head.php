<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>
  <?php

  use app\utils\Views;

  if (isset($title)) {
    echo $title;
  } else {
    echo "Home";
  } ?>
</title>

<?php Views::include("styles"); ?>