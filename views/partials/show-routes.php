<?php
$routes = \app\controllers\RoutesController::index();
?>

<table class="table">
  <!-- Table: id, name,  -->
  <thead>
    <tr>
      <th>Precio</th>
      <th>Empresa</th>
      <th>Inicio</th>
      <th>Final</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($routes as $route) { ?>
      <tr>
        <td><?= $route['price'] ?></td>
        <td><?= $route['business'] ?></td>

        <td>
          <?= $route['start_street'] ?>
          <br>
          <?= $route['start_place_name'] ?>
        </td>

        <td>
          <?= $route['finish_street'] ?>
          <br>
          <?= $route['finish_place_name'] ?>
        </td>

      </tr>
    <?php } ?>
  </tbody>
</table>