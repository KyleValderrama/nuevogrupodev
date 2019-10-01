<?php
session_start();
include_once('sqlconnect.php');
require_once('../vendor/autoload.php');

\Stripe\Stripe::setApiKey('sk_test_irEPKX6zOJH16BhQbrt1QQO800LV8iPKFu');

$fullname = $_POST['full_name'];
$email = $_POST['email'];
$token = $_POST['stripeToken'];
$product = $_SESSION['chk_field_id'];

$total = $_SESSION['total'];

echo $token;


//Create Customer
$customer = \Stripe\Customer::create(array(
   "email" => $email,
   "source" => $token
));

//Charge Customer
$charge = \Stripe\Charge::create(array(
    "amount" => number_format($total,2,"",""),
    "currency" => "php",
    "description" => "Payment of Reservation for ".$product ,
    "customer" => $customer->id
));

$sql = "UPDATE reservations SET res_payment_status = 1 WHERE res_field_id = '".$product."' ";
$con->query($sql);

$sql1 = "INSERT INTO reservation_logs (log_id, log_user_email, log_user_name, log_description, log_timestamp) VALUES (NULL, '".$_SESSION['name']."','".$_SESSION['email']."', 'Submitted their Payment of reservation for ".$product.".', current_timestamp())";
$con->query($sql1);

$_SESSION['payment'] = true;
header('Location: reservations.php');

?>