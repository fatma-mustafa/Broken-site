<?php
session_start();
include 'db-conn.php';
if($_SERVER["REQUEST_METHOD"]=='POST') 
{
    $email=$_POST['email'];
    $password= $_POST['pass'];
    $stm="SELECT * FROM users WHERE email='$email'";
    $conn=OpenCon();

    $query=$conn->query($stm);
    $data=$query->fetch_row();    //data[0]=name , data[1]=email, data[2]=pass , data[3]=role
    if($data!=null){

    if(password_verify($password,$data[2]) && $data[3] =="user" ){
    $_SESSION['user']=["name"=>$data[0], "email"=>$email ];
    header('location:user_dashboard.php');
    }
    else if(password_verify($password,$data[2]) && $data[3] =="admin" )
    {
        $_SESSION['user']=["name"=>$username, "email"=>$email ];
        header('location:admin_dashboard.php');
    }
    else
    echo "Check your email and password there is somehting wrong. ".$conn->error;

    CloseCon($conn);
    }
else
    echo "Check your email and password there is somehting wrong. ".$conn->error;
}
 
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
    <br>
    <form method="POST">
        <input type="email" name="email" placeholder="email" required>
        <br>
        <input type="password" name="pass" placeholder="password" required>
        <input type="submit" value="Sign In">
        <br>Don't have account? create one  <br>
        <a href="registration.php">Sign Up</a>

    </form>
    
</body>
</html>