
<?php $id=$_GET['category_id'];
//echo $id;
       include ".././deal/deal_controller.php";
        $controller=new deal_controller();          
        $controller->categoryfilter_deal($id);         
        ?>
  
