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
if (count($routes) > 0) :



    dump($routes);

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
            <?php foreach ($routes as $route) :
                if (isset($route['route_id'])) :
            ?>
                    <tr>
                        <td><?= $route['price'] ?></td>
                        <td><?= $route['business'] ?></td>

                        <td>
                            <?= $route['start_place_street'] ?>
                            <br>
                            <?= $route['start_place_name'] ?>
                        </td>

                        <td>
                            <?= $route['finish_place_street'] ?>
                            <br>
                            <?= $route['finish_place_name'] ?>
                        </td>

                    </tr>
            <?php
                endif;
            endforeach;
            ?>
        </tbody>
    </table>

<?php endif; ?>

<br>
<br>
<br>