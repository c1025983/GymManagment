<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['memberSelect'])) {
    // Database connection and handling the selected member's ID goes here
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

    // Get the selected member's ID from the form
    $selectedMemberID = $_POST['memberSelect'];

    // Prepare and bind the SELECT statement with a parameter
    $sql = "SELECT * FROM member WHERE memberID = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $selectedMemberID); // "i" represents integer type, assuming 'id' is an integer

    // Execute the prepared statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Fetch and display the details of the selected member
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Display member details (You can customize this based on your database columns)
        echo "Member ID: " . $row["memberID"] . "<br>";
        echo "Member Name: " . $row["username"] . "<br>";
        // Add more details as needed
    } else {
        echo "No member found";
    }

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // Handle cases where form data is not submitted properly
    echo "Form data not submitted correctly.";
}
?>