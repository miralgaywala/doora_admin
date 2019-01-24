<?php 
$subcategory_id=$_GET['category_id'];
//echo $subcategory_id;
   include ".././sub_category/subcategory_controller.php";
   
         $controller=new subcategory_controller();
         $controller->filter_subcategory($subcategory_id);

?>
