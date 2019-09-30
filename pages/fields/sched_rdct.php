<?php
session_start();

$_SESSION['field_id'] = $_POST['field_id'];

header("Location: schedule.php");

?>
