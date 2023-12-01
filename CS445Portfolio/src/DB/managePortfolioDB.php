<?php
// Start the session
include "./portfolioClass.php";
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!isset($_SESSION['userName'])) {
    header("Location: ../loginForm.php");
    exit();
  }

  $host = "localhost";
  $username = "cs445";
  $password = "pass";
  $database = "cs445portfolio";

  $conn = new mysqli($host, $username, $password, $database);

  
  $username = $_SESSION['userName'];
  $sql0 = "UPDATE `portfolio$username` SET 
          `name` = '" . $_POST["firstlastname"] . "',
          `description` = '" . $_POST["experience"] . "',
          `skills` = '" . $_POST["skills"] . "',
          `experience` = '" . $_POST["description"] . "',
          `templateSelection` = '" . $_POST["templateSelection"] . "' 
          WHERE `portfolio$username`.`portfolioID` = " . $_POST["portfolioID"];



  if ($conn->query($sql0) === TRUE) {
    header("location: ../userDash.php");
  } 



}


?>
