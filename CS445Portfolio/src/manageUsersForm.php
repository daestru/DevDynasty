<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
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
                <form action="./DB/manageUsersDB.php" method="post">
                    <div class="flex-item-login">
                        <h2>Change Email</h2>
                    </div>

                    <div class="flex-item">
                        <input type="text" name="user_uname" placeholder="Enter Customer Username" required>
                    </div>

                    <div class="flex-item">
                        <input type="text" name="new_mail" placeholder="Enter New Email" required>
                    </div>

                    <div class="flex-item">
                        <button type="submit">Login</button>
                        
                    </div>
                </form>
                <form action="./DB/manageUsersDB.php" method="post">
                    <div class="flex-item-login">
                        <h2>Delete User</h2>
                    </div>

                    <div class="flex-item">
                        <input type="text" name="user_uname" placeholder="User to Delete" required>
                    </div>

                    <div class="flex-item">
                        <button type="submit">Delete User</button>
                    </div>
                </form>
                <a href="./adminDash.php">
                    <button>Dashboard</button>
                </a>
            </div>
        </div>

    </div>

</body>
</html>

