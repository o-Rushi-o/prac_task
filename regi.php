<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == 'POST'){
    include('dbconnect.php');
    $username= $_POST['name'];
    $password= $_POST['password'];
    $cpassword= $_POST['cpassword'];
    
    // $exists=false;
    // /check whether this username Exists
    $existSql = "SELECT * from users where username = '$username'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows=mysqli_num_rows($result);
    if($numExistRows>0){
      $exists=true;
      $showError='User is Already Exists!';

    }else{
      $exists=false;
      if(($password==$cpassword)){
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
          $sql="INSERT INTO `users` (`username`, `password`) VALUES ('$username', '$hashed_password')";
          $result = mysqli_query($conn, $sql);
          if($result){
              header('location: ty.php');
              exit();
          }
      }else{
            $showError='Password not match!';
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
<?php include "navbar.php";
    if($showError){
        echo $showError;
    }

    ?>
<div class="container">
    <form action="regi.php" method="post">
        username: <input type="text" name="name" id="name">
        password: <input type="password" name="password" id="password">
        comfirm password <input type="password" name="cpassword" id="cpassword">
        <button type="submit">sign Up</button>
    </form>
</div>
</body>
</html>