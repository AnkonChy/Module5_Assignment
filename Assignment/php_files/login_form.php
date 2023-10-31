<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    $users = file_get_contents("users.txt");
    $users = explode("\n", $users);

    foreach ($users as $user) {
        list($name, $email, $stored_password) = array_map('trim', explode(",", $user));
        echo "Bd";

        if ($user_email === $email && $user_password === $stored_password) {
            
            echo "Hello";
            $_SESSION['user_email'] = $email;
            $_SESSION['user_password'] = $user_password;

            
           
            if ($user_email === "admin@gmail.com" && $user_password === "admin") {
                echo "Pppp";
                header("Location: success.php");
            } else {
                header("Location: successUser.php");
                echo " Hoga";
            }
            exit();
        }
    }
    
    echo "Login failed. Please check your email and password.";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="../css_files/login_form.css">
</head>

<body>

    <div class="form-container">


        <form action="login_form.php" method="post">
            <h2>Registration Successful</h2>
            <p>Your account has been created successfully. You can now log in.</p><br>
            <h1>Login now</h1>
            <label for="">Email</label>
            <input type="email" name="user_email" required placeholder="Enter email">
            <label for="">Password</label>
            <input type="password" name="user_password" required placeholder="Enter your password">
            <input type="submit" name="submit" value="Login now" class="form-btn">
            <p>Don't have an account?<a href="register_form.php"> Register now</a></p>
        </form>

    </div>


</body>

</html>