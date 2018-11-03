
<?php $id=$_GET['subcategory_id'];
//echo $id;
        require_once("deal_controller.php");
        $controller=new deal_controller();          
        $controller->subcategoryfilter_deal($id);         
        ?>
  
