<?php
/*
require_once 'includes/DBConnection.php';
$query = "SELECT * FROM member";
$conn = OpenCon();
$result = $conn->query($query);
print $result->num_rows[0];
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register-ModernGym</title>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:400,700'>
    <link rel="stylesheet" href="css/trainerPage.css">
</head>
<body>

<header>
  <h1>Trainer Page</h1>
</header>

<main>
  <div class="sidebar">
    <div class="search-section">
      <h2>Search Members</h2>
      <div class="search-container">
        <input type="text" id="searchInput" placeholder="Search...">
        <button type="button" id="searchButton">Search</button>
      </div>
    </div>
  </div>
  <div class="content">
    <h2>Member List</h2>
    <div class="member-list">
      <div class="member">
        <span>Member 1</span>
        <div class="member-actions">
          <button class="profile-btn">View Profile</button>
          <button class="diet-btn">View Diet</button>
          <button class="routine-btn">View Routine</button>
        </div>
      </div>
      <div class="member">
        <span>Member 2</span>
        <div class="member-actions">
          <button class="profile-btn">View Profile</button>
          <button class="diet-btn">View Diet</button>
          <button class="routine-btn">View Routine</button>
        </div>
      </div>
      
    </div>
  </div>
</main>
<script src="js/script.js"></script>
</body>
</html>
