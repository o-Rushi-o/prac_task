<?php

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true) {
    header('location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include("navbar.php");
        echo "welcome ".$_SESSION['username'];?>

    <!-- Update Password Form -->
    <form action="update.php" method="post">
        <label for="new_password">New Password:</label>
        <input type="password" name="new_password" id="new_password" required>
        <button type="submit">Update Password</button>
    </form>

    <!-- Delete Account Button -->
    <form action="delete.php" method="post" onsubmit="return confirm('Are you sure you want to delete your account?');">
        <button type="submit">Delete Account</button>
    </form>

</body>
</html>