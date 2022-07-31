<?php
$businesses = \app\controllers\BusinessController::index();
$places = \app\controllers\PlaceController::index();
?>


<form action="/routes" method="post">
  <div class="form-group">
    <label for="name">Precio</label>
    <input type="number" class="form-control" name="price" placeholder="precio">
  </div>


  <div class="form-group">
    <label for="business_id">Empresas</label>
    <select class="form-control chosen-select" id="business_id" name="business_id">
      <option value="">Seleccione una empresa</option>
      <?php foreach ($businesses as $business) { ?>
        <option value="<?= $business['id'] ?>">
          <?= $business['name'] ?></option>
      <?php } ?>
    </select>
  </div>

  <div class="form-group">
    <label for="places_start_id">Inicio de ruta</label>
    <select class="chosen-select" id="places_start_id" name="places_start_id">
      <option value="">Seleccione un lugar</option>
      <?php foreach ($places as $place) { ?>
        <option value="<?= $place['id'] ?>">
          <?= $place['name'] ?></option>
      <?php } ?>
    </select>
  </div>

  <div class="form-group">
    <label for="places_finish_id">Punto de fin</label>
    <select class="chosen-select" id="places_finish_id" name="places_finish_id">
      <option value="">Seleccione un lugar</option>
      <?php foreach ($places as $place) { ?>
        <option value="<?= $place['id'] ?>">
          <?= $place['name'] ?></option>
      <?php } ?>
    </select>
  </div>


  <div class="form-group">
    <label for="places_and_routes">Lugares Intermedios</label>
    <select class="chosen-select places_and_routes" id="places_and_routes" name="places_and_routes[]" multiple>
      <option value="">Seleccione uno o varios lugares</option>
      <?php foreach ($places as $place) { ?>
        <option value="<?= $place['id'] ?>">
          <?= $place['name'] ?></option>
      <?php } ?>
    </select>
  </div>


  <input type="submit" class="btn btn-primary" value="Crear">
</form>