<?php
$id=$_GET['id'];
//echo $user_id;
       include ".././customer/customer_controller.php";
        $controller=new customer_controller();
        $controller->viewcustomerhistory_detail($id);
        ?>