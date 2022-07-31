<div class="container">
  <?php

  use app\utils\Views;

  $suggestions = \app\controllers\SuggestController::index();
  ?>


  <h1>Bienvenido <?= getSession('user.name'); ?> </h1>

  <!-- list suggestion -->
  <div>
    <h2>Sugerencias de los usuarios</h2>

    <ul>
      <?php
      if (isset($suggestions) && $suggestions != null) {
        foreach ($suggestions as $suggestion) { ?>
          <li>
            <?= $suggestion['first_name']; ?>
            <?= $suggestion['last_name']; ?>
            <?= $suggestion['email']; ?>
            <?= $suggestion['phone']; ?>
            <?= $suggestion['comment']; ?>
            <?= $suggestion['business_id']; ?>
          </li>
      <?php }
      } else {
        echo "<p>Aun No hay sugerencias</p>";
      } ?>
    </ul>
  </div>

</div>