<?php 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {
    $loggedin=true;
}else{
  $loggedin = false;
}

echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav>
        <a href="home.php">home</a>';
        if(!$loggedin){
        echo '<a href="login.php">login</a>
        <a href="regi.php">signup</a>';
        }
        if($loggedin){
        echo '<a href="logout.php">logout</a>
    </nav>';}
    echo'
</body>
</html>';
?>