<?php
$id=$_GET['id'];
        include ".././points_offer/points_offer_controller.php";
        $controller=new points_offer_controller();
        $controller->view_editdetail_poits_offer($id);
        ?>