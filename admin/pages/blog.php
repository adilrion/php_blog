<script src="ckeditor/ckeditor.js"></script>
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
    <link rel="stylesheet" href="./pagesStyle.css">
    <link rel="stylesheet" href="../adminStyle.css">
    <link rel="stylesheet" href="../../style.css">

    <title>Blog - PHP BLOG</title>
</head>

<body>

    <header>
        <?php include '../includes/header.php' ?>
    </header>

    <section class="admin-container">
        <aside>
            <?php include '../includes/sidebar.php' ?>
        </aside>

        <section>
            <div class="pe-3">
                <?php
                include '../../config/database.php';

                $queryData = "SELECT * FROM `blogs`";
                $result = $conn->query($queryData);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <div
                            class="d-flex column-gap-3 justify-content-between blog-card rounded overflow-hidden shadow-sm mb-3 ">
                            <div class="d-flex column-gap-3 w-100">
                                <div class="img-card">
                                    <img class="w-100 h-100 overflow-hidden" src="../controllers/upload/<?= $row['image'] ?>"
                                        alt="" srcset="">
                                </div>
                                <div class="p-2">
                                    <h4 class="title">
                                        <?= $row['title'] ?>
                                    </h4>
                                    <p class="fst-6 fw-lighter font-monospace">
                                        <?= $row['author'] ?>
                                    </p>

                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-3 pe-3 ">
                                <div class="view"><a href="#"><i class="fa fa-eye text-secondary" aria-hidden="true"></i></a>
                                </div>
                                <div class="Edit"><a href="#"><i class="fa fa-pencil-square-o text-info"
                                            aria-hidden="true"></i></a></div>
                                <div class="Delete "><a href="#"><i class="fa fa-trash text-decoration-none text-danger"
                                            aria-hidden="true"></i></a></div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "No blogs found.";
                }

                $result->free_result();
                $conn->close();
                ?>
            </div>

        </section>
    </section>

</html>