<?php
$id=$_GET['id'];
//echo $category_id;
		  include ".././admin/admin_controller.php";
      
        $controller=new admin_controller();
        $controller->delete_admin($id);
      
        ?>