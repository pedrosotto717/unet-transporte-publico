<?php
$places = \app\controllers\PlaceController::index();
?>

<h3 class="home__title">¡Busca las rutas por un punto de la ciudad!</h3>

<form action="/routes-search" method="POST">
    <select class="form-control chosen-select" id="business_id" name="point_id">
        <option value="">Seleccione un punto</option>
        <?php foreach ($places as $place) {
            if ($place['name'] != null) { ?>
                <option value="<?= $place['id'] ?>">
                    <?= $place['name'] ?> <?= $place['street'] ?></option>
            <?php }
        } ?>
    </select>

    <input type="submit" value="Buscar">
</form>

<?php
if (count($routes) > 0) {
//    dump($routes);
}
?>