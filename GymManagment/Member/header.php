<?php 
include "config.php";
include "database.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MEMBER</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <style>
            .logout-button {
    padding: 8px 15px;
    background-color: #f44336; /* Màu nền đỏ */
    color: white;
    text-decoration: none;
    font-weight: bold;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.logout-button:hover {
    background-color: #c0392b; /* Màu nền đỏ đậm hơn khi hover */
}
        </style>
        <h1>MEMBER</h1>
        <a href="logout.php" class="logout-button">Logout</a>
    </header>

</body>
</html>