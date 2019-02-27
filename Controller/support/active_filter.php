<?php
$support=$_POST['radio'];
//echo $tag_id;
        include ".././support/support_controller.php";
        $controller=new support_controller();
        $controller->support_filter($support);
        ?>