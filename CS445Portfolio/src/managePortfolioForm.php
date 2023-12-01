<?php
// Start the session
    
    if(!isset($_SESSION)) {
        session_start();
    }

include './DB/portfolioClass.php';
function getAllPortfolios() {
    $host = "localhost";
    $username = "cs445";
    $password = "pass";
    $database = "cs445portfolio";

    $conn = new mysqli($host, $username, $password, $database);
    $query = "SELECT * FROM portfolio" . $_SESSION['userName']; 
    $result = mysqli_query($conn, $query);

    $portfolios = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $portfolio = new Portfolio($row['portfolioID'], $row['name'], $row['description'], $row['skills'], $row['experience'], $row['templateSelection']); // Adjust these based on your table structure
        $portfolios[] = $portfolio;
    }

    mysqli_close($conn);

    return $portfolios;
}

$portfolios = getAllPortfolios();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <main class="content">

        <?php
        if (isset($_SESSION['userName'])) {
            echo '<p>Welcome user, ' . $_SESSION['userName'] . '!</p>';
        } 
        else {
            echo '<p>Session username not set. Please log in.</p>';
        }
        ?>
    </main>

    <?php
        foreach ($portfolios as $portfolio) {
            $destination = $portfolio->getTemplateSelection() . ".php";
            echo '<form action="./managePortfolioInfo.php" method="post">';
            echo '<button type="submit" name="portfolio" value="' . base64_encode(serialize($portfolio)) . '">' . $portfolio->getName() . '</button>';
            echo '</form>';
            echo '<form action="./DB/deletePortfolioDB.php" method="post">';
            echo '<button type="submit" name="portfolioDelete" value="' . base64_encode(serialize($portfolio)) . '"> Delete </button>';
            echo '</form>';
          }
        ?>
    <a href="./userDash.php">
        <button>Dashboard</button>
    </a>
</body>

</html>