<?php
session_start();

if(isset($_POST['checkout_field_id']))
{
    $_SESSION['chk_field_id'] = $_POST['checkout_field_id'];
    header('Location: checkout.php');
}
if(isset($_POST['checkout_field_id_slip']))
{
    $_SESSION['chk_field_id'] = $_POST['checkout_field_id_slip'];
    $_SESSION['bill_hours'] = 0;
    $_SESSION['bill_field'] = "";
    header('Location: bill.php');
}

?>