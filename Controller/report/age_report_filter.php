<?php 
$age_year = $_POST['age_year'];
include ".././report/report_controller.php";
$controller=new report_controller();
$controller->agefilter_year($age_year);
?>