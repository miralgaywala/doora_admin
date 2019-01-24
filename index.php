<!DOCTYPE html>
 <html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
                <?php 
           if (!isset($_SESSION)) {
            session_start();
        }
         ?>
       <?php
        if($_SESSION == NULL)
        {
            echo "<script>location.href='login.php'</script>";
            exit;
        }
        else
        {
           include 'Controller/category/dashboard_controller.php';
            $controller=new dashboard_controller();
            $controller->dashboard();
        }
        ?>
    </body>
</html>