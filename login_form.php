<?php

@include 'config.php';
@include 'controller.php';

if (isset($_SESSION['user_name'])) {
    header('location: member_page.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>Login Form</title>
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
   
<div class="form-container">
   <form action="" method="post">
      <h3>Login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="username" required placeholder="Enter your username">
      <input type="password" name="password" required placeholder="Enter your password">
      <input type="submit" name="submit" value="submit" class="form-btn">
      <p>Don't have an account? <a href="register_form.php">Register now</a></p>
   </form>
</div>

</body>
</html>
