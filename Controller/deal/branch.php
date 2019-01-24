<?php
$id=$_GET['branch_id'];
        include ".././deal/deal_controller.php";
        $controller=new deal_controller();          
        $controller->branch_deal($id);  
 ?>