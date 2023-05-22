<?php

$blogData = [
  [
    'image' => 'https://mdbootstrap.com/img/new/standard/nature/111.webp',
    'title' => 'Card title 1',
    'content' => 'Some quick example text to build on the card title and make up the bulk of the card\'s content 1.'
  ],
  [
    'image' => 'https://mdbootstrap.com/img/new/standard/nature/222.webp',
    'title' => 'Card title 2',
    'content' => 'Some quick example text to build on the card title and make up the bulk of the card\'s content 2.'
  ],
  [
    'image' => 'https://mdbootstrap.com/img/new/standard/nature/223.webp',
    'title' => 'Card title 3',
    'content' => 'Some quick example text to build on the card title and make up the bulk of the card\'s content 3.'
  ],
  [
    'image' => 'https://mdbootstrap.com/img/new/standard/nature/234.webp',
    'title' => 'Card title 4',
    'content' => 'Some quick example text to build on the card title and make up the bulk of the card\'s content 4.'
  ],
  [
    'image' => 'https://mdbootstrap.com/img/new/standard/nature/236.webp',
    'title' => 'Card title 5',
    'content' => 'Some quick example text to build on the card title and make up the bulk of the card\'s content 5.'
  ],
  [
    'image' => 'https://mdbootstrap.com/img/new/standard/nature/237.webp',
    'title' => 'Card title 6',
    'content' => 'Some quick example text to build on the card title and make up the bulk of the card\'s content 6.'
  ],
];

?>

<div class="container">
    <div class="row">
      <?php
      foreach ($blogData as $blog) {
        echo '
        <div class="col-md-6 col-lg-4">
          <div class="card mb-4">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
              <img src="' . $blog['image'] . '" class="img-fluid" />
              <a href="#!">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
              </a>
            </div>

            <div class="card-body">
              <h5 class="card-title">' . $blog['title'] . '</h5>
              <p class="card-text">' . $blog['content'] . '</p>
            </div>
          </div>
        </div>
        ';
      }
      ?>
    </div>
  </div>
