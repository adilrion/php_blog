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

                if (isset($_GET['delete_id'])) {
                    $deleteID = $_GET['delete_id'];

                    // Retrieve the image filename from the database
                    $getImageQuery = "SELECT `image` FROM `blogs` WHERE `id` = '$deleteID'";
                    $imageResult = $conn->query($getImageQuery);
                    if ($imageResult->num_rows > 0) {
                        $imageRow = $imageResult->fetch_assoc();
                        $imageFilename = $imageRow['image'];

                        // Delete the image file from the upload folder
                        $imagePath = '../controllers/upload/' . $imageFilename;
                        if (file_exists($imagePath)) {
                            unlink($imagePath);
                        }
                    }

                    // Delete the blog entry from the database
                    $deleteQuery = "DELETE FROM `blogs` WHERE `id` = '$deleteID'";
                    if ($conn->query($deleteQuery) === TRUE) {
                        // Delete successful, display success message or perform any other actions
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Blog!</strong> Deleted Successfully
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
                    } else {
                        // Delete failed, display error message or handle the error
                        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Wrong!</strong> There was something wrong
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
                    }
                }

                $queryData = "SELECT * FROM `blogs`";
                $result = $conn->query($queryData);




                // blog update
                

                if (isset($_POST['update'])) {
                    $blogId = $_GET['id']; // Retrieve the blog ID from the URL parameter
                    $blogTitle = $_POST['title'];
                    $blogAuthor = $_POST['author'];
                    $blogContent = $_POST['content'];
                    $image = $_FILES['image'];

                    // Check if a new image is uploaded
                    if ($image['name'] !== '') {
                        $imagePath = '../controllers/upload/' . basename($image['name']);

                        // Remove the old image
                        $oldImagePathQuery = "SELECT `image` FROM `blogs` WHERE `id` = '$blogId'";
                        $oldImagePathResult = $conn->query($oldImagePathQuery);
                        if ($oldImagePathResult->num_rows > 0) {
                            $oldImagePathRow = $oldImagePathResult->fetch_assoc();
                            $oldImage = $oldImagePathRow['image'];
                            if ($oldImage !== '') {
                                $oldImagePath = '../controllers/upload/' . $oldImage;
                                if (file_exists($oldImagePath)) {
                                    unlink($oldImagePath);
                                }
                            }
                        }

                        // Move the new image to the upload folder
                        if (move_uploaded_file($image['tmp_name'], $imagePath)) {
                            // Image upload successful, update the blog entry in the database
                            $updateQuery = "UPDATE `blogs` SET `title`='$blogTitle', `author`='$blogAuthor', `content`='$blogContent', `image`='$image[name]' WHERE `id`='$blogId'";
                            if ($conn->query($updateQuery) === TRUE) {
                                // Update successful, display success message or perform any other actions
                                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Blog!</strong> Updated Successfully
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>';
                            } else {
                                // Update failed, display error message or handle the error
                                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>Error! 2</strong> Failed to update the blog
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>';
                            }
                        } else {
                            // Image upload failed, display error message or handle the error
                            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Error! 3</strong> Failed to upload the image
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';
                        }
                    } else {
                        // No new image uploaded, update the blog entry without changing the image
                        $updateQuery = "UPDATE `blogs` SET `title`='$blogTitle', `author`='$blogAuthor', `content`='$blogContent' WHERE `id`='$blogId'";
                        if ($conn->query($updateQuery) === TRUE) {
                            // Update successful, display success message or perform any other actions
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Blog!</strong> Updated Successfully
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                        } else {
                            // Update failed, display error message or handle the error
                            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Error! 1</strong> Failed to update the blog
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                        }
                    }
                }



                // end
                




                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <div
                            class="d-flex column-gap-3 justify-content-between blog-card rounded overflow-hidden shadow-sm mb-3">
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
                            <div class="d-flex align-items-center gap-3 pe-3">
                                <!-- Blog View Modal -->
                                <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $row['id'] ?>"><i
                                        class="fa fa-eye text-secondary" aria-hidden="true"></i></a>
                                <!-- Blog Update Modal -->
                                <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdropUpdate<?= $row['id'] ?>"><i
                                        class="fa fa-pencil-square-o text-info" aria-hidden="true"></i></a>
                                <!-- Blog Deleted -->
                                <a href="?delete_id=<?= $row['id'] ?>"><i class="fa fa-trash text-decoration-none text-danger"
                                        aria-hidden="true"></i></a>
                            </div>
                        </div>

                        <!-- Blog View Modal -->
                        <div class="modal fade" id="staticBackdrop<?= $row['id'] ?>" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="modal-title fs-5" id="staticBackdropLabel">
                                            <h4 class="title">
                                                <?= $row['title'] ?>
                                            </h4>
                                            <p class="fw-lighter mb-0 font-monospace">
                                                <?= $row['author'] ?>
                                            </p>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img class="w-100 h-100 overflow-hidden"
                                            src="../controllers/upload/<?= $row['image'] ?>" alt="" srcset="">
                                        <div>
                                            <?= $row['content'] ?>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Blog Update Modal -->

                        <div class="modal fade" id="staticBackdropUpdate<?= $row['id'] ?>" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="modal-title fs-5" id="staticBackdropLabel">
                                            <h4 class="title">
                                                Please Update Your Blog
                                            </h4>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <form action="?id=<?= $row['id'] ?>" method="post" enctype="multipart/form-data"
                                            class="d-flex flex-column row-gap-3 ">
                                            <div>
                                                <label for="blogTitle">Blog Title<span class="text-danger">*</span></label>
                                                <input type="text" placeholder="Title" value="<?= $row['title'] ?>"
                                                    id="blogTitle" class="form-control" name="title">
                                            </div>
                                            <div class="">
                                                <label for="author">Author<span class="text-danger">*</span></label>
                                                <input type="text" value="<?= $row['author'] ?>" placeholder="Author name"
                                                    id="author" class="form-control" name="author">
                                            </div>
                                            <div class="">
                                                <label for="thumbnail">Thumbnail<span class="text-danger">*</span></label>
                                                <input type="file" value="../controllers/upload/<?= $row['image'] ?>"
                                                    name="image" placeholder="Thumbnail" id="thumbnail" class="form-control">
                                            </div>
                                            <div class="">
                                                <label for="blogContent">Content<span class="text-danger">*</span></label>
                                                <textarea name="content" rows="5" cols="80" id="blogContent"
                                                    class="form-control"><?= $row['content'] ?></textarea>

                                            </div>
                                            <button type="submit" name="update" class="btn btn-primary">Update</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
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