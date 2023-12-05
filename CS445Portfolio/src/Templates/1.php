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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff; /* Black background */
            color: #000; /* White text */
            margin: 20px;
        }

        .resume-section {
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
        }

        h2 {
            color: #fff; 
        }

        p {
            margin: 10px 0;
        }
    </style>
</head>
<body>

<div class="resume-section">
    <h2>Name</h2>
    <p><?php echo $portfolio->getName(); ?></p>
</div>

<div class="resume-section">
    <h2>Description</h2>
    <p><?php echo $portfolio->getDescription(); ?></p>
</div>

<div class="resume-section">
    <h2>Skills</h2>
    <p><?php echo $portfolio->getSkills(); ?></p>
</div>

<div class="resume-section">
    <h2>Experience</h2>
    <p><?php echo $portfolio->getExperience(); ?></p>
</div>

</body>
</html>