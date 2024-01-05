<?php

@include 'config.php';
@include 'controller.php';

if (!isset($_SESSION['user_name'])) {
    header('location:login_form.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php include 'head.php'; ?>
</head>
<body>
   <?php include 'header.php'; ?>
   <div class="container">
      <div class="content">
         <h3>hi, <span>member</span></h3>
         <h1>welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
         <p>this is your member page!</p>
         <a href="login_form.php" class="btn">login</a>
         <a href="register_form.php" class="btn">register</a>
         <a href="logout.php" class="btn">logout</a>
      </div>
   </div>
   <?php include 'footer.php'; ?>
</body>
</html>