<?php

// Database connection configuration (replace with your own)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gym_management";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//for diet details, i had to use fetch api so that server wasnt out of sync
//and giving me null values

//fetch api reference: https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API/Using_Fetch


$jsonData = file_get_contents('php://input');
$data = json_decode($jsonData, true);

// Extract data from the JSON object
$memberID = $data['memberID'];
$dietDescription = $data['dietDescription'];
$caloriesText = $data['caloriesText'];
$carbsText = $data['carbsText'];
$proteinText = $data['proteinText'];
$fatsText = $data['fatsText'];


// Check if the member already has a workout record
$stmt = $conn->prepare("SELECT dietID FROM diet WHERE dietID = (SELECT dietPlan FROM member WHERE memberID = ?)");
$stmt->bind_param("i", $memberID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    
    $row = $result->fetch_assoc();
    $existingDietID = $row['dietID'];
    $updateStmt = $conn->prepare("UPDATE diet SET dietDescription = ?, calories = ?, carbs = ?, 
        proteins = ?,fats = ? WHERE dietID = ?");
    $updateStmt->bind_param("siiiii", $dietDescription, $caloriesText, $carbsText, $proteinText,$fatsText,$existingDietID);


    if ($updateStmt->execute()) {
        echo "Diet description updated successfully!";
    } else {
        echo "Failed to update workout description: " . $conn->error;
    }

    $updateStmt->close();
} else {
    //makes a diet record if the user doesnt have one yet
    $insertStmt = $conn->prepare("INSERT INTO diet (dietDescription,calories,carbs,proteins,fats) VALUES (? ,? ,? ,? ,? )");
    $insertStmt->bind_param("siiii", $dietDescription, $caloriesText, $carbsText, $proteinText, $fatsText);
    
    if ($insertStmt->execute()) {
        $newDietID = $insertStmt->insert_id;

        //updates the member table to add the diet plan to it
        $updateMemberStmt = $conn->prepare("UPDATE member SET dietPlan = ? WHERE memberID = ?");
        $updateMemberStmt->bind_param("ii", $newDietID, $memberID);

        if ($updateMemberStmt->execute()) {
            echo "Diet description updated successfully!";
        } else {
            echo "Failed to update diet plan for the member: " . $conn->error;
        }

        $updateMemberStmt->close();
    } else {
        echo "something went wrong with the insert statement" . $conn->error;
    }

    $insertStmt->close();
}

// Close connections
$stmt->close();
$conn->close();

?>
