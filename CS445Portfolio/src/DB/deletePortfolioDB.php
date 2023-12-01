<?php
// Start the session
include "../DB/portfolioClass.php";
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Database connection details
  $host = "localhost";
  $username = "cs445";
  $password = "pass";
  $database = "cs445portfolio";

  $conn = new mysqli($host, $username, $password, $database);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

if (!isset($_SESSION['userName'])) {
    header("Location: ../loginForm.php");
    exit();
}
$username = $_SESSION['userName'];
$serializedPortfolio = $_POST['portfolioDelete'];
$portfolio = unserialize(base64_decode($serializedPortfolio));
$portfolioID = $portfolio->getPortfolioID();

  $sql = "DELETE FROM portfolio$username WHERE `portfolio$username`.`portfolioID` = '$portfolioID'";


if ($conn->query($sql) === TRUE){
  header("location: ../managePortfolioForm.php");
}
}










?>