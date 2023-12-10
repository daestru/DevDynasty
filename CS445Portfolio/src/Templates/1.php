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


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
    <title>Resume</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0; /* Light gray background */
            color: #333; /* Dark gray text */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .resume-container {
            display: flex;
            width: 8.5in; /* Letter-sized paper width */
            height: 11in; /* Letter-sized paper height */
            background-color: #fff; /* White background */
            border-radius: 5px; /* Rounded corners for container */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Box shadow for container */
            overflow: hidden; /* Hide overflow for rounded corners */
        }

        .contact-section {
            flex: 1;
            background-color: #3498db; /* Blue color for contact section */
            color: #fff; /* White text for contact section */
            padding: 20px;
            border-radius: 5px 0 0 5px; /* Rounded corners for left side */
        }

        .main-section {
            flex: 2;
            padding: 20px;
            border-radius: 0 5px 5px 0; /* Rounded corners for right side */
        }

        h2 {
            color: #333;
            background-color: #ddd; /* Light gray background for section titles */
            padding: 10px; /* Add padding for better appearance */
            margin: 0; /* Remove margin to make titles flush with the section */
            border-radius: 5px 5px 0 0; /* Rounded corners for top of titles */
        }

        p {
            margin: 10px 0;
        }
    </style>
</head>

<body>

<div class="resume-container">
    <div class="contact-section">
        <h2>Contact Information</h2>
        <!-- Add your contact information here -->
        <p>Name: <?php echo $portfolio->getName(); ?></p>
        <!-- Add more contact information as needed -->
    </div>

    <div class="main-section">
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
    </div>
</div>

<!-- Move the script outside the .resume-container div -->
<script>
    // save as pdf logic
    function saveAsPDF() {
        const resumeContainer = document.querySelector('.resume-container');
        
        html2pdf(resumeContainer);
    }
</script>

<!-- Add a button or trigger to save as PDF -->
<button onclick="saveAsPDF()">Save as PDF</button>

</body>
</html>
