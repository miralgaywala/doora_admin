<?php
$offer_id=$_GET['id'];
//echo $offer_id;
        require_once("offer_controller.php");
        $controller=new offer_controller();
        $controller->delete_offer($offer_id);
        ?>