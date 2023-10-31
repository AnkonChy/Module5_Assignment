<?php
session_start();


if (!isset($_SESSION['user_email']) || !isset($_SESSION['user_password'])) {
    header("Location: login_form.php");
    exit();
}

if ($_SESSION['user_email'] !== 'admin@gmail.com' || $_SESSION['user_password'] !== 'admin') {
    echo "You do not have permission to access this page.";
    exit();
}


if (isset($_GET['index'])) {
    $file = 'users.txt';
    $index = $_GET['index'];

    if (file_exists($file)) {
        $lines = file($file);

        if (isset($lines[$index])) {
            // Display user data to be deleted
            $userData = explode(",", $lines[$index]);
            list($username, $email, $password) = $userData;

            echo "<h2>User Data to be Deleted:</h2>";
            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>Username</th>";
            echo "<th>Email</th>";
            echo "<th>Password</th>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>" . htmlspecialchars($username) . "</td>";
            echo "<td>" . htmlspecialchars($email) . "</td>";
            echo "<td>" . htmlspecialchars($password) . "</td>";
            echo "</tr>";
            echo "</table>";


            unset($lines[$index]);
            file_put_contents($file, implode("", $lines));


            echo "<h2>User Data After Deletion:</h2>";
            echo "<p>User data has been deleted.</p>";
        }
    }
}
?>

<a href="your_page.php">Back to User List</a>