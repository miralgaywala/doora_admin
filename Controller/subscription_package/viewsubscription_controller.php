<?php
$subscription_id=$_GET['id'];
//echo $subscription_id;
        require_once("subscription_controller.php");
        $controller=new subscription_controller();
        $controller->view_subscription($subscription_id);
        ?>