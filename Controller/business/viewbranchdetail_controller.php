<?php
$frenchise_id=$_GET['id'];
//echo $user_id;
       include ".././business/business_controller.php";
        $controller=new business_controller();
        $controller->view_branch($frenchise_id);
        ?>