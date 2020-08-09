
<?php $id=$_GET['business_id'];
        include ".././deal/deal_controller.php";
        $controller=new deal_controller();          
        $controller->businessfilter_deal($id);         
        ?>
  
