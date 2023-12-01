<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Database connection details
  $host = "localhost";
  $username = "cs445";
  $password = "pass";
  $database = "cs445portfolio";

  // Create a connection to the database
  $conn = new mysqli($host, $username, $password, $database);

  // Check the connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $username = $_SESSION['userName'];
  // Retrieve data from the form submission
  $firstLastName = mysqli_real_escape_string($conn, $_POST["firstlastname"]);
  $experience = mysqli_real_escape_string($conn, $_POST["experience"]);
  $skills = mysqli_real_escape_string($conn, $_POST["skills"]);
  $description = mysqli_real_escape_string($conn, $_POST["description"]);
  $templateSelection = mysqli_real_escape_string($conn, $_POST["templateSelection"]);

  // Insert data into the resume_data table
  $sql = "INSERT INTO cs445portfolio.portfolio$username (name, experience, skills, description, templateSelection) 
          VALUES ('$firstLastName', '$experience', '$skills', '$description', '$templateSelection')";


if ($conn->query($sql) === TRUE){
  header("location: ../userDash.php");
}
}

$conn->close();

?>
