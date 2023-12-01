<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = "localhost";
    $username = "cs445";
    $password = "pass";
    $database = "cs445portfolio";

    $conn = new mysqli($host, $username, $password, $database);

    $templateName = mysqli_real_escape_string($conn, $_POST["templateName"]);
    $templateID = mysqli_real_escape_string($conn, $_POST["templateID"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);

    if(!empty($templateID)){
        $sql0 =  "INSERT INTO templates (templateName, templateID, description) VALUES('$templateName', '$templateID', '$description')";
        if ($conn->query($sql0) === TRUE) {
            echo "Email updated successfully!";
        } else {
            echo "Error updating email: " . $conn->error;
        }
    }

    else{
        $sql0 =  "DELETE FROM templates WHERE templateName='$templateName'";
        if ($conn->query($sql0) === TRUE) {
            echo "Email updated successfully!";
        } else {
            echo "Error updating email: " . $conn->error;
        }
    }
    
    header("location: ../updateTemplatesForm.php");

    
}
?>
