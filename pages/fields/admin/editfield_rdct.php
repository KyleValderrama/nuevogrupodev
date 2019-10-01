<?php
include_once('../../sqlconnect.php');
session_start();

    $field_id = $_POST['edit_field_id'];
    $sql="SELECT * FROM fields WHERE field_custom_id = '".$field_id."'";
    $result = $con->query($sql);
    while($row = mysqli_fetch_array($result))
    {
        $_SESSION['edit_field_name'] = $row['field_name'];
        $_SESSION['edit_field_category'] = $row['field_category'];
        $_SESSION['edit_field_address'] = $row['field_address'];
        $_SESSION['edit_field_img_url'] = $row['field_img_url'];
        $_SESSION['edit_field_custom_id'] = $row['field_custom_id'];
    }

header('Location: editfield.php');

?>