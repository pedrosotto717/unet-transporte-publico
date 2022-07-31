<header>

  <nav class="menu">
    <h3 class="user-name">

      <?php /*if (isset($_SESSION['user'])) echo getSession('user.email');*/ ?>

    </h3>

    <ul class="menu-list">
      <li class="menu-item">
        <a class="menu-link" href="/">Home</a>
      </li>
      <?php if (isset($_SESSION['user'])) { ?>
        <li class="menu-item">
          <a class="menu-link" href="/dashboard">Dashboard</a>
        </li>
        <li class="menu-item">
          <a class="menu-link" href="/logout">Logout</a>
        </li>
      <?php } else { ?>
        <li class="menu-item">
          <a class="menu-link" href="/login">Login</a>
        </li>
      <?php } ?>
    </ul>
  </nav>

</header>