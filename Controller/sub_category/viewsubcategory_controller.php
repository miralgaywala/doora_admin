<?php
$subcategory_id=$_GET['id'];
//echo $subcategory_id;
        require_once("subcategory_controller.php");
        $controller=new subcategory_controller();
        $controller->view_subcategory($subcategory_id);
        ?>