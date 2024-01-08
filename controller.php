<?php

session_start();
print "session start here";

@include 'config.php';
@include 'model.php';

function redirect($location) {
    header("Location: $location");
    exit;
}


function loginController() {
    global $conn;

    $variable = "Variable";
echo "<script>console.log('$variable');</script>";

    if (isset($_POST['submit'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = $_POST['password'];

        $result = loginUser($username, $password);

        if ($result) {
            $_SESSION['user_name'] = $result['data']['username'];

            if ($result['table'] == 'member') {
                print 'if statement member';
                header('Location: member_page.php');
                exit();
            } elseif ($result['table'] == 'trainer') {
                header('Location: trainer_page.php');
                exit();
            }
        } else {
            $error[] = 'Incorrect username or password!';
            print 'result is false';
        }
    }
}

function registerController() {
    global $conn;

    if (isset($_POST['submit'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = $_POST['password'];

        registerUser($username, $password);

        redirect('login_form.php');
    }
}

function logoutController() {
    session_unset();
    session_destroy();
    redirect('login_form.php');
}

?>
