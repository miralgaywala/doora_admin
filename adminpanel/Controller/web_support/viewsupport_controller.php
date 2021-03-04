
        <?php
        include ".././web_support/support_controller.php";
        $controller=new support_controller();   
        if(isset($_GET['id']))
        {
        $controller->display_support($_GET['id']);
         }
       else
       {
         $controller->display_support("1");
       }    
        ?>
    
