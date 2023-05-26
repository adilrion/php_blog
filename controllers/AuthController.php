<?php

$mySql = require __DIR__ . './database.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password_hash = '';

if ($_POST['password'] === $_POST['confirmPassword']) {
    $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    // print_r($_POST);
} else {
    die("<br>password did't match");
}

$insertData = "INSERT INTO `auth`(`username`, `email`, `password`) VALUES ('$username','$email','$password_hash')";

if ($mySql->query($insertData) === TRUE) {
    echo "<br>Registration Successful";
    header("Location: ../auth/signIn.php");
    exit;
} else {

  /*   if ($mySql->errno === 1062) {
        die("Email Already Taken");
    } else { */
        die("<br><br><br>Error: " . $mySql->error);
    // }
}

$mySql->close();

?>