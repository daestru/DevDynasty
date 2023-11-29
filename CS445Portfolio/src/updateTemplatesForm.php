<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="flex-container-background">
        <div class="flex-container">
            <div class="flex-item-0">
                <h1 id="form_header">User Manage</h1>
            </div>
        </div>

        <div class="flex-container">
            <div class="flex-item-1">
                <form action="./DB/updateTemplatesDB.php" method="post">
                    <div class="flex-item-login">
                        <h2>Add Template</h2>
                    </div>

                    <div class="flex-item">
                        <input type="text" name="templateName" placeholder="Enter Template Name" required>
                    </div>

                    <div class="flex-item">
                        <input type="text" name="templateID" placeholder="Enter Template ID" required>
                    </div>

                    <div class="flex-item">
                        <input type="text" name="description" placeholder="Enter Template Description" required>
                    </div>

                    <div class="flex-item">
                        <button type="submit">Templates</button>
                        
                    </div>
                </form>
                <form action="./DB/updateTemplatesDB.php" method="post">
                    <div class="flex-item-login">
                        <h2>Delete Template</h2>
                    </div>

                    <div class="flex-item">
                        <input type="text" name="templateName" placeholder="Template to Delete" required>
                    </div>

                    <div class="flex-item">
                        <button type="submit">Delete User</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</body>
</html>

