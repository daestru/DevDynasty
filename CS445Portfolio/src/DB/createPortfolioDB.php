<?php
/*
  Insert the data obtained from the previous form into the correct database
*/
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

  if (isset($_SESSION['userName'])) {
    // Display the userName
    echo '<p>Welcome admin, ' . $_SESSION['userName'] . '!</p>';
} 

  // Retrieve data from the form submission
  $firstLastName = mysqli_real_escape_string($conn, $_POST["firstlastname"]);
  $experience = mysqli_real_escape_string($conn, $_POST["expierence"]);
  $skills = mysqli_real_escape_string($conn, $_POST["skills"]);
  $education = mysqli_real_escape_string($conn, $_POST["description"]);
  $certsLicense = mysqli_real_escape_string($conn, $_POST["templateSelection"]);

  // Insert data into the resume_data table
  $sql = "INSERT INTO cs445portfolio.portfolio . $username . (full_name, experience, skills, education, certs_license) 
          VALUES ('$firstLastName', '$experience', '$skills', '$description', '$templateSelection')";

if ($conn->query($sql0) === TRUE){
  if($conn->query($sql1) === TRUE){
      header("location: ../loginForm.php");
  }
}
}

else{
header("location: ../createuserForm.php?duplicateFail=true");
}

  // Close the database connection
  $conn->close();
?>
