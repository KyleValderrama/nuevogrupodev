<?php
include_once('sqlconnect.php');



require_once '../PHPMailer/src/Exception.php';
require_once '../PHPMailer/src/PHPMailer.php';
require_once '../PHPMailer/src/SMTP.php';

require_once '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//use PHPMailer\PHPMailer\SMTP;


    session_start();
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $_SESSION['otp'] = rand ( 100000 , 999999 );

    $_SESSION['verify_token'] = true;

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
    $mail->Subject = "Verification Code";
    $mail->setFrom("dev.nuevogrupo@gmail.com", "Nuevo Grupo Dev");
    $mail->Body = 
    "
    Hi <b>".$name."</b>! First time Login to a new device:<br>".php_uname().".<br>
    Please enter the verification code below to access your account.<br>

    <strong><h3>".$_SESSION['otp']."</h3></strong>

    ";
    $mail->addAddress($email);
    $mail->Send();
    
    header("Location: verify.php");
    
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    

?>