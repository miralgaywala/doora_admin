<?php
$id=$_GET['id'];
//echo $tag_id;
        include ".././doorapoints/doorapoints_controller.php";
        $doorapoints_controller=new doorapoints_controller();
        $doorapoints_controller->editlist_doorapoints($id);
        ?>