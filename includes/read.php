<?php
    require_once "connectdb.php";
    $sql = "select * from books";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";

        if (isset($_GET['id']) && $row['id'] == $_GET['id']) {
            echo "<form action='includes/update.php' method='post'>";
            echo "<td><input type='text' name='title' value='" . $row['title'] . "'></td>";
            echo "<td><input type='text' name='author' value='" . $row['author'] . "'></td>";
            echo "<td><button type='submit' name='submit'>UPDATE</button></td>";
            echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
            echo "</form>";
        } else {
            echo "<td>" . $row['title'] . "</td>";
            echo "<td>" . $row['author']. "</td>";
            echo "<td><a href='welcome.php?id=" . $row['id'] . "'><button>UPDATE</button></a></td>";

        }
        echo "<td><a href='includes/delete.php?id=" . $row['id'] . "'><button>DELETE</button></a></td>";
        echo "</tr>";
    }

    $conn->close();
?>