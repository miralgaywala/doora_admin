

        <?php
        $id=$_GET['id'];
        include ".././doora_dollor_value/doora_dollor_value_controller.php";
        $controller=new doora_dollor_value_controller();   
         $controller->detail_doora_dollor_value($id);  
        ?>
    
