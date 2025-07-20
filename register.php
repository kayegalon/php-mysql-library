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
        <title>Create an account</title>
        <link rel="stylesheet" href="./css/styles.css">
    </head>
    <body>
        <div>
            <h3>Create an account</h3>
            <p>Already have an account? <a href="index.php">Click here to login.</a></p>
            <form action="includes/register-db.php" method="post">
                <input type="text" name="username" placeholder="Create your username">
                <input type="password" name="password" placeholder="Create your password">
                <input type="password" name="confirmPassword" placeholder="Confirm your password">
                <button type="submit" name="submit">SIGN UP</button>
            </form>
        </div>
    </body>
</html>