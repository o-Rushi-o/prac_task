<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
</head>
<body>
    <h1>Thank You for Registering!</h1>
    <p>You will be redirected to the login page shortly.</p>
</body>
<script>
        // Redirect to login.php after 3 seconds
        setTimeout(function(){
            window.location.href = 'login.php';
        }, 3000);
    </script>
</html>
