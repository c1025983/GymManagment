<?php
if(isset($_GET['memberID'])) {
    $memberID = $_GET['memberID'];

    // Your database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gym_management";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to get workout details
    $workoutQuery = $conn->prepare("SELECT workoutDescription,duration,caloriesBurned FROM workout WHERE workoutID = (SELECT workoutPlan FROM member WHERE memberID = ?)");
    $workoutQuery->bind_param("i", $memberID);
    $workoutQuery->execute();
    $workoutResult = $workoutQuery->get_result();

    $workoutDetails = array();

    if ($workoutResult->num_rows > 0) {
        $row = $workoutResult->fetch_assoc();
        $workoutDetails = array(
            'workoutDescription' => $row['workoutDescription'],
            'workoutDuration' => $row['duration'],
            'workoutCalories' => $row['caloriesBurned']);
    }

    $workoutQuery->close();

    // Query to get diet details
    $dietQuery = $conn->prepare("SELECT dietDescription,calories,carbs,proteins,fats FROM diet WHERE dietID = (SELECT dietPlan FROM member WHERE memberID = ?)");
    $dietQuery->bind_param("i", $memberID);
    $dietQuery->execute();
    $dietResult = $dietQuery->get_result();

    $dietDetails = array();

    if ($dietResult->num_rows > 0) {
        $row = $dietResult->fetch_assoc();
        $dietDetails = array(
            'dietDescription' => $row['dietDescription'],
            'calories' => $row['calories'],
            'fats' => $row['fats'],
            'carbs' => $row['carbs'],
            'protein' => $row['proteins']
        );
    }

    $dietQuery->close();
    $conn->close();

    // Merge workout and diet details into a single response
    $response = array_merge($workoutDetails,$dietDetails);
    echo json_encode($response);
} else {
    echo json_encode(array());
}
?>
