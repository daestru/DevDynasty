<?php
// Start the session
include "../DB/portfolioClass.php";
session_start();

// Check if the userName session variable is set
if (!isset($_SESSION['userName'])) {
    // Redirect or handle the case when userName is not set
    // For example, you can redirect the user to a login page
    header("Location: ../loginForm.php");
    exit();
}

$serializedPortfolio = $_POST['portfolio'];
$portfolio = unserialize(base64_decode($serializedPortfolio));


echo "<p>Name: " . $portfolio->getName() . "</p>";
echo "<p>Description: " . $portfolio->getDescription(). "</p>";
echo "<p>Skills: " . $portfolio->getSkills() . "</p>";
echo "<p>Experience: " . $portfolio->getExperience() . "</p>";









?>