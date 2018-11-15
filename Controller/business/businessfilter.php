<?php 
$msg=$_GET['user_id'];
//echo $user_id;

require_once("business_controller.php");
$controller=new business_controller();
$controller->filter_business($msg);
?>