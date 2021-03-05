<style type="text/css">
    
/*Huge thanks to @tobiasahlin at http://tobiasahlin.com/spinkit/ */
.spinner {
margin: 30px auto 0;
    background-color: #ecf0f5;
  width: 70px;
  text-align: center;
  margin-bottom: 20px;
}
.skin-blue .wrapper, .skin-blue .main-sidebar, .skin-blue .left-side {
    background-color: #ecf0f5;
}
ul.sidebar-menu.tree{
    background-color: #ffffff;

}

.spinner > div {
  width: 18px;
  height: 18px;
  background-color: #f66867;

  border-radius: 100%;
  display: inline-block;
  -webkit-animation: sk-bouncedelay 1.4s infinite ease-in-out both;
  animation: sk-bouncedelay 1.4s infinite ease-in-out both;
}

.spinner .bounce1 {
  -webkit-animation-delay: -0.32s;
  animation-delay: -0.32s;
}

.spinner .bounce2 {
  -webkit-animation-delay: -0.16s;
  animation-delay: -0.16s;
}

@-webkit-keyframes sk-bouncedelay {
  0%, 80%, 100% { -webkit-transform: scale(0) }
  40% { -webkit-transform: scale(1.0) }
}

@keyframes sk-bouncedelay {
  0%, 80%, 100% { 
    -webkit-transform: scale(0);
    transform: scale(0);
  } 40% { 
    -webkit-transform: scale(1.0);
    transform: scale(1.0);
  }
}
</style>

<script>
  

function topFunction() {
    // document.body.scrollTop = 0;
    //document.documentElement.scrollTop = 0;
    //$("html, body").animate({ scrollTop: 0 }, "slow");
    var $target = $('html,body');
    $target.animate({
        scrollTop: 0
    }, 500);
}


function gototop() {
    // document.body.scrollTop = 0;
    //document.documentElement.scrollTop = 0;
    //$("html, body").animate({ scrollTop: 0 }, "slow");
    var $target = $('html,body');
    $target.animate({
        scrollTop: 0
    }, 500);
}



function opensubcategory() {
    $('li').removeClass('active');
    $('#sub_category').parents("li").addClass('active');
    $.ajax({
        url: "../../Controller/sub_category/displaysubcategorycontroller.php",
        method: "POST",
        success: function(data) {

            $('.content-wrapper').html(data);

        }
    })
}

function opentag() {
    $('li').removeClass('active');
    $('#tag').parents("li").addClass('active');
    $.ajax({
        url: "../../Controller/tag/displaytagcontroller.php",
        method: "POST",
        success: function(data) {
            $('.content-wrapper').html(data);

        }
    })
}

function openoffer() {
    $('li').removeClass('active');
    $('#offer_type').parents("li").addClass('active');
    $.ajax({
        url: "../../Controller/offer_type/displayoffercontroller.php",
        method: "POST",
        success: function(data) {
            $('.content-wrapper').html(data);

        }
    })
}

function openDeal() {
    //alert("hii");
    $('li').removeClass('active');
    $('#deal').parents("li").addClass('active');
    $.ajax({
        // url:"../../Controller/offer_type/displayoffercontroller.php",
        url: "../../Controller/deal/displaydeal_controller.php",
        method: "POST",
        success: function(data) {

            $('#example2').dataTable().fnDestroy();
            $.ajax({
                url: '../../Controller/deal/alldatafilter.php?data=a1',
                type: 'POST',
                success: function(data) {

                    $("#result_data").empty();
                    $("#result_data").append(data);
                    $('#example2').dataTable({

                        "destroy": true,
                        "columnDefs": [{
                            "targets": [6, 7],
                            "orderable": false
                        }]
                    });
                }
            });
            $('.content-wrapper').html(data);
        }
    })
}

function opensubscription() {
    $('li').removeClass('active');
    $('#subscription').parents("li").addClass('active');
    $.ajax({
        url: "../../Controller/subscription_package/displaysubscription_controller.php",
        method: "POST",
        success: function(data) {
            $('.content-wrapper').html(data);

        }
    })
}

function openbenefits() {
    $('li').removeClass('active');
    $('#subscription').parents("li").addClass('active');
    $.ajax({
        url: "../../Controller/subscription_benefits/displaysubscription_controller.php",
        method: "POST",
        success: function(data) {
            $('.content-wrapper').html(data);

        }
    })
}

