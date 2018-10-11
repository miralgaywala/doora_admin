<?php
$id=$_GET['id'];
//echo $category_id;

        require_once("admin_controller.php");
        $controller=new admin_controller();
        $controller->delete_admin($id);
      
        ?>