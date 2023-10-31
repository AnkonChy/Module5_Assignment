<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $username = $_POST['username'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $role = $_POST['admin'];


   if (empty($username) || empty($email) || empty($password)) {
      echo "Please fill out all fields.";
   } else {
      $user_data = "$username,$email,$password,$role\n";

      file_put_contents("users.txt", $user_data, FILE_APPEND);

      header("Location: login_form.php");
      exit();
   }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register Form</title>
   <link rel="stylesheet" href="../css_files/register_style.css">
</head>

<body>
   <div class="form-container">
      <form action="register_form.php" method="post">
         <h1>Register now</h1>
         <label for="">Username</label>
         <input type="text" name="username" required placeholder="Enter username">
         <label for="">Email</label>
         <input type="email" name="email" required placeholder="Enter email">
         <label for="">Password</label>
         <input type="password" name="password" required placeholder="Enter your password">
         <input type="hidden" name="role" value="">
         <input type="submit" name="register" value="Register now" class="form-btn">
         <p>Already have an account?<a href="login_form.php">Login now</a></p>
      </form>
   </div>

</body>

</html>