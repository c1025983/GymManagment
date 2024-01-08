<!-- login_form_content.php -->
<form action="" method="post">
   <h3>login now</h3>
   <?php
   if (isset($error)) {
      foreach ($error as $error) {
         echo '<span class="error-msg">' . $error . '</span>';
      };
   };
   ?>
   <input type="username" name="username" required placeholder="enter your username">
   <input type="password" name="password" required placeholder="enter your password">
   <input type="submit" name="submit" value="login now" class="form-btn">
   <p>don't have an account? <a href="register_form.php">register now</a></p>
</form>
