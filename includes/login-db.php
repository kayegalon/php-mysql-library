<?php
    require_once "connectdb.php";

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "select * from users where username = ?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $username);

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) === 1) {
                    mysqli_stmt_bind_result($stmt, $id, $dbUsername, $hashedPassword);

                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashedPassword)) {
                            session_start();
                            $_SESSION['loggedIn'] = true;
                            $_SESSION['id'] = $id;
                            $_SESSION['username'] = $dbUsername;
                            header("Location: ../welcome.php");
                            exit();
                            
                        } else {
                            header("Location: ../index.php?error=wrongpassword");
                            exit();
                        }
                    }

                } else {
                    header("Location: ../index.php?error=wrongusername");
                    exit();
                }
            } else {
                header("Location: ../index.php?error=sqlerror");
                exit();
            }

            mysqli_stmt_close($stmt);
        }

        mysqli_close($conn);
    }
?>