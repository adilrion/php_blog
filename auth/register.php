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
    <link rel="stylesheet" href="./authStyle.css">

    <title>Authentication - PHP BLOG</title>
</head>

<body>
    <section>
        <header>
            <?php
            include '../pages/layout/nav.php'
                ?>
        </header>

        <body>

            <div class="container">
                <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden w-50 mx-auto">
                    <div class="card-body p-4 p-sm-5 ">
                        <h5 class="card-title text-center mb-5 fw-light  fs-2 fw-bold">Registration</h5>
                        <form action="../controllers/AuthController.php" method="POST">

                            <?php
                            echo isset($_GET['please-fill-in-all-the-required-fields']) ? '<p>Please Fill in all the required fields</p>' : '';
                            ?>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInputUsername"
                                    placeholder="Type Username" name="username" required autofocus>
                                <label for="floatingInputUsername">Username</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInputEmail"
                                    placeholder="Type Your Email Address" name="email" required>
                                <label for="floatingInputEmail">Email address</label>
                            </div>

                            <!-- <hr> -->

                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                                    name="password" required>
                                <label for="floatingPassword">Password</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPasswordConfirm"
                                    placeholder="Confirm Password" name="confirmPassword" required>
                                <label for="floatingPasswordConfirm">Confirm Password</label>
                            </div>
                            <?php
                            echo isset($_GET["password-don't-match"]) ? '<p class="text-danger">Password don\'t match</p>' : '';

                            ?>

                            <div class="d-grid mb-2">
                                <button class="btn  btn-lg btn-primary btn-login fw-bold text-uppercase" type="submit"
                                    name="button">Register</button>
                            </div>

                            <a class="d-block text-center mt-2 small" href="./signIn.php">Have an account? Sign In</a>


                            <hr class="my-4">

                            <div class="d-grid mb-2">
                                <button class="btn-lg btn-google btn-login fw-bold text-uppercase" type="submit"
                                    style="border:none; border-radius: 5px; ">
                                    <i class="fab fa-google me-2"></i> Sign up with Google
                                </button>
                            </div>

                            <div class="d-grid">
                                <button class="btn-lg btn-facebook btn-login fw-bold text-uppercase" type="submit"
                                    style="border:none; border-radius: 5px; ">
                                    <i class="fab fa-facebook-f me-2"></i> Sign up with Facebook
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>


        </body>

        <footer>
            <?php
            include '../pages/layout/footer.php'
                ?>
        </footer>
    </section>
</body>

</html>