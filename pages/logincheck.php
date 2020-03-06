<?php
include_once('sqlconnect.php');

$email = $_POST['email'];
$password = $_POST['password'];
$captcha;
$device = php_uname();

$_SESSION['password'] = $_POST['password'];

$email = stripslashes($email);
$password = stripslashes($password);
//$email = mysql_real_escape_string($email);
//$password = mysql_real_escape_string($password);

//mysql_connect('localhost', 'root', '');
//mysql_select_db('nuevogroup_db');

//Initiate Connection

if(isset($_POST['g-recaptcha-response'])){
    $captcha=$_POST['g-recaptcha-response'];
}



$result = $con->query("select * from users WHERE user_email = '$email' and user_password = '$password'")
    or die($con->error);
$row = mysqli_fetch_array($result);
if($row['user_email'] == $email && $row['user_password'] == $password)
{
    session_start();
    if($row['user_privilege'] == "admin")
    {
        if($captcha){
            $_SESSION['email'] = $row['user_email'];
            $_SESSION['name'] = $row['user_name'];
            $_SESSION['id'] = $row['user_id'];
            $resultotp = $con->query("select * from otp where otp_user_email = '$email' and otp_user_device = '$device'");
            $numrows = mysqli_num_rows($resultotp);
            if($numrows > 0)
            {
                $_SESSION['logintoken'] = true;
                $_SESSION['admin'] = true;
                header("Location: admin.php");
            }
            else
            {
                $_SESSION['verify'] = true;
                header("Location: sendverificationcode.php");
            }
        }
        else
        {
            $_SESSION['captchaerror'] = true;
            header("Location: login.php");
        }
    }
    else
    {
        if($captcha)
        {
            $_SESSION['email'] = $row['user_email'];
            $_SESSION['name'] = $row['user_name'];
            $_SESSION['id'] = $row['user_id'];
            $_SESSION['password'] = $password;
            $resultotp = $con->query("select * from otp where otp_user_email = '$email' and otp_user_device = '$device'");
            $numrows = mysqli_num_rows($resultotp);
            if($numrows > 0)
            {
                $_SESSION['agree'] = true;
                $_SESSION['logintoken'] = true;
                $_SESSION['password'] = $password;
                header("Location: ../pages/");   
            }
            else
            {
                $_SESSION['verify'] = true;
                header("Location: sendverificationcode.php");
            }
        }
        else
        {
            $_SESSION['captchaerror'] = true;
            header("Location: login.php");
        }
    }   
}
else
{
    session_start();
    $_SESSION['loginfailed'] = true;
    header("Location: login.php");
}


?>