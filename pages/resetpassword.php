<?php
include_once('sqlconnect.php');



require_once '../PHPMailer/src/Exception.php';
require_once '../PHPMailer/src/PHPMailer.php';
require_once '../PHPMailer/src/SMTP.php';

require_once '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//use PHPMailer\PHPMailer\SMTP;


$email = $_POST['email'];


$result = $con->query("select * from users WHERE user_email = '$email'");
if(mysqli_num_rows($result) > 0)
{
    session_start();
    $_SESSION['reset_email'] = $email;

    $_SESSION['reset_token'] = true;

    $mail = new PHPMailer(true);

    try {
    $mail->SMTPDebug = 2; 
    $mail->Host = "smtp.gmail.com";
    $mail->isSMTP();
    $mail->SMTPAuth = "true";
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;
    $mail->Username = "dev.nuevogrupo@gmail.com";
    $mail->Password = "Nuevogrupo2020";
    $mail->isHTML(true);
    $mail->Subject = "Reset Password";
    $mail->setFrom("dev.nuevogrupo@gmail.com", "Nuevo Grupo Dev");
    $mail->Body = 
    "
    Hi <b>".$email."</b>! We heard that you have trouble accessing your account.<br>
    Please proceed to the link below to reset your account.<br><br>

    <a href = 'http://localhost/nuevogroupdev/pages/accountreset.php'>Reset Account<a/>
    ";
    $mail->addAddress($email);
    $mail->Send();
    
    $_SESSION['reset_success'] = true;
    header("Location: forgetpassword.php");
    
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    
}
else
{
    session_start();
    $_SESSION['not_exist'] = true;
    header("Location: forgetpassword.php");
}


?>