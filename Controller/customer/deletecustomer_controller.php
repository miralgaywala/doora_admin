<?php
$id=$_GET['id'];
//echo $user_id;
        require_once("customer_controller.php");
        $controller=new customer_controller();
        $controller->delete_customer($id);
        ?>