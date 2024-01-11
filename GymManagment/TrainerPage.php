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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trainer Page</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:400,700'>
  <link rel="stylesheet" href="assets/css/trainerPage.css">

  <style type="text/css">
   
    header {
      background-color: #3498db;
      color: #fff;
      padding: 20px;
      text-align: center; /* Yazıyı ortala */
      position: relative;
    }

    h1 {
      margin: 0;
      font-size: 24px;
    }

    .btn {
      position: absolute;
      top: 20px; /* Header'ın üstünden 20px aşağıda */
      right: 20px; /* Sağdan 20px içeriye */
      display: inline-block;
      padding: 10px 15px;
      text-decoration: none;
      background-color: #2ecc71;
      color: #fff;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }

    .btn:hover {
      background-color: #27ae60;
    }
  </style>
</head>
<body>

  <header>
    <h1>ModernGym Trainer Page</h1>
    <a href="logout.php" class="btn">Logout</a>
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
        <!-- Add more members as needed -->
      </div>
    </div>
  </main>

  <script src="assets/js/script.js"></script>
</body>
</html>