

        <?php
        include ".././tag/tag_controller.php";
        $controller=new tag_controller();   
        if(isset($_GET['id']))
        {
        $controller->display_tag($_GET['id']);
         }
       else
       {
         $controller->display_tag("1");
       }    
        ?>
    
