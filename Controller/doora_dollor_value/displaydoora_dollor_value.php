

        <?php
        include ".././doora_dollor_value/doora_dollor_value_controller.php";
        $controller=new doora_dollor_value_controller();   
        if(isset($_GET['id']))
        {
        $controller->display_doora_dollor_value($_GET['id']);
         }
       else
       {
         $controller->display_doora_dollor_value("1");
       }    
        ?>
    
