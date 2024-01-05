<?php

function loginUser($username, $password) {
    global $conn;

    $selectMember = "SELECT * FROM member WHERE username = ?";
    $stmt = mysqli_prepare($conn, $selectMember);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $resultMember = mysqli_stmt_get_result($stmt);

    if ($resultMember && $row = mysqli_fetch_assoc($resultMember)) {
        if (password_verify($password, $row['password'])) {
            return ['table' => 'member', 'data' => $row];
        }
    }

    $selectTrainer = "SELECT * FROM trainer WHERE username = ?";
    $stmt = mysqli_prepare($conn, $selectTrainer);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $resultTrainer = mysqli_stmt_get_result($stmt);

    if ($resultTrainer && $row = mysqli_fetch_assoc($resultTrainer)) {
        if (password_verify($password, $row['password'])) {
            return ['table' => 'trainer', 'data' => $row];
        }
    }

    return false;
}

function registerUser($username, $password) {
    global $conn;

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $selectQuery = "SELECT * FROM member WHERE username = ?";
    $stmt = mysqli_prepare($conn, $selectQuery);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 0) {
        $insert = "INSERT INTO member (username, password) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $insert);
        mysqli_stmt_bind_param($stmt, "ss", $username, $hashedPassword);
        mysqli_stmt_execute($stmt);
    }
}
?>
