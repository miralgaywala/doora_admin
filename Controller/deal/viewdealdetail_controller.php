
<?php $id=$_GET['id'];

        require_once("deal_controller.php");
        $controller=new deal_controller();          
        $controller->viewdetail_deal($id);         
        ?>
  
