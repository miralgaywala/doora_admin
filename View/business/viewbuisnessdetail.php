<?php //include("View/header.php");
include "../../View/header/header.php";
include "../../View/header/sidemenu.php";
 ?>
 
 <?php
       foreach ($viewbusiness_detail as $key => $data) 
                  {
                    if($data['photo'] == NULL)
                 {
                  $data['photo']= "default.png";
                 }
                else if(file_exists("../../../images/profile/".$data['photo'])) {
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
        <div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>View Business Detail</h2></div>
        <div class="col-md-2">
                <br/>   
               <!-- <a href="http://localhost/doora/adminpanel/Controller/category/displaycategorycontroller.php" class="btn btn-default"><b><- Back</b></a>-->
               <button style="float: right;" onclick="window.location.href='../../Controller/business/displaybusinesslist_controller.php'" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>
  
        </div>
      </div> 
        <div class="row">
        	<div class="col-xs-12">
        		<div class="box">            
        			<div class="box-body">
        				  <table style="font-size: 15px;" style="width: 100%;" class="table table-striped">
                  <tr>
                   <td style="width: 20%">User Id</td>
                  <td><?php echo $data['user_id'];?></td>
                  </tr>
                  <tr>
                  <td style="width: 20%">Business Name</td>
                  <td><?php echo $data['business_name'];?></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Name</td>
                  <td><?php echo $data['name'];?></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Gender</td>
                  <td><?php echo $data['gender'];?></td>
                  </tr>
                  <tr>
                  <td style="width: 20%">Date Of Birth</td>
                  <td><?php echo $data['date_of_birth'];?></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Photo</td>
                  <td><a data-fancybox="gallery" <?php echo "href=../../../images/profile/".$data['photo'];?>><img <?php echo "src=../../../images/profile/".$data['photo'];?> id="profilePicture"/></a></td>
                  </tr>
                  <tr>
                  <td style="width: 20%">Email Id</td>
                  <td><?php echo $data['email'];?></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Password</td>
                  <td><?php echo $data['password'];?></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Address</td>
                  <td><?php echo $data['address'];?></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Latitude</td>
                  <td><?php echo $data['latitude'];?></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Longitude</td>
                  <td><?php echo $data['longitude'];?></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Notification</td>
                  <td><?php if($data['is_notification'] == 0)
                  {
                    echo "No";
                  }
                  else
                    {
                      echo "Yes";
                    }?></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Mobile No.</td>
                  <td><?php echo $data['mobile_no'];?></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Stripe Customer Id</td>
                  <td><?php echo $data['stripe_customer_id'];?></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Iphone</td>
                  <td><?php if($data['is_iphone'] == 0)
                  {
                    echo "No";
                  }
                  else
                    {
                      echo "Yes";
                    }?></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Device Id</td>
                  <td><?php echo $data['device_id'];?></td>
                  </tr>
                  <tr>
                  <td style="width: 20%">Is Deleted</td>
                  <td><?php if($data['is_deleted'] == 0)
                  {
                    echo "No";
                  }
                  else
                    {
                      echo "Yes";
                    }?></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Business</td>
                  <td><?php if($data['is_business'] == 0)
                  {
                    echo "No";
                  }
                  else
                    {
                      echo "Yes";
                    }?></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Subscription End Date</td>
                  <td><?php echo $data['subscription_enddate'];?></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Monthly Bill Pending</td>
                  <td><?php if($data['is_monthly_bill_pending'] == 1)
                  {
                    echo "No";
                  }
                  else
                    {
                      echo "Yes";
                    }?></td>
                  </tr>
                  <tr>
                  <td style="width: 20%">Email Verified</td>
                  <td><?php if($data['is_email_verified'] == 0)
                  {
                    echo "No";
                  }
                  else
                    {
                      echo "Yes";
                    }?></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Free trial Expiry Date</td>
                  <td><?php echo $data['free_trial_exp_date'];?></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Start Subscription</td>
                  <td><?php if($data['is_start_subscription'] == 0)
                  {
                    echo "No";
                  }
                  else
                    {
                      echo "Yes";
                    }?></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Free Trial Started</td>
                  <td><?php if($data['is_free_trial_started'] == 0)
                  {
                    echo "No";
                  }
                  else
                    {
                      echo "Yes";
                    }?></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Access Token</td>
                  <td><?php echo $data['access_token'];?></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Created Date</td>
                  <td><?php echo $data['created_at'];?></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Upadated Date</td>
                  <td><?php echo $data['updated_at'];?></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Super Market</td>
                  <td><?php if($data['is_super_market'] == 0)
                  {
                    echo "No";
                  }
                  else
                    {
                      echo "Yes";
                    }?></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Website Url</td>
                  <td><?php echo $data['website_url'];?></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Active</td>
                  <td><?php if($data['is_active'] == 0)
                  {
                    echo "No";
                  }
                  else
                    {
                      echo "Yes";
                    }?></td>
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

  <?php include "../../View/header/footer.php";?>  
 
     
                       
 