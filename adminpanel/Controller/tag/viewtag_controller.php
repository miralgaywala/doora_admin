<?php
$tag_id=$_GET['id'];
//echo $tag_id;
       include ".././tag/tag_controller.php";
        $controller=new tag_controller();
        $controller->view_tag($tag_id);
        ?>