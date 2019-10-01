<?php
session_start();
include_once('../sqlconnect.php');

$_SESSION['res_date'] = $_POST['res_date'];
$_SESSION['res_time'] = $_POST['res_time'];
$_SESSION['res_hours'] = $_POST['res_hours'];

echo $_SESSION['res_field_id'];


$sql2 = 'INSERT INTO reservations (res_id, res_field_id, res_name, res_email, res_sched_date, res_sched_time_in, res_sched_hours, res_status, res_payment_status) VALUES (NULL, "'.$_SESSION['res_field_id'].'", "'.$_SESSION['name'].'","'.$_SESSION['email'].'","'.$_SESSION['res_date'].'" ,"'.$_SESSION['res_time'].'","'.$_SESSION['res_hours'].'","pending", 0)';
$con->query($sql2);

$sql = 'UPDATE fields SET field_status = 0 WHERE field_custom_id = "'.$_SESSION['res_field_id'].'"';
$con->query($sql);

$sql1 = "INSERT INTO reservation_logs (log_id, log_user_email, log_user_name, log_description, log_timestamp) VALUES (NULL, '".$_SESSION['name']."','".$_SESSION['email']."', 'Applied a reservation for ".$_SESSION['res_field_id'].".', current_timestamp())";
$con->query($sql1);


header('Location: ../reservations.php');

?>