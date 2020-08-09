
<?php $id=$_GET['id'];

        include ".././deal/deal_controller.php";
        $controller=new deal_controller();          
        $controller->viewdetail_deal($id);         
        ?>
  
