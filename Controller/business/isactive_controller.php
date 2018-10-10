<?php
$id=$_GET['id'];
$data=$_GET['value'];
//echo $data;
//echo $id;

        require_once("business_controller.php");
        $controller=new business_controller();
        $controller->is_active($id,$data);
      
        ?>