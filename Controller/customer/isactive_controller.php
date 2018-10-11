<?php
$id=$_GET['id'];
$data=$_GET['value'];
//echo $data;
//echo $id;

        require_once("customer_controller.php");
        $controller=new customer_controller();
        $controller->is_active($id,$data);
      
        ?>