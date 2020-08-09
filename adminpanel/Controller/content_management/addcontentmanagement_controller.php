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
         include ".././content_management/contentmanagement_controller.php";
      
        $controller=new content_controller();   
        if(isset($_GET['id']))
        {
        $controller->display_content($_GET['id']);
         }
       else
       {
         $controller->display_content("1");
       }    
        ?>
    </body>
</html>
