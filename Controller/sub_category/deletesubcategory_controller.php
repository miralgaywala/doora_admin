<?php
$subcategory_id=$_GET['id'];
//echo $subcategory_id;
        require_once("subcategory_controller.php");
        $controller=new subcategory_controller();
        $controller->delete_subcategory($subcategory_id);
     	include_once($_SERVER['DOCUMENT_ROOT'].'/doora/adminpanel/Controller/sub_category/displaysubcategorycontroller.php');
        ?>