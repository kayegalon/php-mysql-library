<?php
    session_start();

    if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true) {
        header("Location: welcome.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My Library</title>
        <link rel="stylesheet" href="./css/styles.css">
    </head>
    <body>
        <div>
            <h1>Welcome to Your Library</h1>
            <h3>Login to your account</h3>

            <p>Don't have an account yet? <a href="register.php">Sign up here.</a></p>

            <form action="includes/login-db.php" method="post">
                <input type="text" name="username" placeholder="Enter username">
                <input type="password" name="password" placeholder="Enter password">
                <button type="submit" name="submit">LOGIN</button>
            </form>
        </div>
    </body>
</html>