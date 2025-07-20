<?php
    session_start();

    if (!isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] !== true) {
        header("location: index.php?error=sessionexpired");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome to your library</title>
        <link rel="stylesheet" href="./css/styles.css">
    </head>
    <body>
        <nav>
            <a href="includes/logout.php"><button class="logout-btn">LOGOUT</button></a>
        </nav>
        

        <main>
            <h1>WELCOME TO YOUR LIBRARY!</h1>

            <h3> Add a book to your list </h3>

            <div class="add-book">
                <form action="includes/create.php" method="post">
                    <input type="text" name="title" placeholder="Enter title of book">
                    <input type="text" name="author" placeholder="Enter the author's name">
                    <button type="submit" name="submit">ADD</button>
                </form>
            </div>
            

            <h3>List of all your books</h3>
            <table>
                <tbody>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php include "includes/read.php"; ?>
                </tbody>
            </table>

        </main>
        

        
    </body>
</html>