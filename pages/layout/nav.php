<?php
session_start();


$navData = [
  [
    'label' => 'Home',
    'href' => '/pages/home.php',
  ],
  [
    'label' => 'Blog',
    'href' => '/pages/blog',
  ],
  [
    'label' => 'About',
    'href' => '/pages/about',
  ],
  [
    'label' => 'Contact',
    'href' => '/pages/contact',
  ],
];

?>


  <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
    <div class="container-xl">
      <!-- Logo -->
      <a class="navbar-brand fs-4 fw-bold" href="/">
        <img id="navLogo" src="/asset/phpblog.png" alt="" srcset="">
      </a>
      <!-- Navbar toggle -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <!-- Nav -->
        <div class="navbar-nav mx-lg-auto">
          <?php foreach ($navData as $navItem) { ?>
            <a class="nav-item nav-link <?php if ($navItem['href'] == $_SERVER['REQUEST_URI']) {
              echo 'active';
            } ?>" href="<?php echo $navItem['href']; ?>"><?php echo $navItem['label']; ?></a>
          <?php } ?>



          <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
            <a href="/admin/" class="nav-item nav-link">Admin</a>
          <?php endif; ?>



        </div>


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
    </div>
  </nav>
