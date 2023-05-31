<nav class="navbar navbar-expand-lg navbar-light bg-light  z-1 px-5 nav-item">
  <!-- Logo -->
  <a class="navbar-brand fs-4 fw-bold" href="/">
    PHP BLOG
  </a>
  <!-- Navbar toggle -->
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- Collapse -->
  <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarCollapse">

    <!-- Right navigation -->

    <?php

    echo isset($_SESSION['username']) ? '<div class="navbar-nav ms-lg-4 me-3">' . $_SESSION['username'] . '</div>

      <div class="d-flex align-items-lg-center mt-3 mt-lg-0">
      <a href="/controllers/logout.php" class="btn btn-sm btn-primary w-full w-lg-auto">
        Logout
      </a>
      </div>
      ' : '
<!-- Right navigation -->
    <div class="navbar-nav ms-lg-4">
      <a class="nav-item nav-link" href="/auth/signIn.php">Sign in</a>
    </div>
<!-- Action -->
    <div class="d-flex align-items-lg-center mt-3 mt-lg-0">
      <a href="/auth/register.php" class="btn btn-sm btn-primary w-full w-lg-auto">
        Register
      </a>
    </div>
';

    ?>

  </div>
</nav>