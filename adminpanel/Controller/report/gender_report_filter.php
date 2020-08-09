<?php 
$msg=$_POST['year_time'];
//echo $user_id;

include ".././report/report_controller.php";
$controller=new report_controller();
$controller->gender_report($msg);
?>