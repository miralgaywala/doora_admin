<?php 
$msg=$_POST['year_time'];
$category = $_POST['category'];

include ".././report/report_controller.php";
$controller=new report_controller();
$controller->category_year($msg,$category);
?>