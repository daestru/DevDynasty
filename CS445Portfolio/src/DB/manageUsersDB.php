<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection details
    $host = "localhost";
    $username = "cs445";
    $password = "pass";
    $database = "cs445portfolio";

    $conn = new mysqli($host, $username, $password, $database);

    $username = mysqli_real_escape_string($conn, $_POST["user_uname"]);
    $newMail = mysqli_real_escape_string($conn, $_POST["new_mail"]);

    if(!empty($newMail)){
        $sql0 =  "UPDATE users SET email='$newMail' WHERE username='$username'";
        if ($conn->query($sql0) === TRUE) {
            echo "Email updated successfully!";
        } else {
            echo "Error updating email: " . $conn->error;
        }
    }

    else{
        $sql0 =  "DELETE FROM users WHERE username='$username'";
        if ($conn->query($sql0) === TRUE) {
            echo "Email updated successfully!";
        } else {
            echo "Error updating email: " . $conn->error;
        }
    }
    
    header("location: ../manageUsersForm.php");

    
}
?>
