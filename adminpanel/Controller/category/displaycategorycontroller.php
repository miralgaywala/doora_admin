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
        // require_once("category_controller.php");
        include ".././category/category_controller.php";
        $controller=new category_controller();
        if(isset($_GET['id']))
        {
        $controller->display_category1($_GET['id']);
         }
       else
       {
         $controller->display_category1("1");
       }
        ?>
    </body>
</html>
