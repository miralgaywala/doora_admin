<?php
$id=$_GET['id'];
//echo $user_id;
        require_once("business_controller.php");
        $controller=new business_controller();
        $controller->viewbusiness_detail($id);
        ?>