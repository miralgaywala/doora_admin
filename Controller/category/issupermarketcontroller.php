<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
       require_once("category_controller.php");
        $controller=new category_controller();
        $controller->is_supermarket();
        ?>
    </body>
</html>