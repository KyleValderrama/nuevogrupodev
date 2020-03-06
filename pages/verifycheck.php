<?php
session_start();
include_once('sqlconnect.php');

$otp = $_POST['otp'];
$device = php_uname();
$email = $_SESSION['email'];

if($otp == $_SESSION['otp'])
{
    $sql = "INSERT INTO otp (id, otp_user_email, otp_user_device, otp_user_timestamp) VALUES (NULL, '".$email."','".$device."', current_timestamp())";
    $con->query($sql);

    $result = $con->query("select * from users WHERE user_email = '$email'")
    or die($con->error);
    $row = mysqli_fetch_array($result);
    if($row['user_privilege'] == "admin")
    {
        $_SESSION['logintoken'] = true;
        $_SESSION['admin'] = true;
        unset($_SESSION['verify']);
        header("Location: admin.php");
    }
    else
    {
        $_SESSION['agree'] = true;
        $_SESSION['logintoken'] = true;
        unset($_SESSION['verify']);
        header("Location: ../pages/");
    }
}
else
{
    $_SESSION['verifyerror'];
    header("Location: verify.php");
}

?>