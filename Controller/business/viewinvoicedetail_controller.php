<?php
$invoice_id=$_GET['id'];
//echo $user_id;
        require_once("business_controller.php");
        $controller=new business_controller();
        $controller->viewinvoice_detail($invoice_id);
        ?>