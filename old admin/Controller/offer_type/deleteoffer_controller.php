<?php
$offer_id=$_GET['id'];
//echo $offer_id;
 		include ".././offer_type/offer_controller.php";
        $controller=new offer_controller();
        $controller->delete_offer($offer_id);
        ?>