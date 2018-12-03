<?php
$id=$_GET['branch_id'];
        require_once("deal_controller.php");
        $controller=new deal_controller();          
        $controller->branch_deal($id);  
 ?>