<?php //include("View/header.php");
include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/header.php");
 //include("View/sidemenu.php");
include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/sidemenu.php");
 ?>
 
 <?php
       foreach ($viewcustomer_detail as $key => $data) 
      {
                    if($data['photo'] == NULL)
                 {
                  $data['photo']= "default.png";
                 }
                else if(file_exists($_SERVER['DOCUMENT_ROOT']."/doora/images/profile/".$data['photo'])) {
                  $data['photo'] = $data['photo'];
                 }
                 else
                 {
                  $data['photo']= "default.png";
                 }    
               ?>
<!--Main Content -->
    <section class="content">
      <div class="row">
        <div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>View Customer Detail</h2></div>
        <div class="col-md-2">
                <br/>   
               <!-- <a href="http://localhost/doora/adminpanel/Controller/category/displaycategorycontroller.php" class="btn btn-default"><b><- Back</b></a>-->
               <button style="float: right;" onclick="window.location.href='/doora/adminpanel/Controller/customer/displaycustomerlist_controller.php'" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>
  
        </div>
      </div> 
        <div class="row">
        	<div class="col-xs-12">
        		<div class="box">            
        			<div class="box-body">
        				<table width="50%" style="font-size: 15px;">
                  <tr>
                    <td>User Id</td>
                  <td><?php echo $data['user_id'];?></td>
                  </tr>
                  <tr>
                    <td>Business Name</td>
                  <td><?php echo $data['business_name'];?></td>
                  </tr>
                  <tr>
                    <td>Name</td>
                  <td><?php echo $data['name'];?></td>
                  </tr>
                  <tr>
                    <td>Gender</td>
                  <td><?php echo $data['gender'];?></td>
                  </tr>
                  <tr>
                    <td>Date Of Birth</td>
                  <td><?php echo $data['date_of_birth'];?></td>
                  </tr>
                  <tr>
                    <td>Photo</td>
                  <td><img <?php echo "src=/doora/images/profile/".$data['photo'];?> id="profilePicture"/></td>
                  </tr>
                  <tr>
                    <td>Email Id</td>
                  <td><?php echo $data['email'];?></td>
                  </tr>
                  <tr>
                    <td>Password</td>
                  <td><?php echo $data['password'];?></td>
                  </tr>
                  <tr>
                    <td>Address</td>
                  <td><?php echo $data['address'];?></td>
                  </tr>
                  <tr>
                    <td>Latitude</td>
                  <td><?php echo $data['latitude'];?></td>
                  </tr>
                  <tr>
                    <td>Longitude</td>
                  <td><?php echo $data['longitude'];?></td>
                  </tr>
                  <tr>
                    <td>Is Notification</td>
                  <td><?php echo $data['is_notification'];?></td>
                  </tr>
                  <tr>
                    <td>Mobile No.</td>
                  <td><?php echo $data['mobile_no'];?></td>
                  </tr>
                  <tr>
                    <td>Stripe Customer Id</td>
                  <td><?php echo $data['stripe_customer_id'];?></td>
                  </tr>
                  <tr>
                    <td>Is Iphone</td>
                  <td><?php echo $data['is_iphone'];?></td>
                  </tr>
                  <tr>
                    <td>Device Id</td>
                  <td><?php echo $data['device_id'];?></td>
                  </tr>
                  <tr>
                    <td>Is Deleted</td>
                  <td><?php echo $data['is_deleted'];?></td>
                  </tr>
                  <tr>
                    <td>Is Business</td>
                  <td><?php echo $data['is_business'];?></td>
                  </tr>
                  <tr>
                    <td>Subscription End Date</td>
                  <td><?php echo $data['subscription_enddate'];?></td>
                  </tr>
                  <tr>
                    <td>Is Monthly Bill Pending</td>
                  <td><?php echo $data['is_monthly_bill_pending'];?></td>
                  </tr>
                  <tr>
                    <td>Is Email Verified</td>
                  <td><?php echo $data['is_email_verified'];?></td>
                  </tr>
                  <tr>
                    <td>Free trial Expiry Date</td>
                  <td><?php echo $data['free_trial_exp_date'];?></td>
                  </tr>
                  <tr>
                    <td>Is Start Subscription</td>
                  <td><?php echo $data['is_start_subscription'];?></td>
                  </tr>
                  <tr>
                    <td>Is Free Trial Started</td>
                  <td><?php echo $data['is_free_trial_started'];?></td>
                  </tr>
                  <tr>
                    <td>Access Token</td>
                  <td><?php echo $data['access_token'];?></td>
                  </tr>
                  <tr>
                    <td>Created At</td>
                  <td><?php echo $data['created_at'];?></td>
                  </tr>
                  <tr>
                    <td>Updated At</td>
                  <td><?php echo $data['updated_at'];?></td>
                  </tr>
                  <tr>
                    <td>Is Super Market</td>
                  <td><?php echo $data['is_super_market'];?></td>
                  </tr>
                  <tr>
                    <td>Website Url</td>
                  <td><?php echo $data['website_url'];?></td>
                  </tr>
                  <tr>
                    <td>Is Active</td>
                  <td><?php echo $data['is_active'];?></td>
                  </tr>
                <?php } ?>
                </table>
        			</div>
        		</div>
        	</div>	
          <?php
           ?>
    </section>
</div>

 <?php //include("View/footer.php");
 include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/footer.php");?> 
