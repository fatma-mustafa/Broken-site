<?php
session_start();
if(!isset($_SESSION))
header('location:login.php');
exit();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    <h1>Hi Admin</h>    
    <a href="logout.php" >Log out</a>
</body>
</html>