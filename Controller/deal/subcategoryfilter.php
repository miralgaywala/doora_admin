
<?php $id=$_GET['subcategory_id'];
//echo $id;
       include ".././deal/deal_controller.php";
        $controller=new deal_controller();          
        $controller->subcategoryfilter_deal($id);         
        ?>
  
