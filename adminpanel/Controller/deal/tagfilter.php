
<?php $id=$_GET['tag_id'];
    include ".././deal/deal_controller.php";
        $controller=new deal_controller();          
        $controller->tagfilter_deal($id);         
        ?>
  
