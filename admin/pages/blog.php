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

        <section class="w-100 d-flex flex-column justify-content-center align-items-center admin-body">
            <div class="w-75">
                <h1 class="text-center">Blog Upload</h1>
                <hr class="pb-3">
                <form action="" method="post" class="d-flex flex-column row-gap-3 ">


                    <div>
                        <label for="blogTitle">Blog Title<span class="text-danger">*</span></label>
                        <input type="text" placeholder="Title" id="blogTitle" class="form-control" name="title">
                    </div>
                    <div class="">
                        <label for="author">Author<span class="text-danger">*</span></label>
                        <input type="text" placeholder="Title" id="author" class="form-control" name="author">
                    </div>
                    <div class="">
                        <label for="thumbnail">Thumbnail<span class="text-danger">*</span></label>
                        <input type="file" placeholder="Title" id="thumbnail" class="form-control" name="thumbnail">
                    </div>
                    <div class="">
                        <label for="blogContent">Content<span class="text-danger">*</span></label>
                        <textarea name="content" rows="5" cols="80" id="blogContent" class="form-control" > </textarea>
                    </div>

                    <script>

                        CKEDITOR.replace('content');
                    </script>

                    <button type="submit" class="btn btn-primary">Post</button>
                </form>
            </div>
        </section>
    </section>

</html>