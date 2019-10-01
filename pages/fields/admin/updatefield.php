<?php
include('../../sqlconnect.php');
session_start();

$sql3 = "SELECT * FROM fields WHERE NOT field_custom_id ='".$_SESSION['edit_field_custom_id']."' ";
$result = $con->query($sql3);
$rowcount = 0;
while($row = mysqli_fetch_array($result))
{
    if($row['field_custom_id'] == $_POST['edit_field_custom_id'])
    {
        $rowcount++;
    }
}



//echo $rowcount;

if($rowcount > 0)
{
    $_SESSION['editidexist'] = true;
    header('Location: editfield.php');
}
else
{
    $sql='UPDATE fields SET field_name = "'.$_POST['edit_field_name'].'",
    field_category = "'.$_POST['edit_field_category'].'",
    field_address = "'.$_POST['edit_field_address'].'",
    field_img_url = "'.$_POST['edit_field_img_url'].'",
    field_custom_id = "'.$_POST['edit_field_custom_id'].'"
     WHERE field_custom_id = "'.$_SESSION['edit_field_custom_id'].'"';
    $con->query($sql);

    $sql2 = "INSERT INTO admin_logs (admin_log_id, admin_log_name, admin_log_desc, admin_log_time) VALUES (NULL, '".$_SESSION['name']."', 'Updated the Field ".$_POST['edit_field_custom_id']."', current_timestamp() ) ";
    $con->query($sql2);


    $_SESSION['updatefield'] = true;
    unset($_SESSION['edit_field_name']);
    unset($_SESSION['edit_field_category']);
    unset($_SESSION['edit_field_address']);
    unset($_SESSION['edit_field_img_url']);
    unset($_SESSION['edit_field_custom_id']);


    header('Location: index.php');
}


?>