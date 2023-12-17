<?php

function loginUser($email, $password) {
    global $conn;

    $pass = md5($password);
    $select = "SELECT * FROM member_form WHERE email = '$email' AND password = '$pass'";
    $result = mysqli_query($conn, $select);

    return $result;
}

function registerUser($name, $email, $password, $user_type) {
    global $conn;

    $insert = "INSERT INTO member_form(name, email, password, user_type) VALUES('$name','$email','$password','$user_type')";
    mysqli_query($conn, $insert);
}

?>
