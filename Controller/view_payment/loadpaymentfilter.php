<?php 
$year= $_POST['year'];
$month= $_POST['month'];
$business_invoice=$_POST['business_invoice'];
		include ".././view_payment/payment_controller.php";
        $controller=new payment_controller();          
        $controller->loadfilter_payment($year,$month,$business_invoice);        
?>