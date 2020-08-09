<?php
$id=$_GET['id'];
$bid = $_GET['bid'];
        include ".././points_offer/points_offer_controller.php";
        $controller=new points_offer_controller();
        $controller->view_detail_poits_offer($id,$bid);
        ?>