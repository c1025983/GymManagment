<?php


@include 'helper/config.php';
@include 'helper/controller.php';


// session_start();


// if (isset($_SESSION['user_name'])) {
//  header('location: member_page.php');
// }

if (!isset($_SESSION['user_name'])) {
 header('location:login_form.php');
}

if ($_SESSION['role'] != 'member') {
  header('Location: index.html');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="assets/css/member_page.css">
</head>
<body>
   <?php include 'header.php'; ?>
   <div class="container">
      <div class="content">
         <h3>Hi, <span>Member</span></h3>
         <h1>Welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
         <p>This is your member page!</p>
         <a href="login_form.php" class="btn">Login</a>
         <a href="register_form.php" class="btn">Register</a>
         <a href="logout.php" class="btn">Logout</a>
      </div>
   </div>
   <?php include 'footer.php'; ?>
</body>
</html>