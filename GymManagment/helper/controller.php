<?php

session_start();
// print "session start here";

@include 'config.php';
@include 'model.php';

function redirect($location) {
    header("Location: $location");
    exit;
}


function loginController($username, $password) {
    global $conn;

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Check 'member' table
    $query = "SELECT * FROM member WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        return ["Error in database query."];
    }

    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['user_id'] = $user['memberID'];
        $_SESSION['user_name'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        return true;
    }

    // Check 'trainer' table
    $query = "SELECT * FROM trainer WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        return ["Error in database query."];
    }

    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        //session_start();
        $_SESSION['user_id'] = $user['trainerID'];
        $_SESSION['user_name'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        return true;
    }

    return ["Invalid username or password."];
}
function registerController() {
    global $conn;

    if (isset($_POST['submit'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = $_POST['password'];
        $user_type = $_POST['user_type'];

        registerUser($username, $password,$user_type);

        redirect('login_form.php');
    }
}

function logoutController() {
    session_unset();
    session_destroy();
    redirect('login_form.php');
}

?>
