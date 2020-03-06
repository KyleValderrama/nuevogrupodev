<?php
session_start();
include_once('sqlconnect.php');

$sql = "SELECT * FROM reservations WHERE res_field_id = '".$_SESSION['chk_field_id']."' AND res_name = '".$_SESSION['name']."' ";
$result = $con->query($sql);                      
while($row = mysqli_fetch_array($result))
{ 
  $hours = $row['res_sched_hours'];
  $_SESSION['bill_hours'] = $hours;
}

$result2 = $con->query("SELECT * FROM fields WHERE field_custom_id = '".$_SESSION['chk_field_id']."'");
while($row2 = mysqli_fetch_array($result2))
{ 
  $fieldname = $row2['field_name'];
  $_SESSION['bill_field'] = $fieldname;
}

$rate = 175;
$total = $rate * $_SESSION['bill_hours'];

$_SESSION['total'] = $total;



require_once __DIR__ . '../../vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();

$data = "<table cellpadding ='10' style='width:100%;border-spacing:0px;'>";
$data .= "<tr style ='background:#0099ff;'><td><h2 style='color:white;'>Nuevo Grupo Dev</h2><span style='color:white;font-size:12px'>Payer's Copy</span></td><td style='direction:rtl; text-align:start;'><strong><span style='color:white;'>Payment Slip</span></strong></td></tr>";
$data .= "<tr><td colspan='2' style='text-align:center;'><span>PHP</span><h1 style='font-size:40px'>".$total.".00</h1></td></tr>";
$data .= "<tr><td colspan='2' style='text-align:center;'><hr style='margin:0'></td></tr>";
$data .= "<tr><td colspan='2'>";
$data .= "<p><strong>Ordered By: </strong>".$_SESSION['name']."</p>";
$data .= "<p><strong>Field: </strong>".$_SESSION['bill_field']."</p>";
$data .= "<p><strong>Field ID: </strong>".$_SESSION['chk_field_id']."</p>";
$data .= "<p><strong>Number of Hours: </strong>".$_SESSION['bill_hours']." Hours</p>";
$data .= "</td></tr>";
$data .= "<tr><td colspan='2' style='text-align:center;'><hr style='margin:0'></td></tr>";
$data .= "<tr><td style='width:70%'></td><td style='text-align:center;'>________________________<p style='font-size:12px'>Signature</p></td></tr>";
$data .= "</table>";
$data .= "--------------------------------------------------------------------------------------------------------------------------------------------------------";
$data .= "<table cellpadding ='10' style='width:100%;border-spacing:0px;'>";
$data .= "<tr style ='background:#4d4d4d;'><td><h2 style='color:white;'>Nuevo Grupo Dev</h2><span style='color:white;font-size:12px'>Company's Copy</span></td><td style='direction:rtl; text-align:start;'><strong><span style='color:white;'>Payment Slip</span></strong></td></tr>";
$data .= "<tr><td colspan='2' style='text-align:center;'><span>PHP</span><h1 style='font-size:40px'>".$total.".00</h1></td></tr>";
$data .= "<tr><td colspan='2' style='text-align:center;'><hr style='margin:0'></td></tr>";
$data .= "<tr><td colspan='2'>";
$data .= "<p><strong>Ordered By: </strong>".$_SESSION['name']."</p>";
$data .= "<p><strong>Field: </strong>".$_SESSION['bill_field']."</p>";
$data .= "<p><strong>Field ID: </strong>".$_SESSION['chk_field_id']."</p>";
$data .= "<p><strong>Number of Hours: </strong>".$_SESSION['bill_hours']." Hours</p>";
$data .= "</td></tr>";
$data .= "<tr><td colspan='2' style='text-align:center;'><hr style='margin:0'></td></tr>";
$data .= "<tr><td style='width:70%'></td><td style='text-align:center;'>________________________<p style='font-size:12px'>Signature</p></td></tr>";
$data .= "</table>";

$stylesheet = file_get_contents('../css/stylepdf.css');

$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($data,\Mpdf\HTMLParserMode::HTML_BODY);
$mpdf->Output();


?>

