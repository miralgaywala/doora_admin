<?php
$id=$_GET['id'];
//echo $user_id;
        require_once("admin_controller.php");
        $controller=new admin_controller();
        $controller->viewadmin_detail($id);
        ?>