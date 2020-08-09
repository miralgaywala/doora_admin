<?php
   
if(!isset($_SESSION)){
    session_start();
}
 $_SESSION = array();  
      unset($_SESSION);  
      session_destroy();  

 echo "<script>location.href='login.php?msg=logged_out&is_data=out'</script>";
 die();
?>
