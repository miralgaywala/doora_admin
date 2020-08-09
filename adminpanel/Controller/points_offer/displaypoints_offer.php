

        <?php
        include ".././points_offer/points_offer_controller.php";
        $controller=new points_offer_controller();   
        if(isset($_GET['id']))
        {
        $controller->display_points_offer($_GET['id']);
         }
       else
       {
         $controller->display_points_offer("1");
       }    
        ?>
    
