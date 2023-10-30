<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection details
    $host = "localhost";
    $username = "cs445";
    $password = "pass";
    $database = "cs445portfolio";

    $conn = new mysqli($host, $username, $password, $database);
    if(!isset($_SESSION)) {
        session_start();
    }

    $username = mysqli_real_escape_string($conn, $_POST["user_uname"]);
    $password = mysqli_real_escape_string($conn, $_POST["user_psw"]);

    $sql0 =  "SELECT * FROM users WHERE username= '$username' AND passwrd= '$password'";
    $result = $conn->query($sql0);
    $row = $result->fetch_assoc();

    if (($result->num_rows) > 0) {
        $_SESSION['username'] = $row["username"];
        $_SESSION['userType'] = $row["userType"];
        header("location: ../userDash.php");
    }
    else {
        session_destroy();
        die(header("location:../loginForm.php?loginFailed=true"));
    }
}
?>
