
        <?php
         include ".././sub_category/subcategory_controller.php";
   
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

