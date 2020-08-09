

        <?php
        include ".././doorapoints/doorapoints_controller.php";
        $controller=new doorapoints_controller();   
        if(isset($_GET['id']))
        {
        $controller->display_doorapoints($_GET['id']);
         }
       else
       {
         $controller->display_doorapoints("1");
       }    
        ?>
    
