<?php
$businesses = \app\controllers\BusinessController::index();

?>

<div class="container--suggest">
  <form class="suggest-form" action="/suggest" method="post">

    <div class="form-group">
      <label for="first_name">Nombre</label>
      <input type="text" class="form-control" name="first_name" placeholder="Nombre">
    </div>

    <div class="form-group">
      <label for="last_name">Apellido</label>
      <input type="text" class="form-control" name="last_name" placeholder="Apellido">
    </div>

    <div class="form-group">
      <label for="email">Correo Electronico</label>
      <input type="email" class="form-control" name="email" placeholder="Correo Electronico">
    </div>

    <div class="form-group">
      <label for="phone">Telefono</label>
      <input type="text" class="form-control" name="phone" placeholder="Telefono">
    </div>


    <div class="form-group">
      <label for="business_id">Empresa <span class="small">(opcional)</span></label>
      <select class="form-control chosen-select" id="business_id" name="business_id">
        <option value="">Seleccione una empresa</option>
        <?php foreach ($businesses as $business) { ?>
          <option value="<?= $business['id'] ?>">
            <?= $business['name'] ?></option>
        <?php } ?>
      </select>
    </div>

    <div class="form-group">
      <label for="comment">Comentario</label>
      <textarea class="form-control" name="comment" placeholder="Comentario"></textarea>
    </div>


    <input type="submit" class="btn btn-primary">

  </form>
  <h3>Haznos saber tus Sugerencias</h3>

</div>