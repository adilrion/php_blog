<?php
include '../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $imageName = $_FILES['image']['name'];
    $imageType = $_FILES['image']['type'];
    $imageTmpName = $_FILES['image']['tmp_name'];
    $imageSize = $_FILES['image']['size'];
    $imageError = $_FILES['image']['error'];

    $content = $_POST['content'];
    $title = $_POST['title'];
    $author = $_POST['author'];

    if ($imageError === 0) {

        $img_ex = pathinfo($imageName, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);
        $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
        $dir = 'upload/' . $new_img_name;
        move_uploaded_file($imageTmpName, $dir);


        $blogQuery = "INSERT INTO `blogs`(`title`, `author`, `image`, `content`) VALUES ('$title','$author','$new_img_name','$content')";

        if ($conn->query($blogQuery) === TRUE) {
            $em = 'blog insert successful';
            header("Location: ../pages/post.php?massage=$em");
            exit;
        }
    }
}
?>