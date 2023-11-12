<?php
// Start the session
session_start();

// Check if the userName session variable is set
if (!isset($_SESSION['userName'])) {
    // Redirect or handle the case when userName is not set
    // For example, you can redirect the user to a login page
    header("Location: ../loginForm.php");
    exit();
}

// Database connection details
$host = 'localhost';
$user = 'cs445';
$password = 'pass';
$database = 'cs445portfolio';

// Create a database connection
$connection = new mysqli($host, $user, $password, $database);

// Check the connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}


// Get the userName from the session variable
$userName = $_SESSION['userName'];

// Concatenate the table name
$tableName = 'portfolio' . $userName;
//should be given in a previous page (Just created for testing)
$portfolioID = 1;
// Query to select data from the portfolio table
$query = "SELECT name, description, skills, experience FROM $tableName WHERE portfolioID = $portfolioID";
echo "<p>$query</p>";
// Execute the query
$result = $connection->query($query);

// Check if the query was successful
if ($result) {
    // Fetch the data
    $row = $result->fetch_assoc();

    // Display the information in HTML paragraphs
    echo "<p>Name: " . $row['name'] . "</p>";
    echo "<p>Description: " . $row['description'] . "</p>";
    echo "<p>Skills: " . $row['skills'] . "</p>";
    echo "<p>Experience: " . $row['experience'] . "</p>";
} else {
    // Display the SQL error for debugging
    echo "Error: " . $connection->error;
}

// Close the database connection
$connection->close();
?>