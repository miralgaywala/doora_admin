<?php
$id=$_GET['id'];
//echo $user_id;
      include ".././business/business_controller.php";
        $controller=new business_controller();
        $controller->viewbusiness_detail($id);
        ?>