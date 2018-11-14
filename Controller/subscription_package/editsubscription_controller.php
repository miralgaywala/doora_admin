<?php
$subscription_id=$_GET['id'];
//echo $tag_id;
        require_once("subscription_controller.php");
        $controller=new subscription_controller();
        $controller->editlist_subscription($subscription_id);
        ?>