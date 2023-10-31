<?php

session_start();

if (isset($_SESSION['user_email']) && isset($_SESSION['user_password'])) {
    $user_email = $_SESSION['user_email'];
    $user_password = $_SESSION['user_password'];

    if ($user_email === "admin@gmail.com" && $user_password === "admin") {
    
        echo "Welcome, Admin!";
    } else {
        
        echo "Welcome, Regular User!";
    }
} else {
    
    header("Location: login_form.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Delete User Data</title>
</head>
<body>

<h1>Delete User Data</h1>

<table border="1">
    <tr>
        <th>Username</th>
        <th>Email</th>
        <th>Password</th>
        <th>Delete</th>
    </tr>

    <?php
    $file = 'users.txt';

    if (file_exists($file)) {
        $lines = file($file);

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
    } else {
        echo "<p>The file does not exist.</p>";
    }
    ?>
</table>

</body>
</html>
