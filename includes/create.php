<?php
    require_once "connectdb.php";
    $title = $_POST["title"];
    $author = $_POST["author"];
    $sql = "insert into books (title, author) values ('$title', '$author')";
    $conn->query($sql);
    $conn->close();
    header("location: ../welcome.php");
?>