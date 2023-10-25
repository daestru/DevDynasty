<?php
    session_start();
    $username = $_SESSION['username'];
    $userType = $_SESSION['userType'];

    echo "<p>" . $username . "</p>";
    echo "<p>" . $userType . "</p>";

   
?>