<?php
$subcategory_id=$_GET['id'];
//echo $subcategory_id;
   include ".././sub_category/subcategory_controller.php";
   
        $controller=new subcategory_controller();
        $controller->edit_subcategory($subcategory_id);
    ?>
 