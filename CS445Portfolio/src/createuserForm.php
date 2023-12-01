<?php
    if (isset($_GET['duplicateFail'])) {
        $message = "Information Already Registered.";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="flex-container-background">
        <div class="flex-container">
            <div class="flex-item-0">
                <h1 id="form_header">Create a User.</h1>
            </div>
        </div>

        <div class="flex-container">
            <div class="flex-item-1">
                <form action="./DB/createuserDB.php" method="post">
                    <div class="flex-item-login">
                        <h2>Welcome</h2>
                    </div>

                    <div class="flex-item">
                        <input type="text" name="user_uname" placeholder="Enter your Username" required>
                    </div>

                    <div class="flex-item">
                        <input type="password" name="user_psw" placeholder="Enter your Password" required>
                    </div>

                    <div class="flex-item">
                        <input type="text" name="email" placeholder="Enter your Email" required>
                    </div>
                    
                    <div class="flex-item">
                        <button type="submit">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</body>
</html>

