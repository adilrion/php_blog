<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>


  <!-- fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,700;0,800;1,400;1,500;1,700;1,800&display=swap"
    rel="stylesheet">
  <!-- end -->


  <!-- font-awesome Icon -->
  <script src="https://kit.fontawesome.com/ad7f215142.js" crossorigin="anonymous"></script>
  <!-- end  -->

  <!-- CSS -->
  <link rel="stylesheet" href="../../style.css">
  <title>Blog - PHP Blog</title>
</head>

<body>
  <div class="container">
    <div class="blog-body">
      <?php
      $conn = require __DIR__ . '../../../config/database.php';
      $baseUrl = 'http://localhost/php-blog/admin/controllers/upload/';
      $baseUrlBlog = 'http://localhost/php-blog/pages/blog/read-blog.php?id=';



      $postsPerPage = 6; // Number of blog posts to display per page
      $currentpage = isset($_GET['page']) ? $_GET['page'] : 1; // Get the current page number from the query parameter
      if ($currentpage >= 0) {
        $currentpage = max(1, $currentpage); // Set the minimum value to 1 if $currentpage is less than 1
      } else {
        $currentpage = 1; // Set the default value to 1 if $_GET['page'] is not set or invalid
      }
      $offset = ($currentpage - 1) * $postsPerPage; // Calculate the offset for the query
      
      $sql = "SELECT * FROM `blogs` LIMIT $offset, $postsPerPage";

      $result = $conn->query($sql);


      if ($result->num_rows > 0) {
        // Output data of each row
        while ($blog = $result->fetch_assoc()) {
          echo '
          <div class="shadow-sm rounded overflow-hidden p-0 w-100">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
              <img src="' . $baseUrl . $blog['image'] . '" class="object-fit-cover" style="height: 300px; width: 100%"/>
            </div>
    
            <div class="p-3">
              <h5 class="card-title">' . $blog['title'] . '</h5>
              <p class="card-text mb-1">' . $blog['author'] . '</p>
              <a href="' . $baseUrlBlog . $blog['id'] . '" class="">Read more</a>
            </div>
          </div>';
        }
      } else {
        echo "0 results";
      }





      ?>
    </div>

    <?php

    // Pagination
    $sqlForAllData = "SELECT * FROM `blogs`";
    $totalPosts = $conn->query($sqlForAllData)->num_rows; // Total number of blog posts
    
    $totalPages = ceil($totalPosts / $postsPerPage); // Calculate the total number of pages
    
    // Display the pagination links
    echo '
    
    <nav class="mt-3">
    <ul class="pagination pagination-circle">
      <li class="page-item ">
        <a class="page-link ' . (($currentpage <= 1) ? 'disabled' : '') . '" href="?page=' . ($currentpage - 1) . '">Previous</a>
      </li>';

    for ($i = 1; $i <= $totalPages; $i++) {
      $activeClass = ($i == $currentpage) ? 'active' : '';
      echo '<li class="page-item ' . $activeClass . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
    }

    echo '<li class="page-item ">
    <a class="page-link ' . (($currentpage == $totalPages) ? 'disabled' : '') . '" href="?page=' . ($currentpage + 1) . '">Next</a>
  </li>
</ul>
</nav>';


    ?>
  </div>
</body>

</html>