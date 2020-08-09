<script>
  
     function opensubcategory()
      {
              $('li').removeClass('active');
              $('#sub_category').parents("li").addClass('active');
            $.ajax({
                 url:"../../Controller/sub_category/displaysubcategorycontroller.php",
                 method:"POST",
                 success:function(data)
                 {

                      $('.content-wrapper').html(data);
                      
                 }
              })
      }
      function opentag()
      {
              $('li').removeClass('active');
              $('#tag').parents("li").addClass('active');
            $.ajax({
                 url:"../../Controller/tag/displaytagcontroller.php",
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      
                 }
              })
      }
      function openoffer()
      {
              $('li').removeClass('active');
              $('#offer_type').parents("li").addClass('active');
            $.ajax({
                 url:"../../Controller/offer_type/displayoffercontroller.php",
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      
                 }
              })
      }
      function openDeal()
      {
         //alert("hii");
              $('li').removeClass('active');
              $('#deal').parents("li").addClass('active');
            $.ajax({
              // url:"../../Controller/offer_type/displayoffercontroller.php",
                 url:"../../Controller/deal/displaydeal_controller.php",
                 method:"POST",
                 success:function(data)
                 {
                  
                                          $('#example2').dataTable().fnDestroy();
                                           $.ajax({
                                           url: '../../Controller/deal/alldatafilter.php?data=a1',
                                           type: 'POST',
                                           success: function(data) {
                                                   
                                                   $("#result_data").empty();
                                                   $("#result_data").append(data);
                                                     $('#example2').dataTable({
                                                   
                                                    "destroy":true,
                                                });
                                                 }
                                          });
                      $('.content-wrapper').html(data);
                 }
              })
      }
      function opensubscription()
      {
              $('li').removeClass('active');
              $('#subscription').parents("li").addClass('active');
          $.ajax({
                 url:"../../Controller/subscription_package/displaysubscription_controller.php",
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      
                 }
              })
      }
      function opensupport()
      {
              $('li').removeClass('active');
              $('#support').parents("li").addClass('active');
        $.ajax({
                 url:"../../Controller/support/viewsupport_controller.php",
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      
                 }
              })
      }
      function opencontent()
      {
              $('li').removeClass('active');
              $('#content_management').parents("li").addClass('active');
        $.ajax({
                 url:"../../Controller/content_management/addcontentmanagement_controller.php",
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      
                 }
              })
      }
      function openbusiness()
      {
              $('li').removeClass('active');
              $('#business').parents("li").addClass('active');
        $.ajax({
                 url:"../../Controller/business/displaybusinesslist_controller.php",
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      
                 }
              })
      }
      function opencustomer()
      {
              $('li').removeClass('active');
              $('#customer').parents("li").addClass('active');
        $.ajax({
                 url:"../../Controller/customer/displaycustomerlist_controller.php",
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      
                 }
              })
      }
      function opencategory()
      {
              $('li').removeClass('active');
              $('#category').parents("li").addClass('active');
              $.ajax({
                       url:"../../Controller/category/displaycategorycontroller.php",
                       method:"POST",
                       success:function(data)
                       {
                            $('.content-wrapper').html(data);
                            
                       }
                    })
      }
      function opendashboard()
      {
          $('li').removeClass('active');
              $('#dashboard').parents("li").addClass('active');
               $.ajax({
                       url:"../../View/dashboard.php",
                       method:"POST",
                       success:function(data)
                       {
                            $('.content-wrapper').html(data);
                            
                       }
                    })
      }
      function openadmin()
      {
        $('li').removeClass('active');
              $('#admin').parents("li").addClass('active');
               $.ajax({
                       url:"../../Controller/admin/displayadminlist_controller.php",
                       method:"POST",
                       success:function(data)
                       {
                            $('.content-wrapper').html(data);
                            
                       }
                    })
      }
      function openpayment()
      {
        $('li').removeClass('active');
              $('#payment').parents("li").addClass('active');
               $.ajax({
                       url:"../../Controller/view_payment/displaypayment_controller.php",
                       method:"POST",
                       success:function(data)
                       {
                            $('.content-wrapper').html(data);
                            
                       }
                    })
      }
      function openreport()
      {
        $('li').removeClass('active');
              $('#report').parents("li").addClass('active');
               $.ajax({
                       url:"../../Controller/report/displayreport_controller.php",
                       method:"POST",
                       success:function(data)
                       {
                            $('.content-wrapper').html(data);
                       }
                    })
      }
  </script>
