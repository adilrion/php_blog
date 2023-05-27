<?php
$menuItems = [
    [
        'icon' => 'fas fa-tachometer-alt fa-fw',
        'title' => 'Main dashboard',
        'link' => '/phpBlog/admin/pages/dashboard.php',
        'current' => false
    ],
    [
        'icon' => 'fas fa-tachometer-alt fa-fw',
        'title' => 'Blog',
        'link' => '/phpBlog/admin/pages/blog.php',
        'current' => false
    ],
    [
        'icon' => 'fas fa-tachometer-alt fa-fw',
        'title' => 'Post',
        'link' => '/phpBlog/admin/pages/post.php',
        'current' => false
    ],
    [
        'icon' => 'fas fa-chart-area fa-fw',
        'title' => 'Website traffic',
        'link' => '#'
    ],
    [
        'icon' => 'fas fa-lock fa-fw',
        'title' => 'Password',
        'link' => '#'
    ],
    [
        'icon' => 'fas fa-chart-line fa-fw',
        'title' => 'Analytics',
        'link' => '#'
    ],
    [
        'icon' => 'fas fa-chart-pie fa-fw',
        'title' => 'SEO',
        'link' => '#'
    ],
    [
        'icon' => 'fas fa-chart-bar fa-fw',
        'title' => 'Orders',
        'link' => '#'
    ],
    [
        'icon' => 'fas fa-users fa-fw',
        'title' => 'Users',
        'link' => '#'
    ],
];
?>

<aside class="sidebar z-0 bg-light">
  <div class="list-group list-group-flush mx-3">
    <?php foreach ($menuItems as $menuItem): ?>
      <a href="<?= $menuItem['link']; ?>" class="list-group-item list-group-item-action py-2 <?= isset($menuItem['current']) && $menuItem['current'] ? 'active' : ''; ?>">
        <i class="<?= $menuItem['icon']; ?> me-3"></i>
        <span><?= $menuItem['title']; ?></span>
      </a>
    <?php endforeach; ?>
  </div>
</aside>
