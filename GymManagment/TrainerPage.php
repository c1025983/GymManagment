<?php


@include 'helper/config.php';
@include 'helper/controller.php';

if (!isset($_SESSION['user_name'])) {
    header('location:login_form.php');
   }
   if ($_SESSION['role'] != 'trainer') {
     header('Location: index.html');
   }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trainer Page</title>

    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:400,700'>
    <link rel="stylesheet" href="css/trainerPage.css">
    
    
</head>
<body>
<header>
  <h1>Trainer Page</h1>
  <a href="logout.php" class="btn">Logout</a>
</header>
  <form action="memberDropdown.php" method="post">
    <label for="memberSelect">Select a Member:</label>
    <select name="memberSelect" id="memberSelect">
    <option disabled selected value>  select a member </option>
        <?php
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "gym_management"; 

     
        $conn = new mysqli($servername, $username, $password, $dbname);

       
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        //retrieves users with member role
        $sql = "SELECT memberID, username FROM member WHERE member.role = 'member'"; 
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            //loops through query result to add options to the drop down
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["memberID"] . "'>" . $row["username"] . "</option>";
            }
        } else {
            echo "<option value=''>No members found</option>";
        }

       
        $conn->close();
        ?>
    </select>
  </form>      
  
 
<div id="workoutDescriptionContainer">
    <h3>Workout Description</h3>
    <textarea name="workoutDescription" id="workoutDescription" placeholder="Enter workout description here"></textarea>
    <h3>Duration</h3>
    <textarea name="workoutDuration" id="workoutDuration" placeholder="Enter an integer to represent minutes. Non integer will save this value as a blank"></textarea>
    <h3>Calories</h3>
    <textarea name="workoutCalories" id="workoutCalories" placeholder="Enter an integer to represent calories burnt. Non integer will be saved as a blank"></textarea>
    <br> <br>
    <button id="updateButton" onclick="updateWorkoutDescription()">Update workout info</button>
</div>
<br>

<div id="dietContainer">
        <h3>Diet Plan</h3>
        <textarea name="dietDescription" id="dietDescription" placeholder="Enter diet description here"></textarea>
        
        <h3>Calories</h3>
        <textarea name="calories" id="calories" placeholder="Calories"></textarea>
        
        <h3>Fats</h3>
        <textarea name="fats" id="fats" placeholder="Fats"></textarea>
        
        <h3>Carbs</h3>
        <textarea name = "carbs" id="carbs" placeholder="Carbs"></textarea>
        
        <h3>Protein</h3>
        <textarea name = "protein" id="protein" placeholder="Protein"></textarea>
        <br>
        <button id = "dietButton" id ="updateDietButton" onclick="updateDietDescription()">Update Description</button>
        
        
</div>
<br>
<script src = "js/TrainerPage.js"></script>


</body>
</html>
