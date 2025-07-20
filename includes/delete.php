<?php
    require_once "connectdb.php";
    $id = $_GET['id'];
    $sql = "delete from books where id=$id";
    $conn->query($sql);
    $conn->close();
    header("location: ../welcome.php");
?>