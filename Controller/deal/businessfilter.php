
<?php $id=$_GET['business_id'];
        require_once("deal_controller.php");
        $controller=new deal_controller();          
        $controller->businessfilter_deal($id);         
        ?>
  
