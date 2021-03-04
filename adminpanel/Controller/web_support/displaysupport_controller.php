<?php
$support_id=$_GET['id'];
//echo $tag_id;
        include ".././web_support/support_controller.php";
        $controller=new support_controller();
        $controller->view_support($support_id);
        ?>