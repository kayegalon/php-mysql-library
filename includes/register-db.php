<?php
    require_once "connectdb.php";

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirmPass = $_POST['confirmPassword'];

        $sql = "insert into users (username, password) values (?, ?)";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            if ($password === $confirmPass) {
                $hashedPass = password_hash($password, PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($stmt, "ss", $username, $hashedPass);
                if (mysqli_stmt_execute($stmt)) {
                    header("location: ../index.php?success=registrationsuccessful");
                    exit();
                } else {
                    header("Location: ../register.php?error=sqlerror");
                    exit();
                }
            } else {
                header("location: ../register.php?error=passwordsdonotmatch");
                exit();
            }

            mysqli_stmt_close($stmt);
        }

        $mysqli_close($conn);
    }
?>