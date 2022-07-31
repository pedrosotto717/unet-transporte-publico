<div class="container">
  <?php

  use app\utils\Views;

  $suggestions = \app\controllers\SuggestController::index();
  ?>

  <!-- list suggestion -->
  <div>
      <table>
          <tr>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Email</th>
              <th>Teléfono</th>
              <th>Comentario</th>
              <th>Email</th>

          </tr>
          <tr>
              <td>Alfreds Futterkiste</td>
              <td>Maria Anders</td>
              <td>Germany</td>
          </tr>
          <tr>
              <td>Centro comercial Moctezuma</td>
              <td>Francisco Chang</td>
              <td>Mexico</td>
          </tr>
      </table>
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
            <?= $suggestion['bussiness']; ?>
          </li>
      <?php }
      } else {
        echo "<p>Aun No hay sugerencias</p>";
      } ?>
    </ul>
  </div>

</div>