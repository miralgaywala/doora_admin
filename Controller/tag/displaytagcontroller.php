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
    </body>
</html>
