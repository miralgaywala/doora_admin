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
            echo "<script>location.href='./View/header/dashboard.php'</script>";
        }
        ?>
    </body>
</html>