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

       require_once("subcategory_controller.php");
        $controller=new subcategory_controller();

        if(isset($_GET['id']))
        {
              //echo "from controller".$_GET['id'];
              $controller->display_subcategory1($_GET['id']);
        }
       else
       {
         $controller->display_subcategory1("1");
       }
 
       
        ?>
    </body>
</html>
