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
        $controller->display_subcategory();
        ?>
    </body>
</html>
