<?php
$frenchise_id=$_GET['id'];
//echo $user_id;
        require_once("business_controller.php");
        $controller=new business_controller();
        $controller->view_branch($frenchise_id);
        ?>