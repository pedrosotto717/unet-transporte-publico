<?php
//get places from PlaceController
$places = \app\controllers\PlaceController::index();
$businesses = \app\controllers\BusinessController::index();
$users = \app\controllers\UserController::index();
?>
<section>
  <?php

  use app\utils\Views;

  if (!isset($_SESSION['user'])) {
    http_response_code(401);
    redirect("login");
  }
  ?>

  <h1>Hello <?= getSession('user.name'); ?> </h1>
  <p>
    <?= getSession('user.email'); ?>
  </p>
  <a href="/logout">Logout</a>
</section>

<div>
  <h2>Personal de la Alcaldia</h2>
  <?php Views::include("create-users"); ?>
  <div>
    <?php if (isset($errors['users'])) {
      echo $errors['users'];
    } ?>
  </div>
  <ul>
    <?php foreach ($users as $user) { ?>
      <li>
        <?= $user['name']; ?>
      </li>
    <?php } ?>
</div>

<section>
  <h2>Create Business</h2>
  <?php Views::include("create-business"); ?>
  <div>
    <div>
      <?php if (isset($businesses) && $businesses != null) { ?>
        <ul>
          <?php foreach ($businesses as $business) { ?>
            <li>
              <?= $business['name']; ?>
            </li>
          <?php } ?>
        </ul>
      <?php } ?>
    </div>
  </div>
</section>

<section>
  <h2>Create Place</h2>
  <?php Views::include("create-place"); ?>

  <div>
    <?php if (isset($places) && $places != null) { ?>
      <ul>
        <?php foreach ($places as $place) { ?>
          <li>
            <?= $place['name']; ?> <strong> <?= $place['street'] ?> </strong>
          </li>
        <?php } ?>
      </ul>
    <?php } ?>
  </div>

</section>


<div class="form-container">
  <h2>Agregue Rutas</h2>
  <?php Views::include("create-routes"); ?>
</div>