<div class="container">
  <?php

  use app\utils\Views;

  $suggestions = \app\controllers\SuggestController::index();
  ?>

  <!-- list suggestion -->
  <div>
      <h3 class="suggest--title">Listado de quejas</h3>
      <table class="table">
          <thead>
              <tr>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Email</th>
                  <th>Teléfono</th>
                  <th>Comentario</th>
                  <th>Empresa</th>

              </tr>
          </thead>

          <tbody>

              <?php
              if (isset($suggestions) && $suggestions != null) {
              foreach ($suggestions as $suggestion) { ?>
                  <tr>
                      <td><?= $suggestion['first_name']; ?></td>
                      <td><?= $suggestion['last_name']; ?></td>
                      <td><?= $suggestion['email']; ?></td>
                      <td><?= $suggestion['phone']; ?>></td>
                      <td><?= $suggestion['comment']; ?></td>
                      <td><?= $suggestion['bussiness']; ?></td>
                  </tr>
              <?php }
              } else {
                  echo "<p>Aun No hay sugerencias</p>";
              } ?>

          </tbody>
      </table>

  </div>

</div>