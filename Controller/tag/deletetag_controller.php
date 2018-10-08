<?php
$tag_id=$_GET['id'];
//echo $tag_id;
        require_once("tag_controller.php");
        $controller=new tag_controller();
        $controller->delete_tag($tag_id);
        ?>