<?php
$base_name_page = basename($_SERVER['PHP_SELF']);
?>
<body class="hold-transition skin-blue sidebar-mini">

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <ul class="sidebar-menu" data-widget="tree">
        <li class="<?php if($base_name_page == "displaycategorycontroller.php" || $base_name_page == "addcategory.php" || $base_name_page == "editcategory_controller.php" || $base_name_page == "viewcategory_controller.php") { echo 'active';} ?>">
           <a onclick="opendashboard()" rel="tab" style="cursor: pointer;" id="dashboard"><i class="fa fa-dashboard"></i><span>Dashboard</span>
            <span class="pull-right-container"></span></a>
          <!-- <a href="../../Controller/category/displaycategorycontroller.php">
            <i class="fa fa-plus-square"></i><span>Category</span>
            <span class="pull-right-container">
            </span>
          </a> -->
        </li>
         <li class="treeview <?php if($base_name_page == "displaybusinesslist_controller.php" || $base_name_page == "businessfilter.php" || $base_name_page == "viewbusiness_controller.php" || $base_name_page == "viewbusinessbranch_controller.php" || $base_name_page == "viewbranchdetail_controller.php" || $base_name_page == "viewbusinessinvoice_controller.php" || $base_name_page == "viewinvoicedetail_controller.php" || $base_name_page == "displaycustomerlist_controller.php" || $base_name_page == "viewcustomer_controller.php" || $base_name_page == "displayadminlist_controller.php" || $base_name_page == "editadmin_controller.php" || $base_name_page == "addadmin.php" || $base_name_page == "viewadmin_controller.php") { echo 'menu-open active';} ?>">
          <a>
            <i class="fa fa-user"></i> <span>User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($base_name_page == "displaybusinesslist_controller.php" || $base_name_page == "businessfilter.php" || $base_name_page == "viewbusiness_controller.php" || $base_name_page == "viewbusinessbranch_controller.php" || $base_name_page == "viewbranchdetail_controller.php" || $base_name_page == "viewbusinessinvoice_controller.php" || $base_name_page == "viewinvoicedetail_controller.php") { echo 'active';} ?>">
              <a onclick="openbusiness()" rel="tab" style="cursor: pointer;" id="business"><i class="fa fa-circle-o"></i> <span>Business</span></a>
              <!-- <a href="../../Controller/business/displaybusinesslist_controller.php" ><i class="fa fa-circle-o"></i> Business</a> -->
            </li>
            <li class="<?php if($base_name_page == "displaycustomerlist_controller.php" || $base_name_page == "viewcustomer_controller.php") { echo 'active';} ?>">
              <a onclick="opencustomer()" rel="tab" style="cursor: pointer;" id="customer"><i class="fa fa-circle-o"></i> <span>Customer</span></a>
              <!-- <a href="../../Controller/customer/displaycustomerlist_controller.php" ><i class="fa fa-circle-o"></i> Customer</a> -->
            </li>
            <!-- <li class="<?php if($base_name_page == "displayadminlist_controller.php" || $base_name_page == "editadmin_controller.php" || $base_name_page == "addadmin.php" || $base_name_page == "viewadmin_controller.php") { echo 'active';} ?>">
              <a onclick="openadmin()" rel="tab" style="cursor: pointer;" id="admin"><i class="fa fa-circle-o"></i> <span>Admin</span></a>
              <a href="../../Controller/admin/displayadminlist_controller.php" ><i class="fa fa-circle-o"></i> Admin</a> -->
            <!-- </li> --> 
          </ul>
        </li>
       <li class="<?php if($base_name_page == "displaysubcategorycontroller.php" || $base_name_page == "addsubcategory_controller.php" || $base_name_page == "editsubcategory_controller.php" || $base_name_page == "subcategoryfilter.php" || $base_name_page == "viewsubcategory_controller.php" || $base_name_page == "deletesubcategory_controller.php ") { echo 'active';} ?>">
          <a onclick="opensubcategory()" rel="tab" style="cursor: pointer;" id="sub_category"><i class="fa fa-minus-square"></i> <span>Sub category</span>
            <span class="pull-right-container"></span></a>
          <!-- <a href="../../Controller/sub_category/displaysubcategorycontroller.php" rel="tab">
            <i class="fa fa-minus-square"></i> <span>Sub category</span>
            <span class="pull-right-container">
            </span>
          </a> -->
          <script type="text/javascript"></script>
      </li>
        <li class="<?php if($base_name_page == "displaycategorycontroller.php" || $base_name_page == "addcategory.php" || $base_name_page == "editcategory_controller.php" || $base_name_page == "viewcategory_controller.php") { echo 'active';} ?>">
        	 <a onclick="opencategory()" rel="tab" style="cursor: pointer;" id="category"><i class="fa fa-plus-square"></i><span>Category</span>
            <span class="pull-right-container"></span></a>
          <!-- <a href="../../Controller/category/displaycategorycontroller.php">
            <i class="fa fa-plus-square"></i><span>Category</span>
            <span class="pull-right-container">
            </span>
          </a> -->
        </li>
        <li class="<?php if($base_name_page == "displaytagcontroller.php" || $base_name_page == "addtag.php" || $base_name_page == "edittag_controller.php" || $base_name_page == "viewtag_controller.php") { echo 'active';} ?>">
          <a onclick="opentag()" rel="tab" style="cursor: pointer;" id="tag"><i class="fa fa-clipboard"></i><span>Tag</span>
            <span class="pull-right-container"></span></a>
          <!-- <a href="../../Controller/tag/displaytagcontroller.php">
            <i class="fa fa-clipboard"></i> <span>Tag</span>
            <span class="pull-right-container">
            </span>
          </a> -->
        </li>
        <li class="<?php if($base_name_page == "displayoffercontroller.php" || $base_name_page == "addoffer.php" || $base_name_page == "editoffer_controller.php" || $base_name_page == "viewoffer_controller.php") { echo 'active';} ?>">
          <a onclick="openoffer()" rel="tab" style="cursor: pointer;" id="offer_type"><i class="fa fa-circle-o"></i><span>Offer Type</span>
            <span class="pull-right-container"></span></a>
          <!-- <a href="../../Controller/offer_type/displayoffercontroller.php">
            <i class="fa fa-circle-o"></i> <span>Offer type</span>
            <span class="pull-right-container">
            </span>
          </a> -->
        </li>
        <li class="<?php if($base_name_page == "viewdeal_controller.php" || $base_name_page == "viewdealdetail_controller.php") { echo 'active';} ?>">
          <a onclick="openDeal()" rel="tab" style="cursor: pointer;" id="deal"><i class="fa fa-handshake-o"></i><span> Deal</span>
            <span class="pull-right-container"></span></a>
          <!-- <a href="../../Controller/deal/viewdeal_controller.php">
            <i class="fa fa-handshake-o"></i> <span>Deal</span>
            <span class="pull-right-container">
            </span>
          </a> -->
        </li>
        <li class="<?php if($base_name_page == "displaysubscription_controller.php" || $base_name_page == "addsubscription.php" || $base_name_page == "editsubscription_controller.php" || $base_name_page == "viewsubscription_controller.php") { echo 'active';} ?>">
          <a onclick="opensubscription()" rel="tab" style="cursor: pointer;" id="subscription"><i class="fa fa-clipboard"></i><span>Subscription packages</span>
            <span class="pull-right-container"></span></a>
          <!-- <a href="../../Controller/subscription_package/displaysubscription_controller.php">
            <i class="fa fa-clipboard"></i> <span>Subscription packages</span>
            <span class="pull-right-container">
            </span>
          </a> -->
        </li>
        <li>
          <a onclick="openpayment()" rel="tab" style="cursor: pointer;" id="payment"><i class="fa fa-usd"></i><span>View Payment</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="<?php if($base_name_page == "addcontentmanagement_controller.php") { echo 'active';} ?>">
          <a onclick="opencontent()" rel="tab" style="cursor: pointer;" id="content_management"><i class="fa fa-group"></i><span>Content Management</span>
            <span class="pull-right-container"></span></a>
          <!-- <a href="../../Controller/content_management/addcontentmanagement_controller.php">
            <i class="fa fa-group"></i> <span>Content management</span>
            <span class="pull-right-container">
            </span>
          </a> -->
        </li>
        <li class="<?php if($base_name_page == "viewsupport_controller.php" || $base_name_page == "displaysupport_controller.php" || $base_name_page == "editsubscription_controller.php" || $base_name_page == "viewsubscription_controller.php") { echo 'active';} ?>">
          <a onclick="opensupport()" rel="tab" style="cursor: pointer;" id="support"><i class="fa fa-support"></i><span>Support</span>
            <span class="pull-right-container"></span></a>
          <!-- <a href="../../Controller/support/viewsupport_controller.php">
            <i class="fa fa-support"></i> <span>Support</span>
            <span class="pull-right-container">
            </span>
          </a> -->
        </li>
        <li class="<?php if($base_name_page == "viewsupport_controller.php" || $base_name_page == "displaysupport_controller.php" || $base_name_page == "editsubscription_controller.php" || $base_name_page == "viewsubscription_controller.php") { echo 'active';} ?>">
          <a onclick="openreport()" rel="tab" style="cursor: pointer;" id="support"><i class="fa fa-bar-chart"></i><span>Report</span>
            <span class="pull-right-container"></span></a>
          <!-- <a href="../../Controller/support/viewsupport_controller.php">
            <i class="fa fa-support"></i> <span>Support</span>
            <span class="pull-right-container">
            </span>
          </a> -->
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">