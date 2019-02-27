
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
            $host="leocan.co";
            $user="leocamq9_spr_usr";
            $pass="spk123!@#";
            $database="leocamq9_sprookr_db";
            $db= mysqli_connect($host, $user, $pass, $database);

if (isset($_POST['sign_in'])) {
            
    if (!empty($_POST['user_name']) && !empty($_POST['user_pass'])) {
      
        $sql = "select * from admin where is_deleted=0 AND username= '" . $_POST['user_name'] . "' " .
            "AND password = '" . md5($_POST['user_pass']) . "' ";
    
     $data= mysqli_query($db,$sql);
        $result = array();
        while ($row=mysqli_fetch_assoc($data))
        {
          $result = $row;
        }
        if (count($result) < 1) {
             echo "<script>location.href='login.php?msg=error_please_try_again'</script>";
        } else {

             // 4 : Main Admin , 3 : Educational Agent , 5 : Sub Admin
            $_SESSION['email_address'] = $result['email_address'];
            $_SESSION['admin_name'] = $result['admin_name'];
            $_SESSION['is_login'] = true;
             echo "<script>location.href='index.php'</script>";
        }
    }
} 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
   
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

</head>
<body class="hold-transition login-page">
<div class="login-box">

    <?php
    if (isset($_GET['msg']) && $_GET['msg'] != "") {
        $alert_msg = str_replace("_", " ", $_GET['msg']);
        $alert_msg = ucwords(strtolower($alert_msg));
        ?>
        <div id="alert" class="alert alert-info" style="margin-left:0;" role="alert">
            <?php echo $alert_msg; ?>
        </div>
        <?php
    }
    ?>
    <div class="login-logo">
        <b>Doora</b>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body" id="login">
        <p class="login-box-msg">Sign In</p>
        <form action="" method="post">
            <div class="form-group has-feedback">
                <input type="text" name="user_name" id="user_name" class="form-control" required
                       placeholder="Email ID" value="">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="user_pass" id="user_pass" class="form-control" required
                       placeholder="Password" value="">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                </div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat" name="sign_in">Sign In</button>
                </div>
            </div>
        </form>
        <br/>
    </div>
</div>
<!-- /.login-box -->
</body>
</html>