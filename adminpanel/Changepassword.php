
<?php

if (!isset($_SESSION)) {
    session_start();
}
?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</script>
<?php
include 'config.php';
if (isset($_POST['email_submit'])) {
            
    if (!empty($_POST['new_password']) && !empty($_POST['confirm_password'])) {
      $id=$_GET['admin_id'];
      $new_password = $_POST['new_password'];
      $confirm_password = $_POST['confirm_password'];
      $confirm_md_pass = md5($confirm_password);
      if($new_password == $confirm_password)
      {
          $sql = "select * from admin where is_deleted=0 AND admin_id= '" . $_GET['admin_id'] . "'";
           $data= mysqli_query($db,$sql);
          $result = array();
          while ($row=mysqli_fetch_assoc($data))
          {
            $result = $row;
          }
          if (count($result) < 1) {
                echo "<script>location.href='Changepassword.php?msg=User_Not_Exist&admin_id=".$id."'</script>";
          } else {
                $update_password = "update admin SET password='".$confirm_md_pass."' where admin_id=".$result['admin_id'];
                $retval= mysqli_query($db,$update_password);
                if(!$retval) 
                {
                    echo "<script>location.href='Changepassword.php?msg=Password Not Changed'</script>";
                }
                else
                {
                    unset($_SESSION);  
                    session_destroy();  
                    echo "<script>location.href='login.php?msg=Password_has_been_changed_successfully'</script>";
                }
             }
      }
      else
      {
              echo "<script>location.href='Changepassword.php?msg=New_password_and_confirm_password_not_same&admin_id=".$id."'</script>";
      }
    }
} 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/png" href="./../images/favicon.ico"/> 
    <title>Doora | Admin Panel</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
 
    <!-- Font Awesome -->
   <!--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    Ionicons
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"> -->
    <!-- Theme style -->
    <link rel="stylesheet" href="./dist/css/AdminLTE.min.css">
    <!-- iCheck --> 
    

     <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
 
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<style type="text/css">
.login-box-body, .register-box-body {

   background: #fff;
   padding: 20px;
   border-top: 0;
   color: #666;
   border-radius: 2rem;
   box-shadow: 0 10px 20px rgba(0,0,0,.19),0 6px 6px rgba(0,0,0,.23);

}
    .btn-primary {
    background-color: #f66867;
    border-color: #f66867;
}
.btn.btn-primary:hover
{
   background-color: #f66867;
    border-color: #f66867;
}
.btn .btn-primary .pull-right
{
  background-color: #f66867;
    border-color: #f66867;
}
.btn .btn-primary .pull-right:hover
{
  background-color: #f66867;
    border-color: #f66867;
}
.bg-aqua, .callout.callout-info, .alert-info, .label-info, .modal-info .modal-body {
    background-color: #f66867 !important;
}
.alert-info {
    border-color: #f66867;
}
</style>
 <style>
#snackbar {
 visibility: hidden;
 min-width: 350px;
 margin-left: -240px;
 background-color: #252838;
 color: #fff;
 text-align: center;
 border-radius: 2px;
 padding: 16px;
 position: fixed;
 z-index: 1;
 left: 55%;
 right: 45%;
 top: 60px;
 font-size: 17px;
}

#snackbar.show {
 visibility: visible;
 -webkit-animation: fadein 0.5s, fadeout 1.5s 5.0s;
 animation: fadein 0.5s, fadeout 1.5s 5.0s;
}

@-webkit-keyframes fadein {
 from {top: 0; opacity: 0;}
 to {top: 60px; opacity: 1;}
}

@keyframes fadein {
 from {top: 0; opacity: 0;}
 to {top: 60px; opacity: 1;}
}

@-webkit-keyframes fadeout {
 from {top: 60px; opacity: 1;}
 to {top: 0; opacity: 0;}
}

@keyframes fadeout {
 from {top: 60px; opacity: 1;}
 to {top: 0; opacity: 0;}
}
</style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
   <?php
    if (isset($_GET['msg']) && $_GET['msg'] != "") {
        $alert_msg = str_replace("_", " ", $_GET['msg']);
        $alert_msg = ucwords(strtolower($alert_msg));
        ?>
<div id='snackbar'><?php echo $alert_msg; ?></div>
    <script>
$(function() {
   var x = document.getElementById("snackbar");
 x.className = "show";
 setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
});
</script>
   <?php
    }
    ?>
    <div class="login-logo">
        
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body" id="login" style="padding-bottom: 0px;">
        <p class="login-box-msg">Reset Password</p>
        <form action="" method="post">
            <div class="form-group has-feedback">
                <input type="Password" name="new_password" id="new_password" class="form-control" required
                       placeholder="New Password" value="">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="Password" name="confirm_password" id="confirm_password" class="form-control" required
                       placeholder="Confirm Password" value="">
               <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <br>
            <div class="row">
                <div class="col-xs-4">
                  <button type="button" class="btn btn-default btn-block btn-flat" name="cancel" onclick="cancelPassword();">Cancel</button>
                </div>
                 <div class="col-xs-4">
                 </div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat" name="email_submit">Submit</button>
                </div>
            </div>
        </form>
        <br/>
    </div>
</div>
<!-- /.login-box -->
</body>
</html>
<script type="text/javascript">
    function cancelPassword (){
        window.location.href='login.php';
}
</script>