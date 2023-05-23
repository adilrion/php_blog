<?php
$menuItems = [
    [
        'icon' => 'fas fa-tachometer-alt fa-fw',
        'title' => 'Main dashboard',
        'link' => 'pages/dashboard.php',
        'current' => true
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
        'icon' => 'fas fa-globe fa-fw',
        'title' => 'International',
        'link' => '#'
    ],
    [
        'icon' => 'fas fa-building fa-fw',
        'title' => 'Partners',
        'link' => '#'
    ],
    [
        'icon' => 'fas fa-calendar fa-fw',
        'title' => 'Calendar',
        'link' => '#'
    ],
    [
        'icon' => 'fas fa-users fa-fw',
        'title' => 'Users',
        'link' => '#'
    ],
    [
        'icon' => 'fas fa-money-bill fa-fw',
        'title' => 'Sales',
        'link' => '#'
    ]
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
