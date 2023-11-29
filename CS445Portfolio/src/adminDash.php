<?php
// Start the session
session_start();

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
            echo '<p>Welcome admin, ' . $_SESSION['userName'] . '!</p>';
        } 
        else {
            // If the userName is not set, you can redirect the user to the login page or take appropriate action
            echo '<p>Session username not set. Please log in.</p>';
        }
        ?>
    </main>

    <a href="manageUsersForm.php">
        <button>Manage Users</button>
    </a>
    <a href="updateTemplatesForm.php">
        <button>Update Templates</button>
    </a>

</body>

</html>