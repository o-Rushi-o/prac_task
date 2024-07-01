<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header('location: login.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('dbconnect.php');
    $new_password = $_POST['new_password'];
    $username = $_SESSION['username'];
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    $sql = "UPDATE users SET password='$hashed_password' WHERE username='$username'";
    if (mysqli_query($conn, $sql)) {
        echo "Password updated successfully.";
        session_unset();
        session_destroy();
        exit();
    } else {
        echo "Error updating password: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
</body>
<script>
        // Redirect to login.php after 3 seconds
        setTimeout(function(){
            window.location.href = 'login.php';
        }, 3000);
    </script>
</html>