<?php
$offer_id=$_GET['id'];
//echo $tag_id;
        require_once("offer_controller.php");
        $controller=new offer_controller();
        $controller->view_offer($offer_id);
        ?>