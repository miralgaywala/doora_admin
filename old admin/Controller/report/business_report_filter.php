<?php 
$business_list=$_POST['business_list'];
$business_year = $_POST['business_year'];

include ".././report/report_controller.php";
$controller=new report_controller();
$controller->business_year($business_list,$business_year);
?>