<?php
    include "./DB/portfolioClass.php";
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
    <?php
        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Check if a serialized "portfolio" object is posted
            if (isset($_POST['portfolio'])) {
                // Unserialize the posted data and save it to $portfolio
                $serializedPortfolio = $_POST['portfolio'];
                $portfolio = unserialize(base64_decode($serializedPortfolio));
                $portfolioID = $portfolio->getPortfolioID();
            }
        }
    ?>            
        <div class="flex-container">
            <div class="flex-item-1">
                <form action="./DB/managePortfolioDB.php" method="post">
                    <div class="flex-item-login">
                        <h2>Please input data</h2>
                    </div>

                    <div class="flex-item">
                        <input type="text" name="firstlastname" placeholder="Enter your first and last name" required>
                    </div>

                    <div class="flex-item">
                        <input type="text" name="experience" placeholder="Enter your past work expierence" required>
                    </div>

                    <div class="flex-item">
                        <input type="text" name="skills" placeholder="Enter your skills" required>
                    </div>

                    <div class="flex-item">
                        <input type="text" name="description" placeholder="Enter a brief description" required>
                    </div>
                    <input type="hidden" name="portfolioID" value="<?php echo $portfolioID; ?>">
                    <script>
                    function selectTemplate(templateNumber) {
                        document.getElementById('templateSelection').value = templateNumber;
                    }
                    </script>

                    
                    <div class="flex-item">
                        <p>Select a template:</p>
                        <a href="#" onclick="selectTemplate(1)"><img src="./Templates/Gandhi.jpg" alt="Template 1"></a>
                        <a href="#" onclick="selectTemplate(2)"><img src="./Templates/Tyson.png" alt="Template 2"></a>
                        <a href="#" onclick="selectTemplate(3)"><img src="./Templates/3.png" alt="Template 3"></a>
                    </div>
                    <input type="hidden" name="templateSelection" id="templateSelection" value="-1" required>
                    <div class="flex-item">
                        <button type="submit">Submit</button>
                    </div>
                </form>
                <a href="./userDash.php">
                    <button>Dashboard</button>
                </a>
            </div>
        </div>

    </div>

</body>
</html>