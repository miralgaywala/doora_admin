<?php
$category_id=$_GET['id'];
//echo $category_id;

        require_once("category_controller.php");
        $controller=new category_controller();
        $controller->delete_category($category_id);
        include_once($_SERVER['DOCUMENT_ROOT'].'/doora/adminpanel/Controller/category/displaycategorycontroller.php');
        ?>