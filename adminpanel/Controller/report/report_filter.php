<?php 
$msg=$_POST['deal_purchased_year'];
//echo $user_id;

include ".././report/report_controller.php";
$controller=new report_controller();
$controller->deal_purchased_year($msg);
?>