function opensupport() {
    $('li').removeClass('active');
    $('#support').parents("li").addClass('active');
    $.ajax({
        url: "../../Controller/support/viewsupport_controller.php",
        method: "POST",
        success: function(data) {
            gototop();
            $('.content-wrapper').html(data);

        }
    })
}

function openwebsupport() {
    $('li').removeClass('active');
    $('#support').parents("li").addClass('active');
    $.ajax({
        url: "../../Controller/web_support/viewsupport_controller.php",
        method: "POST",
        success: function(data) {
            gototop();
            $('.content-wrapper').html(data);

        }
    })
}

function opencontent() {
    $('li').removeClass('active');
    $('.content-wrapper_management').parents("li").addClass('active');
    $.ajax({
        url: "../../Controller/content_management/addcontentmanagement_controller.php",
        method: "POST",
        success: function(data) {
            $('.content-wrapper').html(data);

        }
    })
}

function openbusiness() {
    $('li').removeClass('active');
    $('#business').parents("li").addClass('active');
    $.ajax({
        url: "../../Controller/business/displaybusinesslist_controller.php",
        method: "POST",
        beforeSend: function(data) {
            $('#loader').slideToggle();
        },
        success: function(data) {
            $('.content-wrapper').html(data);
            $('#loader').slideToggle();

        }
    })
}

function opencustomer() {
    $('li').removeClass('active');
    $('#customer').parents("li").addClass('active');
    $.ajax({
        url: "../../Controller/customer/displaycustomerlist_controller.php",
        method: "POST",
        beforeSend: function(data) {
            $('#loader').slideToggle();
        },
        success: function(data) {
            $('.content-wrapper').html(data);
            $('#loader').slideToggle();

        }
    })
}

function opencategory() {
    $('li').removeClass('active');
    $('#category').parents("li").addClass('active');
    $.ajax({
        url: "../../Controller/category/displaycategorycontroller.php",
        method: "POST",
        success: function(data) {
            $('.content-wrapper').html(data);

        }
    })
}

function opendashboard() {
    $('li').removeClass('active');
    $('#dashboard').parents("li").addClass('active');
    $.ajax({
        url: "../../View/dashboard.php",
        method: "POST",
        success: function(data) {
            $('.content-wrapper').html(data);

        }
    })
}

function openadmin() {
    $('li').removeClass('active');
    $('#admin').parents("li").addClass('active');
    $.ajax({
        url: "../../Controller/admin/displayadminlist_controller.php",
        method: "POST",
        success: function(data) {
            $('.content-wrapper').html(data);

        }
    })
}

function openpayment() {
    $('li').removeClass('active');
    $('#payment').parents("li").addClass('active');
    $.ajax({
        url: "../../Controller/view_payment/displaypayment_controller.php",
        method: "POST",
        success: function(data) {
            $('.content-wrapper').html(data);

        }
    })
}

function openreport() {
    $('li').removeClass('active');
    $('#report').parents("li").addClass('active');
    $.ajax({
        url: "../../Controller/report/displayreport_controller.php",
        method: "POST",
        success: function(data) {
            $('.content-wrapper').html(data);
        }
    })
}

function sendcode() {
    $('li').removeClass('active');
    $('#sendcode').parents("li").addClass('active');
    $.ajax({
        url: "../../View/send_code/viewsendcode.php",
        method: "POST",
        success: function(data) {
            $('.content-wrapper').html(data);
        }
    })
}

function business_image() {
    $('li').removeClass('active');
    $('#buis_img').parents("li").addClass('active');
    $.ajax({
        url: "../../View/business_image/business_image.php",
        method: "POST",
        success: function(data) {
            $('.content-wrapper').html(data);
        }
    })
}

function customer_image() {
    $('li').removeClass('active');
    $('#cus_img').parents("li").addClass('active');
    $.ajax({
        url: "../../View/customer_image/customer_image.php",
        method: "POST",
        success: function(data) {
            $('.content-wrapper').html(data);
        }
    })
}

function sendnotification() {
    $('li').removeClass('active');
    $('#sendnoti').parents("li").addClass('active');
    $.ajax({
        url: "../../View/send_noti/send_noti.php",
        method: "POST",
        success: function(data) {
            $('.content-wrapper').html(data);
        }
    })
}

