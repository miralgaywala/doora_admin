<?php
$benefit_id=$_GET['id'];
//echo $subscription_id;
        include ".././subscription_package/subscription_controller.php";
        $controller=new subscription_controller();
        $controller->view_benefit($benefit_id);
        ?>