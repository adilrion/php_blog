


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
    <link rel="stylesheet" href="style.css">

    <title>PHP BLOG</title>
</head>

<body>
    <section>
        <header>
            <?php

            include './pages/layout/nav.php'
                ?>
        </header>

        <body>

            <?php include './pages/blog/single.php' ?>
            <?php include './pages/about/about.php' ?>
            <?php include './pages/contact/contact.php' ?>


        </body>

        <footer>
            <?php

            include './pages/layout/footer.php'
                ?>
        </footer>
    </section>
</body>

</html>