function doora_dollor_points() {
    $('li').removeClass('active');
    $('#doora_dollor_points').parents("li").addClass('active');
    $.ajax({
        url: "../../Controller/doorapoints/displaydoora_points.php",
        method: "POST",
        success: function(data) {
            $('.content-wrapper').html(data);
        },
        error: function(data) {
            console.log(data);
        }

    })
}

function points_offer() {
    $('li').removeClass('active');
    $('#points_offer').parents("li").addClass('active');
    $.ajax({
        url: "../../Controller/points_offer/displaypoints_offer.php",
        method: "POST",
        success: function(data) {
            $('.content-wrapper').html(data);
        }
    })
}

function doora_dollor_value() {
    $('li').removeClass('active');
    $('#doora_dollor_value').parents("li").addClass('active');
    $.ajax({
        url: "../../Controller/doora_dollor_value/displaydoora_dollor_value.php",
        method: "POST",
        success: function(data) {
            $('.content-wrapper').html(data);
        }
    })
}

function doora_dollor_terms() {
    $('li').removeClass('active');
    $('#doora_dollor_terms').parents("li").addClass('active');
    $.ajax({
        url: "../../Controller/doora_dollor_terms/displaydoora_dollor_terms.php",
        method: "POST",
        success: function(data) {
            $('.content-wrapper').html(data);
        }
    })
}

function home_getmore_section() {
    $.ajax({
        url: "website_editor/home_getmore_section.php",
        method: "post",
        success: function(res) {
            gototop();

            $(".content-wrapper").html(res);
        }
    });
}

function home_notification_section() {
    $.ajax({
        url: "website_editor/home_notification_section.php",
        method: "post",
        success: function(res) {
            gototop();

            $(".content-wrapper").html(res);
        }
    });
}

function home_stories_section() {
    $.ajax({
        url: "website_editor/home_stories_section.php",
        method: "post",
        success: function(res) {
            gototop();

            $(".content-wrapper").html(res);
        }
    });
}

function home_customer_section() {
    $.ajax({
        url: "website_editor/home_customer_section.php",
        method: "post",
        success: function(res) {
            gototop();

            $(".content-wrapper").html(res);
        }
    });
}

function home_merchant_section() {
    $.ajax({
        url: "website_editor/home_merchant_section.php",
        method: "post",
        success: function(res) {
            gototop();

            $(".content-wrapper").html(res);
        }
    });
}

function home_footer() {
    $.ajax({
        url: "website_editor/home_footer.php",
        method: "post",
        success: function(res) {
            gototop();

            $(".content-wrapper").html(res);
        }

    });
}

function customer_searchless_section() {
    $.ajax({
        url: "website_editor/customer_searchless_section.php",
        method: "post",
        success: function(res) {
            gototop();

            $(".content-wrapper").html(res);
        }

    });
}

function customer_image_section() {
    $.ajax({
        url: "website_editor/customer_image_section.php",
        method: "post",
        success: function(res) {
            gototop();

            $(".content-wrapper").html(res);
        }

    });
}

function customer_themost_section() {
    $.ajax({
        url: "website_editor/customer_themost_section.php",
        method: "post",
        success: function(res) {
            gototop();

            $(".content-wrapper").html(res);
        }

    });
}

function customer_footer() {
    $.ajax({
        url: "website_editor/customer_footer.php",
        method: "post",
        success: function(res) {
            gototop();

            $(".content-wrapper").html(res);
        }

    });
}

function merchant_makestories_section() {
    $.ajax({
        url: "website_editor/merchant_makestories_section.php",
        method: "post",
        success: function(res) {
            gototop();

            $(".content-wrapper").html(res);
        }

    });
}

function merchant_image_section() {
    $.ajax({
        url: "website_editor/merchant_image_section.php",
        method: "post",
        success: function(res) {
            gototop();

            $(".content-wrapper").html(res);
        }

    });
}

function merchant_noapp_section() {
    $.ajax({
        url: "website_editor/merchant_noapp_section.php",
        method: "post",
        success: function(res) {
            gototop();

            $(".content-wrapper").html(res);
        }

    });
}

function merchant_technology_section() {
    $.ajax({
        url: "website_editor/merchant_technology_section.php",
        method: "post",
        success: function(res) {
            gototop();

            $(".content-wrapper").html(res);
        }

    });
}

function merchant_footer() {
    $.ajax({
        url: "website_editor/merchant_footer.php",
        method: "post",
        success: function(res) {
            gototop();

            $(".content-wrapper").html(res);
        }

    });
}

