
<?php $id=$_GET['branch_id'];
//echo $id;
        require_once("deal_controller.php");
        $controller=new deal_controller();          
        $controller->branchfilter_deal($id);         
        ?>
  
