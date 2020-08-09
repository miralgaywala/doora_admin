

        <?php
        $id=$_GET['id'];
        include ".././doora_dollor_terms/doora_dollor_terms_controller.php";
        $controller=new doora_dollor_terms_controller();   
         $controller->detail_doora_dollor_terms($id);    
        ?>
    
