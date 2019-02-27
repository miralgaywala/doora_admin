<?php 
$msg=$_GET['user_id'];
//echo $user_id;

include ".././customer/customer_controller.php";
$controller=new customer_controller();
$controller->filter_business($msg);
?>