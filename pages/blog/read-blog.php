

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
    <?php include '../layout/nav.php' ?>
    <div class="container">





        <section class="row">

            <?php

            include '../../config/database.php';




            if (isset($_GET['id'])) {
                $blogId = $_GET['id'];
                // Use the $blogId variable as needed, such as for database queries or other operations
                $sql = "SELECT * FROM `blogs` WHERE id = '$blogId'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($blog = $result->fetch_assoc()) {
                        echo '
                        <div class="col-8">
                        <div class="header">
                            <h1 class="text-dark">' . $blog['title'] . '</h1>
                            <p class="font-monospace">' . $blog['author'] . '</p>
                        </div>
                        <hr>
                        <img src="../../admin/controllers/upload/' . $blog['image'] . ' "class="object-fit-cover " style="max-height: 400px; width: 100%"/>
        
                        <div>
                        ' . $blog['content'] . '
                        </div>
        
                    </div>
            ';
                    }
                } else {
                    echo "0 results";
                }






            } else {
                // No blog ID provided
                echo 'Invalid blog ID.';
            }
            ?>

            <div class="col-4">
                <h6 class="font-monospace">Recent Blog</h6>
                <hr>
                <div>
                    <h3>Lorem ipsum dolor sit amet consectetur </h3>


                    <a href="?id=">Read More</a>

                </div>
                <hr>
            </div>


        </section>

    </div>

    <?php include '../layout/footer.php' ?>

</body>

</html>