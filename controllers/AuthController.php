<?php

$mySql = require __DIR__ . '/../config/database.php';


if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['confirmPassword'])) {
    header("Location: ../auth/register.php?please-fill-in-all-the-required-fields");
    exit;
} else {
    if ($_POST['password'] !== $_POST['confirmPassword']) {
        header("Location: ../auth/register.php?password-don't-match");
        exit;
    }

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $insertData = "INSERT INTO `auth`(`username`, `email`, `password`) VALUES ('$username','$email','$password_hash')";

    if ($mySql->query($insertData) === TRUE) {
        echo "Registration Successful";
        header("Location: ../auth/signIn.php?registration-successful-please-sign-in");
        exit;
    } else {
        die("Error: " . $mySql->error);
    }

}




// $mySql->close();

?>