<?php
    require_once "connectdb.php";
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $sql = "update books set title='$title', author='$author' where id=$id";
    $result = $conn->query($sql);
    $conn->close();
    header("location: ../welcome.php");
?>