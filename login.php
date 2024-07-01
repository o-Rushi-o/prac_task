<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == 'POST'){
    include('dbconnect.php');
    $username= $_POST['name'];
    $password= $_POST['password'];
    // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // $sql="SELECT * from users where username='$username' AND password='$hashed_password'";
        $sql="SELECT * from users where username='$username'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num==1){
            while($row=mysqli_fetch_assoc($result)){
                if(password_verify($password, $row['password'])){
                    $login=true;
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $username;
                    header('location: home.php');
                }else{
                        $showError='Password not match!';
                }
            }
        }
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
    <?php include("navbar.php");
     if($login){
        echo 'user loggedin';
    }
    if($showError){
        echo $showError;
    }
    ?>

    <div class="container">
    <form action="login.php" method="post">
        username: <input type="text" name="name" id="name">
        password: <input type="password" name="password" id="password">
        <button type="submit">sign Up</button>
    </form>
</body>
</html>