<?php 
$msg=$_GET['user_id'];
//echo $user_id;

include ".././send_noti/sendnoti_controller.php";
$controller=new sendnoti_controller();
$controller->filter_business($msg);
?>