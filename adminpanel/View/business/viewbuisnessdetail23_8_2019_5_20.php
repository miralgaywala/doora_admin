<?php //include("View/header.php");
// include "../../View/header/header.php";
// include "../../View/header/sidemenu.php";
 ?>
 <script type="text/javascript">
   function backbusiness()
      {
              
            $.ajax({
                 url:"../../Controller/business/displaybusinesslist_controller.php",
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      
                 }
              })
      }
 </script>
 <?php
 //echo "<pre>"; print_r($viewbusiness_detail); echo "</pre>";
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
               <button style="float: right;" onclick="backbusiness()" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>
  
        </div>
      </div> 
        <div class="row">
        	<div class="col-xs-12">
        		<div class="box">            
        			<div class="box-body">
        				  <table style="font-size: 15px;" style="width: 100%;" class="table table-striped">
                    <tr>
                    <?php if($data['is_deleted'] == 0)
                  {
                   
                  }
                  else
                    {
                      ?>
                      <td colspan="2" style="text-align: center;">This business is deleted</tr>
                        <?php
                    }?></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">User Id</td>
                  <td><?php echo $data['user_id'];?></td>
                  </tr>
                  <tr>
                  <td style="width: 20%">Business Name</td>
                  <td><?php echo $data['business_name'];?></td>
                  </tr>
                  <!-- <tr>
                   <td style="width: 20%">Name</td>
                  <td><?php echo $data['name'];?></td>
                  </tr> -->
                  <tr>
                   <td style="width: 20%">Gender</td>
                  <td><?php echo $data['gender'];?></td>
                  </tr>
                  <tr>
                  <td style="width: 20%">Date Of Birth</td>
                  <td><?php
                  if($data['date_of_birth'] == date('0000-00-00')){
                        
                    }
                    else
                    {
                      $newDate = date("d-m-Y", strtotime($data['date_of_birth']));
                      echo $newDate;
                    }
                  
                    ?>
                  </td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Photo</td>
                  <td><a data-fancybox="gallery" <?php echo "href=../../../images/profile/".$data['photo'];?>><img <?php echo "src=../../../images/profile/".$data['photo'];?> id="profilePicture" style="object-fit: contain;"/></a></td>
                  </tr>
                  <tr>
                  <td style="width: 20%">Email Id</td>
                  <td><?php echo $data['email'];?></td>
                  </tr>
                   <tr>
                   <td style="width: 20%">Mobile No.</td>
                  <td><?php echo $data['mobile_no'];?></td>
                  </tr>
                  <!-- <tr>
                   <td style="width: 20%">Password</td>
                  <td><?php echo $data['password'];?></td>
                  </tr> -->
                 <!--  <tr>
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
                  </tr> -->
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
                  <tr>
                  <td style="width: 20%">Verified</td>
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
                  <td style="width: 20%">Free Trial Days</td>
                  <td><?php echo $data['free_trail_days']; ?></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Notification Allowed</td>
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
                   <td style="width: 20%">Stripe Customer Id</td>
                  <td><?php echo $data['stripe_customer_id'];?></td>
                  </tr>
                  <!-- <tr>
                   <td style="width: 20%">Iphone</td>
                  <td><?php if($data['is_iphone'] == 0)
                  {
                    echo "No";
                  }
                  else
                    {
                      echo "Yes";
                    }?></td>
                  </tr> -->
                  <!-- <tr>
                   <td style="width: 20%">Device Id</td>
                  <td><?php echo $data['device_id'];?></td>
                  </tr> -->
                  <!-- <tr>
                  <td style="width: 20%">Is Deleted</td>
                  <td><?php if($data['is_deleted'] == 0)
                  {
                    echo "No";
                  }
                  else
                    {
                      echo "Yes";
                    }?></td>
                  </tr> -->
                  <!-- <tr>
                   <td style="width: 20%">Business</td>
                  <td><?php if($data['is_business'] == 0)
                  {
                    echo "No";
                  }
                  else
                    {
                      echo "Yes";
                    }?></td>
                  </tr> -->
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
                  <!-- <tr>
                   <td style="width: 20%">Subscription End Date</td>
                  <td><script type="text/javascript">
                      var dateFormat = 'DD-MM-YYYY HH:mm:ss';
                      var testDateUtc = moment.utc('<?php echo $data["subscription_enddate"] ?>');
                      //alert(testDateUtc);
                      var localDate = testDateUtc.local();
                      // console.log(localDate.format(dateFormat));
                     var value = localDate.format(dateFormat);
                      if(value == 'Invalid date')
                      {
                       var date_val = "";
                      }
                      else
                      {
                        document.getElementById("demo3").innerHTML = value;
                      }
                    </script>
                   <div id="demo3"></div></td>
                  </tr> -->
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
                   <td style="width: 20%">Free Trial Expiry Date</td>
                  <td><script type="text/javascript">
                      var dateFormat = 'DD-MM-YYYY HH:mm:ss';
                      var testDateUtc = moment.utc('<?php echo $data["free_trial_exp_date"] ?>');
                      //alert(testDateUtc);
                      var localDate = testDateUtc.local();
                      // console.log(localDate.format(dateFormat));
                      
                      var value = localDate.format(dateFormat);
                      if(value == 'Invalid date')
                      {
                       var date_val = "";
                      }
                      else
                      {
                        document.getElementById("demo4").innerHTML = value;
                      }
                    </script>
                   <div id="demo4"></div>
                    </td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Monthly Bill Pending</td>
                  <td><?php if($data['is_monthly_bill_pending'] == 0)
                  {
                    echo "No";
                  }
                  else
                    {
                      echo "Yes";
                    }?></td>
                  </tr>
                  
                  <!-- <tr>
                   <td style="width: 20%">Access Token</td>
                  <td><?php echo $data['access_token'];?></td>
                  </tr> -->
                  
                  <tr>
                   <td style="width: 20%">Super Store</td>
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
                   <td style="width: 20%">Pet Friendly</td>
                  <td><?php if($data['is_pet_friendly'] == 0)
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
                   <td style="width: 20%">Created Date</td>
                  <td><script type="text/javascript">
                      var dateFormat = 'DD-MM-YYYY HH:mm:ss';
                      var testDateUtc = moment.utc('<?php echo $data["created_at"] ?>');
                      //alert(testDateUtc);
                      var localDate = testDateUtc.local();
                      // console.log(localDate.format(dateFormat));
                      document.getElementById("demo1").innerHTML = localDate.format(dateFormat);
                    </script>
                   <div id="demo1"></div></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Updated Date</td>
                  <td><script type="text/javascript">
                      var dateFormat = 'DD-MM-YYYY HH:mm:ss';
                      var testDateUtc = moment.utc('<?php echo $data["updated_at"] ?>');
                      //alert(testDateUtc);
                      var localDate = testDateUtc.local();
                      // console.log(localDate.format(dateFormat));
                      document.getElementById("demo2").innerHTML = localDate.format(dateFormat);
                    </script>
                   <div id="demo2"></div></td>
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

  <?php //include "../../View/header/footer.php";?>  
 
     
                       
 