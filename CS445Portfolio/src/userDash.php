<?php
        session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <header>
    </header>

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

    <div class="button-container">


    <a href="tipsAndTricks.php">
        <button>Tips/Tricks</button>
    </a>
    <a href="managePortfolioForm.php">
        <button>ManagePorts</button>
    </a>
    <a href="createPortfolioForm.php">
        <button>Create Portfolio</button>
    </a>
    <a href="./DB/logoutDB.php">
        <button>Logout</button>
    </a>
    </div>
</body>

</html>