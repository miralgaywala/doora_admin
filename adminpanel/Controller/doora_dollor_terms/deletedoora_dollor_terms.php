

        <?php
        $id=$_GET['id'];
        include ".././doora_dollor_terms/doora_dollor_terms_controller.php";
        $controller=new doora_dollor_terms_controller();   
         $controller->delete_doora_dollar_terms($id);    
        ?>
    
