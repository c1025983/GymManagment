<?php

@include 'config.php';
@include 'controller.php';

registerController(); // Call the registerController function

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <!-- Other head elements -->
   <title>Register Form</title>

   <!-- Custom CSS file link -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>register now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="username" required placeholder="enter your username">
      <input type="password" name="password" required placeholder="enter your password">
      <select name="user_type">
         <option value="member">member</option>
         <option value="trainer">trainer</option>
      </select>
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>already have an account? <a href="login_form.php">login now</a></p>
   </form>

</div>

</body>
</html>
