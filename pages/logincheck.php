<?php
include_once('sqlconnect.php');

$email = $_POST['email'];
$password = $_POST['password'];

$email = stripslashes($email);
$password = stripslashes($password);
//$email = mysql_real_escape_string($email);
//$password = mysql_real_escape_string($password);

//mysql_connect('localhost', 'root', '');
//mysql_select_db('nuevogroup_db');

//Initiate Connection


$result = $con->query("select * from users WHERE user_email = '$email' and user_password = '$password'")
    or die($con->error);
$row = mysqli_fetch_array($result);
if($row['user_email'] == $email && $row['user_password'] == $password)
{
    session_start();
    if($row['user_privilege'] == "admin")
    {
        $_SESSION['logintoken'] = true;
        $_SESSION['id'] = $row['user_id'];
        $_SESSION['email'] = $row['user_email'];
        $_SESSION['name'] = $row['user_name'];
        $_SESSION['admin'] = true;
        header("Location: admin.php");
    }
    else
    {
        $_SESSION['logintoken'] = true;
        $_SESSION['id'] = $row['user_id'];
        $_SESSION['email'] = $row['user_email'];
        $_SESSION['name'] = $row['user_name'];
        header("Location: ../pages/");
    }
}
else
{
    session_start();
    $_SESSION['loginfailed'] = true;
    header("Location: login.php");
}


?>