<?php

$navData = [
  [
    'label' => 'Home',
    'href' => '/phpBlog/views/home.php',
  ],
  [
    'label' => 'Blog',
    'href' => '/phpBlog/views/blog',
  ],
  [
    'label' => 'About',
    'href' => '/phpBlog/views/about',
  ],
  [
    'label' => 'Contact',
    'href' => '/phpBlog/views/contact',
  ],
];

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light px-3 py-3 mb-3">
  <div class="container-xl">
    <!-- Logo -->
    <a class="navbar-brand" href="/phpBlog/">
      <img src="https://preview.webpixels.io/web/img/logos/clever-primary.svg" class="h-8" alt="...">
    </a>
    <!-- Navbar toggle -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Collapse -->
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <!-- Nav -->
      <div class="navbar-nav mx-lg-auto">
        <?php foreach ($navData as $navItem) { ?>
          <a class="nav-item nav-link <?php if ($navItem['href'] == $_SERVER['REQUEST_URI']) { echo 'active';} ?>" href="<?php echo $navItem['href']; ?>"><?php echo $navItem['label']; ?></a>
        <?php } ?>
      </div>
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
  </div>
</nav>