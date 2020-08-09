<?php
$user_id=$_GET['id'];
//echo $user_id;
        include ".././business/business_controller.php";
        $controller=new business_controller();
        $controller->viewfreedaysdetail($user_id);
        ?>