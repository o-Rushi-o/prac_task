<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header('location: login.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('dbconnect.php');
    $username = $_SESSION['username'];

    $sql = "DELETE FROM users WHERE username='$username'";
    if (mysqli_query($conn, $sql)) {
        session_unset();
        session_destroy();
        header("Location: login.php");
        exit();
    } else {
        echo "Error deleting account: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
