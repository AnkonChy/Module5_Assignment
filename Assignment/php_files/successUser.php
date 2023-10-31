<?php
session_start();
$_SESSION['user_email'];
$_SESSION['user_password'];
if (isset($_SESSION['user_email']) && ($_SESSION['user_password'])) {
    $user_email = $_SESSION['user_email'];
    $user_password = $_SESSION['user_password'];


} else {

    header("Location: login_form.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
</head>

<body>
    <h1>Welcome, User!</h1>
    <p>You have successfully logged in as
        <?= $user_email ?>.
    </p>
    <h3><a href="logout.php">Log Out</a></h3>
</body>

</html>