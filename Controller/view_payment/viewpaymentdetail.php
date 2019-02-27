<?php
$invoice_id=$_GET['id'];
//echo $user_id;
        include ".././view_payment/payment_controller.php";
        $controller=new payment_controller();
        $controller->viewinvoice_detail($invoice_id);
        ?>