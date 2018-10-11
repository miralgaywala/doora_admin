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
        require_once("customer_controller.php");
        $controller=new customer_controller();   
        if(isset($_GET['id']))
        {
        $controller->display_customer($_GET['id']);
         }
       else
       {
         $controller->display_customer("0");
       }    
        ?>
    </body>
</html>
