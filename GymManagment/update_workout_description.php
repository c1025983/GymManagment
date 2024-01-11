<?php
//checks if the variables passed from the JS are loaded
if (isset($_POST['memberID'], $_POST['workoutDescription'])) {
    $memberID = $_POST['memberID'];
    $workoutDescription = $_POST['workoutDescription'];
    $workoutDuration = $_POST['workoutDuration'];
    $workoutCalories = $_POST['workoutCalories'];



    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gym_management";

    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //gets the workout ID. theres a simpler statement for this but it kept bugging somehow idk
    $stmt = $conn->prepare("SELECT workoutID FROM workout WHERE workoutID = (SELECT workoutPlan FROM member WHERE memberID = ?)");
    $stmt->bind_param("i", $memberID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Update existing workout record's description
        $row = $result->fetch_assoc();
        $existingDietID = $row['workoutID'];


        $updateStmt = $conn->prepare("UPDATE workout SET workoutDescription = ?, duration = ?, caloriesBurned = ? WHERE workoutID = ?");
        $updateStmt->bind_param("siii", $workoutDescription, $workoutDuration, $workoutCalories, $existingDietID);


        if ($updateStmt->execute()) {
            echo "Workout description updated successfully!";
        } else {
            echo "Failed to update workout description: " . $conn->error;
        }

        $updateStmt->close();
    } else {
        // Create a new workout record
        $insertStmt = $conn->prepare("INSERT INTO workout (workoutDescription, workoutDuration, workoutCalories) VALUES (?, ?, ?)");
        $insertStmt->bind_param("sii", $workoutDescription, $workoutDuration, $workoutCalories);
        
        if ($insertStmt->execute()) {
            $newDietID = $insertStmt->insert_id;

            // Update member's workoutPlan with the new workoutID
            $updateMemberStmt = $conn->prepare("UPDATE member SET workoutPlan = ? WHERE memberID = ?");
            $updateMemberStmt->bind_param("ii", $newDietID, $memberID);

            if ($updateMemberStmt->execute()) {
                echo "Workout description updated successfully!";
            } else {
                echo "Failed to update workout plan for the member: " . $conn->error;
            }

            $updateMemberStmt->close();
        } else {
            echo "Failed to create new workout record: " . $conn->error;
        }

        $insertStmt->close();
    }

    // Close connections
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid parameters received.";
}
?>
