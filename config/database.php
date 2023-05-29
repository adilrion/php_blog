<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "phpblog";

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}


return $conn;


?>