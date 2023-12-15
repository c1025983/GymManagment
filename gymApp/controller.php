<?php

session_start();

@include 'config.php';
@include 'model.php';

function redirect($location) {
    header("Location: $location");
    exit;
}

function loginController() {
    global $conn;

    if (isset($_POST['submit'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = $_POST['password'];

        $result = loginUser($email, $password);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);

            if ($row['user_type'] == 'admin') {
                $_SESSION['admin_name'] = $row['name'];
                redirect('trainer_page.php');
            } elseif ($row['user_type'] == 'user') {
                $_SESSION['user_name'] = $row['name'];
                redirect('member_page.php');
            }
        } else {
            $error[] = 'Incorrect email or password!';
        }
    }
}

function registerController() {
    if (isset($_POST['submit'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = md5($_POST['password']);
        $user_type = $_POST['user_type'];

        $result = loginUser($email, $password);

        if (mysqli_num_rows($result) > 0) {
            $error[] = 'User already exists!';
        } else {
            registerUser($name, $email, $password, $user_type);
            redirect('login_form.php');
        }
    }
}

function logoutController() {
    session_unset();
    session_destroy();
    redirect('login_form.php');
}

?>
