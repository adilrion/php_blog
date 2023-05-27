<?php
session_start();



$navData = [
  [
    'label' => 'Home',
    'href' => '/phpBlog/pages/home.php',
  ],
  [
    'label' => 'Blog',
    'href' => '/phpBlog/pages/blog',
  ],
  [
    'label' => 'About',
    'href' => '/phpBlog/pages/about',
  ],
  [
    'label' => 'Contact',
    'href' => '/phpBlog/pages/contact',
  ],
];

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light px-3 py-3 mb-3">
  <div class="container-xl">
    <!-- Logo -->
    <a class="navbar-brand fs-4 fw-bold" href="/phpBlog/">
      PHP BLOG
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
      </div>


      <?php

      echo isset($_SESSION['username']) ? '<div class="navbar-nav ms-lg-4 me-3">' . $_SESSION['username'] . '</div>

      <div class="d-flex align-items-lg-center mt-3 mt-lg-0">
      <a href="/phpBlog/controllers/logout.php" class="btn btn-sm btn-primary w-full w-lg-auto">
        Logout
      </a>
      </div>
      ' : '
<!-- Right navigation -->
    <div class="navbar-nav ms-lg-4">
      <a class="nav-item nav-link" href="/phpBlog/auth/signIn.php">Sign in</a>
    </div>
<!-- Action -->
    <div class="d-flex align-items-lg-center mt-3 mt-lg-0">
      <a href="/phpBlog/auth/register.php" class="btn btn-sm btn-primary w-full w-lg-auto">
        Register
      </a>
    </div>
';

      ?>



    </div>
  </div>
</nav>