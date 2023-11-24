<?php
session_start();
include("includes\DBConnection.php");
$conn = OpenCon();
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $userDataQuery = "SELECT UserID, ClientID, FirstName, LastName, permission FROM users WHERE UserID = " . $row['UserID'];
        $rawUserinfo = $conn->query($userDataQuery);
        $userInfo = $rawUserinfo->fetch_assoc();
        $_SESSION['userInfo'] = $userInfo;
        header("Location: dashboard.php");

    } else {
        $error = "Invalid email or password";
    }
}
CloseCon($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login-WaterMan</title>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:400,700'>
    <link rel="stylesheet" href="css\main.css">
</head>
<body>
    <div class="login-form">
        <form method="POST" action="">
            <h1>Login</h1>
            <div class="content">
                <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>
                <div class="input-field">
                    <input type="email" name="email" placeholder="Email" autocomplete="nope" required>
                </div>
                <div class="input-field">
                    <input type="password" name="password" placeholder="Password" autocomplete="new-password" required>
                </div>
                <a href="#" class="link">Forgot Your Password?</a>
            </div>
            <div class="action">
                <button id="register-div"><a href="register.php">Register</a></button>
                <button type="submit" name="login" id="signIn-div">Sign in</button>
            </div>
        </form>
    </div>
    <script src="js/script.js"></script>
</body>
</html>
