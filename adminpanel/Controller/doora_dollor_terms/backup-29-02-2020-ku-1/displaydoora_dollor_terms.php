

        <?php
        include ".././doora_dollor_terms/doora_dollor_terms_controller.php";
        $controller=new doora_dollor_terms_controller();   
        if(isset($_GET['id']))
        {
        $controller->display_doora_dollor_terms($_GET['id']);
         }
       else
       {
         $controller->display_doora_dollor_terms("1");
       }    
        ?>
    
