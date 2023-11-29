<?php
/*
  Obtain user given information
  Lead to createPortfolioDB
*/

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
                <h1 id="form_header">Create your resume!</h1>
            </div>
        </div>

        <div class="flex-container">
            <div class="flex-item-1">
                <form action="./DB/createPortfolioDB.php" method="post">
                    <div class="flex-item-login">
                        <h2>Please input data</h2>
                    </div>

                    <div class="flex-item">
                        <input type="text" name="firstlastname" placeholder="Enter your first and last name" required>
                    </div>

                    <div class="flex-item">
                        <input type="text" name="expierence" placeholder="Enter your past work expierence" required>
                    </div>

                    <div class="flex-item">
                        <input type="text" name="skills" placeholder="Enter your skills" required>
                    </div>

                    <div class="flex-item">
                        <input type="text" name="description" placeholder="Enter a brief description" required>
                    </div>

                    <div class="flex-item">
                        <input type="text" name="templateSelection" placeholder="Enter template ID you want to use" required>
                    </div>
                    
                    <div class="flex-item">
                        <button type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</body>
</html>