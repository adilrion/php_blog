<?php

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

<nav class="navbar navbar-expand-lg navbar-light bg-light  z-1 px-5 nav-item">
    <!-- Logo -->
    <a class="navbar-brand fs-4 fw-bold" href="/phpBlog/">
      PHP BLOG
    </a>
    <!-- Navbar toggle -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Collapse -->
    <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarCollapse">
    
      <!-- Right navigation -->
      <div class="navbar-nav ms-lg-4">
        <a class="nav-item nav-link" href="#">Sign in</a>
      </div>
      <!-- Action -->
      <div class="d-flex align-items-lg-center mt-3 mt-lg-0">
        <a href="#" class="btn btn-sm btn-primary w-full w-lg-auto">
          Register
        </a>
      </div>
    </div>
</nav>