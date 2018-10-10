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
        require_once("business_controller.php");
        $controller=new business_controller();   
        if(isset($_GET['id']))
        {
        $controller->display_businessuser($_GET['id']);
         }
       else
       {
         $controller->display_businessuser("0");
       }    
        ?>
    </body>
</html>
