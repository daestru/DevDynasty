<?php
// Start the session
    
    if(!isset($_SESSION)) {
        session_start();
    }

// Include the file with the Portfolio class and any database connection code
include './DB/portfolioClass.php';
function getAllPortfolios() {
    // Add your database connection code here
    // Example: $conn = mysqli_connect("localhost", "username", "password", "database");
    $host = "localhost";
    $username = "cs445";
    $password = "pass";
    $database = "cs445portfolio";

    $conn = new mysqli($host, $username, $password, $database);
    // Query to get all portfolios from the database
    $query = "SELECT * FROM portfolio" . $_SESSION['userName']; // Replace your_table_name with the actual table name
    $result = mysqli_query($conn, $query);

    $portfolios = [];

    // Create Portfolio objects for each row
    while ($row = mysqli_fetch_assoc($result)) {
        $portfolio = new Portfolio($row['portfolioID'], $row['name'], $row['description'], $row['skills'], $row['experience'], $row['templateSelection']); // Adjust these based on your table structure
        $portfolios[] = $portfolio;
    }

    // Close the database connection
    mysqli_close($conn);

    return $portfolios;
}

// Get all portfolios from the database
$portfolios = getAllPortfolios();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <!-- Include necessary CSS -->
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <!-- Header content (e.g., logo, navigation) -->
    </header>

    <main class="content">
        <!-- Main content section -->
        <!-- Charts, tables, statistics, etc. -->

        <?php
        // Check if the userName session variable is set
        if (isset($_SESSION['userName'])) {
            // Display the userName
            echo '<p>Welcome user, ' . $_SESSION['userName'] . '!</p>';
            echo '<p>User Type: ' . $_SESSION['userType'];
        } 
        else {
            // If the userName is not set, you can redirect the user to the login page or take appropriate action
            echo '<p>Session username not set. Please log in.</p>';
        }
        ?>
    </main>

    <?php
        foreach ($portfolios as $portfolio) {
            $destination = $portfolio->getTemplateSelection() . ".php";
            echo '<form action="'.$destination.'" method="post">';
            echo '<button type="submit" name="portfolio" value="' . base64_encode(serialize($portfolio)) . '">' . $portfolio->getName() . '</button>';
            echo '</form>';
        }
        ?>

    <a href="tipsAndTricks.php">
        <button>Tips/Tricks</button>
    </a>
    <a href="managePortfolioForm.php">
        <button>ManagePorts</button>
    </a>
</body>

</html>