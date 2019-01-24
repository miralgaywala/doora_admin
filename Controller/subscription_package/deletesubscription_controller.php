<?php
$subscription_id=$_GET['id'];
//echo $subscription_id;
          include ".././subscription_package/subscription_controller.php";
        $controller=new subscription_controller();
        $controller->delete_subscription($subscription_id);
        ?>