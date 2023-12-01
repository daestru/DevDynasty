<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = "localhost";
    $username = "cs445";
    $password = "pass";
    $database = "cs445portfolio";

    $conn = new mysqli($host, $username, $password, $database);

    $username = mysqli_real_escape_string($conn, $_POST["user_uname"]);
    $password = mysqli_real_escape_string($conn, $_POST["user_psw"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);

    $sql3 =  "SELECT * FROM users WHERE username='".$username."' OR email='".$email."'";
    $result = $conn->query($sql3);
    $row = $result->fetch_assoc();
    

    if(($result->num_rows) < 1){
        $sql0 = "INSERT INTO users (username, email, passwrd, userType) VALUES ('$username', '$email', '$password', 'default')";
        $sql1 = "CREATE TABLE " . "cs445portfolio.portfolio" . $username . "(
            `portfolioID` INT NOT NULL AUTO_INCREMENT,
            `name` VARCHAR(45) NULL,
            `description` VARCHAR(60) NULL,
            `skills` VARCHAR(120) NULL,
            `experience` VARCHAR(120) NULL,
            `templateSelection` INT NULL,
            PRIMARY KEY (`portfolioID`))";

        if ($conn->query($sql0) === TRUE){
            if($conn->query($sql1) === TRUE){
                header("location: ../loginForm.php");
            }
        }
    }

    else{
        header("location: ../createuserForm.php?duplicateFail=true");
    }
}
?>
