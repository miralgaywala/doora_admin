<?php //include("View/header.php");
include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/header.php");
 //include("View/sidemenu.php");
include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/sidemenu.php");
 ?>
 
 <?php
       foreach ($viewbusiness_detail as $key => $data) 
                  {
               ?>
<!--Main Content -->
    <section class="content">
      <div class="row">
        <div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>View Business Detail</h2></div>
        <div class="col-md-2">
                <br/>   
               <!-- <a href="http://localhost/doora/adminpanel/Controller/category/displaycategorycontroller.php" class="btn btn-default"><b><- Back</b></a>-->
               <button style="float: right;" onclick="window.location.href='http://localhost/doora/adminpanel/Controller/business/displaybusinesslist_controller.php'" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>
  
        </div>
      </div> 
        <div class="row">
        	<div class="col-xs-12">
        		<div class="box">            
        			<div class="box-body">
        				<table width="50%" style="font-size: 15px;">
                  <tr>
                    <td>User Id</td>
                  <td><?php echo $data[0];?></td>
                  </tr>
                  <tr>
                    <td>Business Name</td>
                  <td><?php echo $data[1];?></td>
                  </tr>
                  <tr>
                    <td>Name</td>
                  <td><?php echo $data[2];?></td>
                  </tr>
                  <tr>
                    <td>Gender</td>
                  <td><?php echo $data[3];?></td>
                  </tr>
                  <tr>
                    <td>Date Of Birth</td>
                  <td><?php echo $data[4];?></td>
                  </tr>
                  <tr>
                    <td>Photo</td>
                  <td><img <?php echo "src=/doora/images/profile/".$data[5];?> id="profilePicture"/></td>
                  </tr>
                  <tr>
                    <td>Email Id</td>
                  <td><?php echo $data[6];?></td>
                  </tr>
                  <tr>
                    <td>Password</td>
                  <td><?php echo $data[7];?></td>
                  </tr>
                  <tr>
                    <td>Address</td>
                  <td><?php echo $data[8];?></td>
                  </tr>
                  <tr>
                    <td>Latitude</td>
                  <td><?php echo $data[9];?></td>
                  </tr>
                  <tr>
                    <td>Longitude</td>
                  <td><?php echo $data[10];?></td>
                  </tr>
                  <tr>
                    <td>Is Notification</td>
                  <td><?php echo $data[11];?></td>
                  </tr>
                  <tr>
                    <td>Mobile No.</td>
                  <td><?php echo $data[12];?></td>
                  </tr>
                  <tr>
                    <td>Stripe Customer Id</td>
                  <td><?php echo $data[13];?></td>
                  </tr>
                  <tr>
                    <td>Is Iphone</td>
                  <td><?php echo $data[14];?></td>
                  </tr>
                  <tr>
                    <td>Device Id</td>
                  <td><?php echo $data[15];?></td>
                  </tr>
                  <tr>
                    <td>Is Deleted</td>
                  <td><?php echo $data[16];?></td>
                  </tr>
                  <tr>
                    <td>Is Business</td>
                  <td><?php echo $data[17];?></td>
                  </tr>
                  <tr>
                    <td>Is Email Verified</td>
                  <td><?php echo $data[18];?></td>
                  </tr>
                  <tr>
                    <td>Access Token</td>
                  <td><?php echo $data[19];?></td>
                  </tr>
                  <tr>
                    <td>Created At</td>
                  <td><?php echo $data[20];?></td>
                  </tr>
                  <tr>
                    <td>Upadated At</td>
                  <td><?php echo $data[21];?></td>
                  </tr>
                  <tr>
                    <td>Is Super Market</td>
                  <td><?php echo $data[22];?></td>
                  </tr>
                  <tr>
                    <td>Website Url</td>
                  <td><?php echo $data[23];?></td>
                  </tr>
                  <tr>
                    <td>Is Active</td>
                  <td><?php echo $data[24];?></td>
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
 
     
                       
 