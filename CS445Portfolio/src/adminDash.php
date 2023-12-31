<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['userName'])) {
      header("Location: ../loginForm.php");
      exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <!-- Include necessary CSS -->
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <main class="content">

        <?php
        if (isset($_SESSION['userName'])) {
            echo '<p>Welcome admin, ' . $_SESSION['userName'] . '!</p>';
        } 
        else {
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
    <a href="./DB/logoutDB.php">
        <button>Logout</button>
    </a>
</body>

</html>