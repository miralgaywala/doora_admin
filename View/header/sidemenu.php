<!-- <script type="text/javascript">
function changeurl()
{

 var href = $(this).attr('href');
 alert(href);
 window.history.pushState("data","Title",href);
}
</script> -->

<?php
$base_name_page = basename($_SERVER['PHP_SELF']);
?>
<body class="hold-transition skin-blue sidebar-mini">

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <ul class="sidebar-menu" data-widget="tree">

         <li  class="treeview <?php if($base_name_page == "displaybusinesslist_controller.php" || $base_name_page == "businessfilter.php" || $base_name_page == "viewbusiness_controller.php" || $base_name_page == "viewbusinessbranch_controller.php" || $base_name_page == "viewbranchdetail_controller.php" || $base_name_page == "viewbusinessinvoice_controller.php" || $base_name_page == "viewinvoicedetail_controller.php" || $base_name_page == "displaycustomerlist_controller.php" || $base_name_page == "viewcustomer_controller.php" || $base_name_page == "displayadminlist_controller.php" || $base_name_page == "editadmin_controller.php" || $base_name_page == "addadmin.php" || $base_name_page == "viewadmin_controller.php") { echo 'menu-open active';} ?>">
          <a>
            <i class="fa fa-user"></i> <span>User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($base_name_page == "displaybusinesslist_controller.php" || $base_name_page == "businessfilter.php" || $base_name_page == "viewbusiness_controller.php" || $base_name_page == "viewbusinessbranch_controller.php" || $base_name_page == "viewbranchdetail_controller.php" || $base_name_page == "viewbusinessinvoice_controller.php" || $base_name_page == "viewinvoicedetail_controller.php") { echo 'active';} ?>">
              <a href="../../Controller/business/displaybusinesslist_controller.php" ><i class="fa fa-circle-o"></i> Business</a>
            </li>
            <li class="<?php if($base_name_page == "displaycustomerlist_controller.php" || $base_name_page == "viewcustomer_controller.php") { echo 'active';} ?>">
              <a href="../../Controller/customer/displaycustomerlist_controller.php" ><i class="fa fa-circle-o"></i> Customer</a>
            </li>
            <li class="<?php if($base_name_page == "displayadminlist_controller.php" || $base_name_page == "editadmin_controller.php" || $base_name_page == "addadmin.php" || $base_name_page == "viewadmin_controller.php") { echo 'active';} ?>">
              <a href="../../Controller/admin/displayadminlist_controller.php"><i class="fa fa-circle-o"></i> Admin</a>
            </li>
          </ul>
        </li>
       <li class="<?php if($base_name_page == "displaysubcategorycontroller.php" || $base_name_page == "addsubcategory_controller.php" || $base_name_page == "editsubcategory_controller.php" || $base_name_page == "subcategoryfilter.php" || $base_name_page == "viewsubcategory_controller.php" || $base_name_page == "deletesubcategory_controller.php ") { echo 'active';} ?>">
          <a href="../../Controller/sub_category/displaysubcategorycontroller.php" >
            <i class="fa fa-minus-square"></i> <span>Sub category</span>
            <span class="pull-right-container">
            </span>
          </a>
          <script type="text/javascript"></script>
 </li>
        <li class="<?php if($base_name_page == "displaycategorycontroller.php" || $base_name_page == "addcategory.php" || $base_name_page == "editcategory_controller.php" || $base_name_page == "viewcategory_controller.php") { echo 'active';} ?>">
          <a href="../../Controller/category/displaycategorycontroller.php">
            <i class="fa fa-plus-square"></i> <span>Category</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="<?php if($base_name_page == "displaytagcontroller.php" || $base_name_page == "addtag.php" || $base_name_page == "edittag_controller.php" || $base_name_page == "viewtag_controller.php") { echo 'active';} ?>">
          <a href="../../Controller/tag/displaytagcontroller.php">
            <i class="fa fa-clipboard"></i> <span>Tag</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="<?php if($base_name_page == "displayoffercontroller.php" || $base_name_page == "addoffer.php" || $base_name_page == "editoffer_controller.php" || $base_name_page == "viewoffer_controller.php") { echo 'active';} ?>">
          <a href="../../Controller/offer_type/displayoffercontroller.php" >
            <i class="fa fa-circle-o"></i> <span>Offer type</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="<?php if($base_name_page == "viewdeal_controller.php" || $base_name_page == "viewdealdetail_controller.php") { echo 'active';} ?>">
          <a href="../../Controller/deal/viewdeal_controller.php">
            <i class="fa fa-handshake-o"></i> <span>Deal</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="<?php if($base_name_page == "displaysubscription_controller.php" || $base_name_page == "addsubscription.php" || $base_name_page == "editsubscription_controller.php" || $base_name_page == "viewsubscription_controller.php") { echo 'active';} ?>">
          <a href="../../Controller/subscription_package/displaysubscription_controller.php" >
            <i class="fa fa-clipboard"></i> <span>Subscription packages</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-inr"></i> <span>View Payment</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="<?php if($base_name_page == "addcontentmanagement_controller.php") { echo 'active';} ?>">
          <a href="../../Controller/content_management/addcontentmanagement_controller.php" >
            <i class="fa fa-group"></i> <span>Content management</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="<?php if($base_name_page == "viewsupport_controller.php" || $base_name_page == "displaysupport_controller.php" || $base_name_page == "editsubscription_controller.php" || $base_name_page == "viewsubscription_controller.php") { echo 'active';} ?>">
          <a href="../../Controller/support/viewsupport_controller.php">
            <i class="fa fa-support"></i> <span>Support</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
<script type="text/javascript">
  
</script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    

