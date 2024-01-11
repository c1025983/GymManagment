<?php
// Check if the member ID is sent via GET request
if (isset($_GET['memberID']) && !empty($_GET['memberID'])) {
    // Database connection parameters
    $servername = "localhost"; // Change this to your MySQL server name
    $username = "root"; // Change this to your MySQL username
    $password = ""; // Change this to your MySQL password
    $dbname = "gym_management"; // Change this to your MySQL database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Escape the member ID to prevent SQL injection (better to use prepared statements)
    $memberID = $conn->real_escape_string($_GET['memberID']);

    // Fetch workout description based on member's workoutPlan foreign key
    $sql = "SELECT workout.workoutDescription
            FROM member
            JOIN workout ON workout.workoutID = member.workoutPlan
            WHERE member.memberID = '$memberID'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output the workout description as a response
        $row = $result->fetch_assoc();
        echo $row['workoutDescription'];
    } else {
        echo "No workout plan added yet";
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Invalid request";
}
?>