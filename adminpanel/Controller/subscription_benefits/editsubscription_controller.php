<?php
$benefit_id=$_GET['id'];
//echo $tag_id;
         include ".././subscription_benefits/subscription_controller.php";
        $controller=new subscription_controller();
        $controller->editlist_subscription($benefit_id);
        ?>