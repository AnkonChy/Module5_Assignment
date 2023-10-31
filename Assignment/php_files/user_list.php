<?php
session_start();

if (isset($_SESSION['email']) && $_SESSION['password'] === 'admin') {
    ?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>User List</title>
    </head>

    <body>

        <h1>User List</h1>

        <table border="1">

            <?php

            foreach ($lines as $index => $line) {
                $userData = explode(",", $line);


                if (count($userData) == 3) {
                    list($username, $email, $password) = $userData;

                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($username) . "</td>";
                    echo "<td>" . htmlspecialchars($email) . "</td>";
                    echo "<td>" . htmlspecialchars($password) . "</td>";
                    echo "<td><a href='delete_user.php?index=$index'>Delete</a></td>";
                    echo "</tr>";
                }
            }
            ?>

        </table>

    </body>

    </html>

    <?php
} else {
    echo "You don't have permission to access this page.";
}
?>