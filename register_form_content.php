<!-- register_form_content.php -->
<form action="" method="post">
   <h3>register now</h3>
   <?php
   if (isset($error)) {
      foreach ($error as $error) {
         echo '<span class="error-msg">' . $error . '</span>';
      };
   };
   ?>
   <input type="username" name="username" required placeholder="enter your username">
   <input type="password" name="password" required placeholder="enter your password">
   <input type="password" name="cpassword" required placeholder="confirm your password">
   <select name="user_type">
      <option value="member">member</option>
      <option value="trainer">trainer</option>
   </select>
   <input type="submit" name="submit" value="register now" class="form-btn">
   <p>already have an account? <a href="login_form.php">login now</a></p>
</form>
