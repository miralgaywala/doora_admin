<?php
$id=$_GET['id'];
//echo $user_id;
        include ".././admin/admin_controller.php";
        $controller=new admin_controller();
        $controller->viewadmin_detail($id);
        ?>