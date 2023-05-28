<?php

$isEmailNotAvailable = false;
$passwordNotMatch = false;

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $email = $_POST['email'];


    $mySql = require __DIR__ . "/../config/database.php";

    $query = "SELECT * FROM auth WHERE email=?";
    $stmt = $mySql->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();


    if ($user) {
        if (password_verify($_POST['password'], $user['password'])) {
            // echo ("Login Successful");
            session_start();
            $_SESSION['id'] = $user['id']; // Store the user ID
            $_SESSION['username'] = $user['username']; // Store the username
            $_SESSION['email'] = $user['email']; // Store the username
            $_SESSION['role'] = $user['role']; // Store the username

            header("Location: ../index.php");
            exit;

        } else {
            $passwordNotMatch = true;
        }
    } else {
        $isEmailNotAvailable = true;
    }


}



?>


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
    <link rel="stylesheet" href="../../style.css">

    <title>sign in - PHP BLOG</title>
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
                <div class="row">
                    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                        <div class="card border-0 shadow rounded-3 my-5">
                            <div class="card-body p-4 p-sm-5">

                                <?php

                                echo isset($_GET['registration-successful-please-sign-in']) ? '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Registration Successful!</strong> Please Sign In<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>' : '';
                                ?>

                                <h5 class="card-title text-center mb-5 fw-bold fs-1">Sign In</h5>
                                <form method="post">

                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="floatingInput"
                                            placeholder="name@example.com" name="email">
                                        <label for="floatingInput">Email address</label>
                                    </div>
                                    <?php

                                    echo $isEmailNotAvailable ? '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Email!</strong> Not Found<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>' : '';
                                    ?>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" id="floatingPassword"
                                            placeholder="Password" name="password">
                                        <label for="floatingPassword">Password</label>
                                    </div>
                                    <?php

                                    echo $passwordNotMatch ? '<div class="alert alert-warning alert-dismissible fade show" role="alert">
<strong>Password!</strong> does not match<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>' : '';
                                    ?>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="rememberPasswordCheck">
                                        <label class="form-check-label" for="rememberPasswordCheck">
                                            Remember password
                                        </label>
                                    </div>
                                    <div class="d-grid">
                                        <button class="btn btn-primary btn-login text-uppercase fw-bold"
                                            type="submit">Sign
                                            in</button>
                                    </div>
                                    <div class="mt-2">
                                        Don't have an account!
                                        <a href="./register.php">
                                            Sign Up Here
                                        </a>
                                    </div>
                                    <hr class="my-4">
                                    <div class="d-grid mb-2">
                                        <button class="btn-google btn-login text-uppercase fw-bold" type="submit"
                                            style="border:none; border-radius: 5px; ">
                                            <i class="fab fa-google me-2"></i> Sign in with Google
                                        </button>
                                    </div>
                                    <div class="d-grid">
                                        <button class="btn-facebook btn-login text-uppercase fw-bold" type="submit"
                                            style="border:none; border-radius: 5px; ">
                                            <i class="fab fa-facebook-f me-2"></i> Sign in with Facebook
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
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