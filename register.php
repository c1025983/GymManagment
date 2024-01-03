<?php
require_once 'includes/DBConnection.php';
phpinfo();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem $conn đã được định nghĩa hay chưa
    if (isset($conn)) {
        $user_name = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if ($password == $confirm_password) {
            // Sử dụng hash password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO member (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $user_name, $hashed_password);

            if ($stmt->execute()) {
                header("Location: login.php");
                exit();
            } else {
                $error = "Registration failed. Please try again.";
            }
            $stmt->close();
        } else {
            $error = "Passwords do not match.";
        }
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register-ModernGym</title>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:400,700'>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div class="register-form">
        <form method="POST" action="" novalidate>
            <h1>Register</h1>
            <div class="content">
                <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>
                <div class="input-field">
                    <input type="text" name="username" placeholder="User Name" autocomplete="nope" required>
                </div>
                <div class="input-field">
                    <input type="password" name="password" placeholder="Password" autocomplete="new-password" required>
                </div>
                <div class="input-field">
                    <input type="password" name="confirm_password" placeholder="Confirm Password" autocomplete="new-password" required>
                </div>
            </div>
            <div class="action">
                <button type="submit" name="register" id="submit-div">Submit</button>
            </div>
        </form>
    </div>
    <script src="js/script.js"></script>
</body>
</html>
