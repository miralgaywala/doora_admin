<?php
$id=$_GET['id'];
$data=$_GET['value'];
//echo $data;
//echo $id;

        include ".././support/support_controller.php";
        $controller=new support_controller();
        $controller->is_open($id,$data);
      
        ?>