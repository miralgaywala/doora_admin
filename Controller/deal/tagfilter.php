
<?php $id=$_GET['tag_id'];
        require_once("deal_controller.php");
        $controller=new deal_controller();          
        $controller->tagfilter_deal($id);         
        ?>
  
