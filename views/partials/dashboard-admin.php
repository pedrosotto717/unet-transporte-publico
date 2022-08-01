<?php
//get places from PlaceController
$places = \app\controllers\PlaceController::index();
$businesses = \app\controllers\BusinessController::index();
$users = \app\controllers\UserController::index();



use app\utils\Views;

if (!isset($_SESSION['user'])) {
  http_response_code(401);
  redirect("login");
}
?>

<div class="dashboard">
    <div class="dashboard__card">
        <h2>Personal de la Alcaldia</h2>
        <?php Views::include("create-users"); ?>
        <div>
            <?php if (isset($errors['users'])) {
                echo $errors['users'];
            } ?>
        </div>
        <ul>
<!--            --><?php //foreach ($users as $user) { ?>
<!--                <li>-->
<!--                    --><?//= $user['name']; ?>
<!--                </li>-->
<!--            --><?php //} ?>
        </ul>
    </div>

    <section class="dashboard__card">
        <h2>Crear Empresas</h2>
        <?php Views::include("create-business"); ?>
        <div>
            <h3>Empresas existentes</h3>
            <div class="card-items">
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

    <section class="dashboard__card">
        <h2>Crear Lugar</h2>
        <?php Views::include("create-place"); ?>
        <h3>Lugares existentes</h3>

        <div class="card-items">
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

    <div class="form-container dashboard__card">
        <h2>Crear Rutas</h2>
        <?php Views::include("create-routes"); ?>
    </div>

</div>

