<?php
session_start();
include_once('sqlconnect.php');

//echo $_POST['res_cancel_id'];

$sql = "DELETE FROM reservations WHERE res_field_id = '".$_POST['res_cancel_id']."' AND res_name = '".$_SESSION['name']."' AND res_email = '".$_SESSION['email']."' ";
$con->query($sql);

$sql1 = "UPDATE fields SET field_status = 1 WHERE field_custom_id = '".$_POST['res_cancel_id']."' ";
$con->query($sql1);

$sql2 = "INSERT INTO reservation_logs (log_id, log_user_email, log_user_name, log_description, log_timestamp) VALUES (NULL, '".$_SESSION['name']."','".$_SESSION['email']."', 'Cancelled the reservation for ".$_POST['res_cancel_id'].".', current_timestamp())";
$con->query($sql2);


$_SESSION['res_cancelled'] = true;
header('Location: reservations.php');

?>