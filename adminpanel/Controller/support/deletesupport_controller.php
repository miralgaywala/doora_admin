<?php
$support_id=$_GET['id'];
//echo $tag_id;
  include ".././support/support_controller.php";
        $controller=new support_controller();
        $controller->delete_support($support_id);
        ?>