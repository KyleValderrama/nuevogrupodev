<?php
session_start();

$_SESSION['res_field_id'] = $_POST['res_field_id'];

header("Location: reserve.php");

?>