<?php

session_start();
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
    <link rel="stylesheet" href="../adminStyle.css">
    <link rel="stylesheet" href="../../style.css">

    <title>Admin - PHP BLOG</title>
</head>

<body>

    <div>
        <?php include '../includes/header.php' ?>
    </div>

    <section class="admin-container">
        <aside>
            <?php include '../includes/sidebar.php' ?>
        </aside>

        <section class="admin-body px-3">
            <h1>Users</h1>

            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Give Role</th>
                            <th scope="col">Remove Role</th>
                            <th scope="col">Delete User</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../../config/database.php';

                        if (isset($_POST['make-admin'])) {
                            $userId = $_POST['user-id'];

                            // Update the user's role to "admin" in the database
                            $updateQuery = "UPDATE `auth` SET `role` = 'admin' WHERE `id` = '$userId'";
                            if ($conn->query($updateQuery) === TRUE) {
                                // Role update successful, display success message or perform any other actions
                                echo '<div class="alert alert-success">User role updated to admin</div>';
                            } else {
                                // Role update failed, display error message or handle the error
                                echo '<div class="alert alert-danger">Failed to update user role</div>';
                            }
                        }

                        if (isset($_POST['delete-user'])) {
                            $userId = $_POST['user-id'];

                            // Delete the user from the database
                            $deleteQuery = "DELETE FROM `auth` WHERE `id` = '$userId'";
                            if ($conn->query($deleteQuery) === TRUE) {
                                if ($_SESSION['id'] == $userId) {
                                    session_unset(); // Clear all session variables
                                    session_destroy(); // Destroy the session
                        
                                }
                                // User deletion successful, display success message or perform any other actions
                                echo '<div class="alert alert-success">User deleted successfully</div>';
                            } else {
                                // User deletion failed, display error message or handle the error
                                echo '<div class="alert alert-danger">Failed to delete user</div>';
                            }
                        }

                        if (isset($_POST['remove-role'])) {
                            $userId = $_POST['user-id'];

                            // Update the user's role to null in the database
                            $updateQuery = "UPDATE `auth` SET `role` = NULL WHERE `id` = '$userId'";
                            if ($conn->query($updateQuery) === TRUE) {
                                if ($_SESSION['id'] == $userId) {
                                    session_unset(); // Clear all session variables
                                    session_destroy();
                                    // header("Location: /phpBlog/index.php"); // Destroy the session
                                }

                                // Role removal successful, display success message or perform any other actions
                                echo '<div class="alert alert-success">User role removed</div>';
                            } else {
                                // Role removal failed, display error message or handle the error
                                echo '<div class="alert alert-danger">Failed to remove user role</div>';
                            }
                        }


                        $queryData = "SELECT * FROM `auth`";
                        $result = $conn->query($queryData);

                        if ($result->num_rows > 0) {
                            $index = 1;
                            while ($data = $result->fetch_assoc()) {
                                ?>

                                <tr>
                                    <th scope="row">
                                        <?= $index ?>
                                    </th>
                                    <td>
                                        <?= $data['username'] ?>
                                    </td>
                                    <td>
                                        <?= $data['email'] ?>
                                    </td>
                                    <td>
                                        <?= $data['role'] ?>
                                    </td>
                                    <td>
                                        <form method="post">
                                            <input type="hidden" name="user-id" value="<?= $data['id'] ?>">
                                            <button type="submit" name="make-admin" class="btn btn-success">Make Admin</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form method="post">
                                            <input type="hidden" name="user-id" value="<?= $data['id'] ?>">
                                            <button type="submit" name="remove-role" class="btn btn-warning">Remove
                                                Role</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form method="post">
                                            <input type="hidden" name="user-id" value="<?= $data['id'] ?>">
                                            <button type="submit" name="delete-user" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>

                                <?php

                                $index++;
                            }
                        }

                        $conn->close();
                        ?>


                    </tbody>
                </table>
            </div>
        </section>
    </section>

</html>