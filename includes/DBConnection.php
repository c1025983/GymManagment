<?php

function OpenCon()
{
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $db = "gym_management";

    $conn = new mysqli($dbHost, $dbUser, $dbPass, $db) or die("Connect failed: %s\n". $conn -> error);

    return $conn;
}

function CloseCon($conn)
{
    $conn -> close();
}

?>