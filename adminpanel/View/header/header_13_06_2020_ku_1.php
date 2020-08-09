<?php 
  
   if (!isset($_SESSION)) {
    session_start();
}

?> 
<?php
        if($_SESSION == NULL)
        {
            echo "<script>location.href='../../login.php'</script>";
            exit;
        }
        ?>
<!DOCTYPE html>
<html>
<head>
   <link rel="shortcut icon" type="image/png" href="./../../../images/favicon.ico"/>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Doora| Admin Panel</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.5.7/full/ckeditor.js"></script>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script> 
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />        
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <!-- Morris chart 
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">-->
  <!-- jvectormap -->
  <link rel="stylesheet" href="../../bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<!-- <link rel="stylesheet" href="../../bower_components/jquery/dist/jquery.min.js">
<link rel="stylesheet" href="../../css/select2.min.css">
<link rel="stylesheet" href="../../css/select2.full.min.js"> -->

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script> -->
<!-- link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/eonasdan-bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/eonasdan-bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="../../css/style.css">
<style type="text/css">
   .fancybox-is-open .fancybox-bg {
    opacity: .7;
}
 </style>
  
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="./../../../images/doora_admin_logo.png" style="height: 22px;width: 35px;"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg" style="font-size: 18px; "><img src="./../../../images/doora_admin_fulllogo.png" style="height: 22px;width: 100px;"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
          
          <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
            <li class="dropdown user user-menu">
            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
               <span class="hidden-xs"><?php echo $_SESSION['admin_name']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <style type="text/css">
                .navbar-nav>.user-menu>.dropdown-menu>li.user-header>img
                {
                  border: none;

                }
              </style>
              <li class="user-header">
                <img src="./../../../images/doora_logout.png" alt="User Image" style="object-fit: contain;">
                <p style="color: #f66867;">
                <?php echo $_SESSION['admin_name'] ?>
                 </p>
              <li class="user-footer">
                <div class="pull-left">
                </div>
                <div class="pull-right">
                  <a onclick="Jslogoutalrt();" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
       
    </nav>
  </header>
<script type="text/javascript">
  $(function()
  {
    $('.select2').select2();
  });
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script type="text/javascript">
function Jslogoutalrt(){
  $.confirm({
    title:'Logout',
    content: 'Are you sure you want to log out?',
    buttons: {
      Yes: {
            btnClass: 'btn-red any-other-class', 
          action: function(){
            window.location.href='../../logout.php';
          }
        },
        No: {
            btnClass: 'btn-blue'
            
        }
    }
});
}
</script>
<style type="text/css">
   .select2-container .select2-selection--single .select2-selection__rendered {
    margin-top: -5px;
}
.select2-container .select2-selection--single {
    
    height: 32px;
}
.select2-container--default .select2-selection--single {
     border-radius: 0px; 
     padding-left: 0px;
}
 a
 {
  color: #252838;
  text-decoration-color: #252838;
 }
 a:hover { 
  color: #252838;
  text-decoration-color: #252838;
}
 .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover
 {
  background-color: #f66867;
  border-color:#f66867;
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
 h2 {
     font-size: 20px; 
}
.skin-blue .sidebar-menu>li:hover>a, .skin-blue .sidebar-menu>li.active>a, .skin-blue .sidebar-menu>li.menu-open>a {
    color: #fff;}
.btn-default
    {
      color: #6c757d;
   background-color: transparent;
   background-image: none;
   border-color: #6c757d;
    }
    table {table-layout:fixed;}
       table td {word-wrap:break-word;}
       .skin-blue .main-header li.user-header {
    background-color: #fff;
}
</style>