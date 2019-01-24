<?php
$offer_id=$_GET['id'];
//echo $tag_id;
        include ".././offer_type/offer_controller.php";
        $controller=new offer_controller();
        $controller->editlist_offer($offer_id);
        ?>