function pricing_pricedto_section() {
    $.ajax({
        url: "website_editor/pricing_pricedto_section.php",
        method: "post",
        success: function(res) {
            gototop();

            $(".content-wrapper").html(res);
        }

    });
}

function pricing_footer() {
    $.ajax({
        url: "website_editor/pricing_footer.php",
        method: "post",
        success: function(res) {
            gototop();

            $(".content-wrapper").html(res);
        }

    });
}

function home_header() {
    $.ajax({
        url: "website_editor/home_header_web_list.php",
        method: "post",
        success: function(res) {
            gototop();

            $(".content-wrapper").html(res);
        }
    });
}

function merchant_intro() {
    $.ajax({
        url: "website_editor/merchant_intro_web.php",
        method: "post",
        success: function(res) {
            gototop();

            $(".content-wrapper").html(res);
        }
    });
}

function merchant_web() {
    $.ajax({
        url: "website_editor/merchant_about_web_list.php",
        method: "post",
        success: function(res) {
            gototop();

            $(".content-wrapper").html(res);
        }
    });
}

function merchant_do_web() {
    $.ajax({
        url: "website_editor/merchant_doora_do_web_list.php",
        success: function(res) {
            gototop();

            $(".content-wrapper").html(res);
        }
    });
}

function dd_about() {
    $.ajax({
        url: "website_editor/doora_doollars_about_web_list.php",
        success: function(res) {
            gototop();

            $(".content-wrapper").html(res);
        }
    });
}

function header_im() {
    $.ajax({
        url: "website_editor/header_list.php",
        success: function(res) {
            gototop();
            $(".content-wrapper").html(res);
        }
    });
}
function mer_gst_sec()
{
$.ajax({
    url : "website_editor/merchant_gst_section.php",
    method:"post",
    success:function(res)
    {
        gototop();
      $(".content-wrapper").html(res);
    }
});
}

</script>

<style type="text/css">
  section.content{
    padding-top: 10px;
  }
</style>

<?php $base_name_page = basename($_SERVER['PHP_SELF']); ?>

