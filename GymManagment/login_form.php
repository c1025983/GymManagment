<?php
@include 'helper/config.php';
@include 'helper/controller.php';

// Check if the user is already logged in
if (isset($_SESSION['user_name'])) {
   
  if ($_SESSION['role'] == 'member') {
   header('location: member_page.php');
}
elseif ($_SESSION['role'] == 'trainer') {
   header('location: TrainerPage.php');
}

}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    // Get the submitted username and password
 $username = $_POST['username'];
 $password = $_POST['password'];

    // Call the loginController function from controller.php
 $result = loginController($username, $password);

    // Debugging statements
   // var_dump($result); // Check the result

    // Check the result of the login attempt
 if ($result === true) {
        // Redirect to the member page after successful login


 } else {
        // Display errors if login fails
  $error = $result;
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login Form</title>
   <link rel="stylesheet" href="assets/css/style.css">
   <link rel="stylesheet" href="assets/css/login_form.css">
</head>
<body>

   <div class="form-container">
      <div class="background-pattern"></div>
      <form action="" method="post">
         <h3>Login now</h3>
         <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            }
         }
         ?>
         <input type="text" name="username" required placeholder="Enter your username">
         <input type="password" name="password" required placeholder="Enter your password">
         <input type="submit" name="submit" value="Login Now" class="form-btn">
         <p>Don't have an account? <a href="register_form.php">Register now</a></p>
      </form>
   </div>

</body>
</html>
