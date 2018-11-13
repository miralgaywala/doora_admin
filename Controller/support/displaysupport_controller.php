<?php
$support_id=$_GET['id'];
//echo $tag_id;
        require_once("support_controller.php");
        $controller=new support_controller();
        $controller->view_support($support_id);
        ?>