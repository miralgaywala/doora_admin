 
<?php
$category_id=$_GET['id'];
//echo $category_id;
       include ".././category/category_controller.php";
        $controller=new category_controller();
        $controller->edit_category($category_id);
        ?>
 