<body class="hold-transition skin-blue sidebar-mini">
    
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar" style="box-shadow: 1px 2px 4px rgba(0, 0, 0, .5); ">
    <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <ul class="sidebar-menu" data-widget="tree" style="max-height: calc(100vh - 5.2rem); overflow-y: auto;">
                <li style="padding-top: 10px; ">
                    <a onclick="opendashboard(); topFunction();" rel="tab" style="cursor: pointer;" id="dashboard"><i class="fa fa-dashboard"></i><span>Dashboard</span>
                        <span class="pull-right-container"></span></a>
                </li>
         
                <hr>
                <li style="padding-top: 10px; ">
                    <a onclick="openbusiness(); topFunction();" rel="tab" style="cursor: pointer;" id="business"><i class="fa fa-user"></i> <span>Business</span></a>
                </li>

                <li style="padding-top: 10px; ">
                    <a onclick="opencustomer(); topFunction();" rel="tab" style="cursor: pointer;" id="customer"><i class="fa fa-users"></i> <span>Customer</span></a>
                </li>

                <hr>
                <li class="treeview" style="padding-top: 10px;">
                    <a href="#">
                        <i class="fa fa-money"></i> <span>Subscription</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="javaScript:void(0);" class="btn1" onclick="opensubscription(); topFunction();"><i class="fa fa-circle" style="font-size: 12px"></i>Packages</a></li>
                        <li><a href="javaScript:void(0);" class="btn1" onclick="openbenefits(); topFunction();"><i class="fa fa-circle" style="font-size: 12px"></i>Benefits</a></li>
                    </ul> 
                </li>

                <hr>
                <!--  <li style="padding-top: 10px; ">
                <a onclick="opensubcategory(); topFunction();" rel="tab" style="cursor: pointer;" id="sub_category"><i class="fas fa-sitemap"></i>&nbsp;&nbsp;<span>Sub category</span>
                <span class="pull-right-container"></span></a>
                </li> -->
                
                <li style="padding-top: 10px; ">
        	        <a onclick="opencategory(); topFunction();" rel="tab" style="cursor: pointer;" id="category"><i class="fas fa-layer-group"></i>&nbsp;&nbsp;<span>Category</span>
                        <span class="pull-right-container"></span></a>
                </li>
        
                <li style="padding-top: 10px;">
                    <a onclick="opentag(); topFunction();" rel="tab" style="cursor: pointer;" id="tag"><i class="fa fa-hashtag"></i><span>Tag</span>
                        <span class="pull-right-container"></span></a>
                </li>
        
                <li style="padding-top: 10px;">
                    <a onclick="openoffer(); topFunction();" rel="tab" style="cursor: pointer;" id="offer_type"><i class="fa fa-percent"></i><span>Offer Type</span>
                        <span class="pull-right-container"></span></a>
                </li>
        
                <li style="padding-top: 10px; ">
                    <a onclick="openDeal(); topFunction();" rel="tab" style="cursor: pointer;" id="deal"><i class="fa fa-handshake-o"></i><span> Deal</span>
                        <span class="pull-right-container"></span></a>
                </li>
        
                <li style="padding-top: 10px;">
                    <a onclick="openpayment(); topFunction();" rel="tab" style="cursor: pointer;" id="payment"><i class="fa fa-usd"></i></i><span>View Payment</span>
                        <span class="pull-right-container">
                        </span>
                    </a>
                </li>
        
                <li style="padding-top: 10px; ">
                    <a onclick="opencontent(); topFunction();" rel="tab" style="cursor: pointer;" id="content_management"><i class="fa fa-info-circle"></i><span>Content Management</span>
                        <span class="pull-right-container"></span></a>
                </li>
        
                <li style="padding-top: 10px; ">
                    <a onclick="sendcode(); topFunction();" rel="tab" style="cursor: pointer;" id="sendcode"><i class="fa fa-envelope"></i><span>Send Verification Email</span>
                        <span class="pull-right-container"></span></a>
                </li>
        
                <li style="padding-top: 10px; ">
                    <a onclick="sendnotification(); topFunction();" rel="tab" style="cursor: pointer;" id="sendnoti"><i class="fa fa-envelope"></i><span>Send Notification</span>
                        <span class="pull-right-container"></span></a>
                </li> 
        
                <li style="padding-top: 10px; ">
                    <a onclick="customer_image(); topFunction();" rel="tab" style="cursor: pointer;" id="cus_img"><i class="fa fa-file-image-o"></i><span>Customer Default Image</span>
                        <span class="pull-right-container"></span></a>
                </li>
        
                <li style="padding-top: 10px; ">
                    <a onclick="business_image(); topFunction();" rel="tab" style="cursor: pointer;" id="buis_img"><i class="fa fa-file-image-o"></i><span>Business Default Image</span>
                        <span class="pull-right-container"></span></a>
                </li>
            
                <li style="padding-top: 10px; ">
                    <a onclick="openreport(); topFunction();" rel="tab" style="cursor: pointer;" id="report"><i class="fa fa-bar-chart"></i><span>Report</span>
                        <span class="pull-right-container"></span></a>
                </li>
        
                <li style="padding-top: 10px;">
                    <a onclick="doora_dollor_points(); topFunction();" rel="tab" style="cursor: pointer;" id="doora_dollor_points"><i class="fa fa-support"></i><span>Doora dollor points</span>
                        <span class="pull-right-container"></span></a>
                </li>
        
                <li style="padding-top: 10px;">
                    <a onclick="points_offer(); topFunction();" rel="tab" style="cursor: pointer;" id="points_offer"><i class="fa fa-support"></i><span>Points offer</span>
                        <span class="pull-right-container"></span></a>
                </li>
        
                <li style="padding-top: 10px;">
                    <a onclick="doora_dollor_value(); topFunction();" rel="tab" style="cursor: pointer;" id="doora_dollor_value"><i class="fa fa-support"></i><span>Doora Dollor Value</span>
                        <span class="pull-right-container"></span></a>
                </li>
        
                <li style="padding-top: 10px;">
                    <a onclick="doora_dollor_terms(); topFunction();" rel="tab" style="cursor: pointer;" id="doora_dollor_terms"><i class="fa fa-support"></i><span>Doora Dollor Terms</span>
                        <span class="pull-right-container"></span></a>
                </li>

                <hr>
                <li class="treeview" style="padding-top: 10px;">
                    <a href="#" class="btn1">
                        <i class="fa fa-home"></i> <span>Home</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>

                    <ul class="treeview-menu">
                        <li><a href="javaScript:void(0);" onclick="home_getmore_section();" class="btn1"><i class="fa fa-circle" style="font-size: 12px"></i>Getmore-section</a></li>
                        <li><a href="javaScript:void(0);" onclick="home_notification_section();" class="btn1"><i class="fa fa-circle" style="font-size: 12px"></i>Notification-section</a></li>
                        <li><a href="javaScript:void(0);" onclick="home_stories_section();" class="btn1"><i class="fa fa-circle" style="font-size: 12px"></i>Stories-section</a></li>
                        <li><a href="javaScript:void(0);" onclick="home_customer_section();" class="btn1"><i class="fa fa-circle" style="font-size: 12px"></i>Customer-section</a></li>
                        <li><a href="javaScript:void(0);" onclick="home_merchant_section();" class="btn1"><i class="fa fa-circle" style="font-size: 12px"></i>Merchant-section</a></li>
                        <li><a href="javaScript:void(0);" onclick="home_footer();" class="btn1"><i class="fa fa-circle" style="font-size: 12px"></i>Footer</a></li>
                    </ul> 
                </li>

                <li class="treeview" style="padding-top: 10px;">
                    <a href="#">
                        <i class="fa fa-user"></i> <span>Customer</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
         
                    <ul class="treeview-menu">
                        <li><a href="javaScript:void(0);" class="btn1" onclick="customer_searchless_section();"><i class="fa fa-circle" style="font-size: 12px"></i>Searchless-section</a></li>
                        <li><a href="javaScript:void(0);" class="btn1" onclick="customer_image_section();"><i class="fa fa-circle" style="font-size: 12px"></i>Image-section</a></li>
                        <li><a href="javaScript:void(0);" class="btn1" onclick="customer_themost_section();"><i class="fa fa-circle" style="font-size: 12px"></i>Themost-section</a></li>
                        <li><a href="javaScript:void(0);" onclick="customer_footer();" class="btn1"><i class="fa fa-circle" style="font-size: 12px"></i>Footer</a></li>
                    </ul> 
                </li>

                <li class="treeview" style="padding-top: 10px;">
                    <a href="#">
                        <i class="fa fa-user"></i> <span>Merchant</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>

                    <ul class="treeview-menu">
                        <li><a href="javaScript:void(0);" class="btn1" onclick="merchant_makestories_section();"><i class="fa fa-circle" style="font-size: 12px"></i>Makestories-section</a></li>
                        <li><a href="javaScript:void(0);" class="btn1" onclick="merchant_image_section();"><i class="fa fa-circle" style="font-size: 12px"></i>Image-section</a></li>
                        <li><a href="javaScript:void(0);" class="btn1" onclick="merchant_noapp_section();"><i class="fa fa-circle" style="font-size: 12px"></i>Noapp-section</a></li>
                        <li><a href="javaScript:void(0);" class="btn1" onclick="merchant_technology_section();"><i class="fa fa-circle" style="font-size: 12px"></i>Technology-section</a></li>
                        <li><a href="javaScript:void(0);" class="btn1" onclick="merchant_footer();"><i class="fa fa-circle" style="font-size: 12px"></i>Footer</a></li>
                    </ul> 
                </li>

                <li class="treeview" style="padding-top: 10px;">
                    <a href="#">
                        <i class="fa fa-usd"></i> <span>Pricing</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="javaScript:void(0);" class="btn1" onclick="pricing_pricedto_section();"><i class="fa fa-circle" style="font-size: 12px"></i>Pricedto-section</a></li>
                        <li><a href="javaScript:void(0);" class="btn1" onclick="pricing_footer();"><i class="fa fa-circle" style="font-size: 12px"></i>Footer</a></li>
                    </ul> 
                </li>

                <hr>
                <li class="treeview" style="padding-top: 10px;padding-bottom: 20px;">
                    <a href="#">
                        <i class="fa fa-support"></i> <span>Support</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li style="padding-top: 10px;"><a href="javaScript:void(0);" class="btn1" onclick="opensupport();"><i class="fa fa-circle" style="font-size: 12px"></i>Customer Support</a></li>
                        <li style="padding-top: 10px;"><a href="javaScript:void(0);" class="btn1" onclick="openwebsupport();"><i class="fa fa-circle" style="font-size: 12px"></i>Web Customer Support</a></li>
                    </ul> 
                </li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <div class="spinner" id="loader" style="display: none;">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>

    <div class="content-wrapper" id="content" style="min-height: 580px;">






