<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
       include ".././offer_type/offer_controller.php";
        $controller=new offer_controller();   
        if(isset($_GET['id']))
        {
        $controller->display_offer($_GET['id']);
         }
       else
       {
         $controller->display_offer("1");
       }    
        ?>
    </body>
</html>


       
