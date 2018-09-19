<?php
$category_id=$_GET['id'];
//echo $category_id;
        require_once("category_controller.php");
        $controller=new category_controller();
        $controller->view_category($category_id);
        ?>