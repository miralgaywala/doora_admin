<?php //include("View/header.php");
include "../../View/header/header.php";
 include "../../View/header/sidemenu.php";
 //include("View/sidemenu.php");
 ?>
 
 
<!--Main Content -->
    <section class="content">
      <div class="row">
        <div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>View Admin Detail</h2></div>
        <div class="col-md-2">
                <br/>   
               <!-- <a href="http://localhost/doora/adminpanel/Controller/category/displaycategorycontroller.php" class="btn btn-default"><b><- Back</b></a>-->
               <button style="float: right;" onclick="window.location.href='../../Controller/admin/displayadminlist_controller.php'" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>
           <!-- <a href="/doora/adminpanel/View/category/addcategory.php" class="btn btn-primary">+ Add Category</a>-->
        </div>
      </div> 
        <div class="row">
        	<div class="col-xs-12">
        		<div class="box">            
        			<div class="box-body">
        				<table style="font-size: 15px;" style="width: 100%;" class="table table-striped">
                  <?php
                   foreach ($viewadmin_detail as $key => $data) 
                  {
                    if($data['profile_image'] == NULL)
                 {
                  $data['profile_image']= "default.png";
                 }
                else if(file_exists("../../images/profile/".$data['profile_image'])) {
                  $data['profile_image'] = $data['profile_image'];
                 }
                 else
                 {
                  $data['profile_image']= "default.png";
                 }            
               ?>
                  <tr>
                   <td style="width: 20%">Admin Id</td>
                  <td><?php echo $data['admin_id'];?></td>
                  </tr>
                  <tr>
                  <td style="width: 20%">Role Id</td>
                  <td><?php echo $data['role_id'];?></td>
                  </tr>
                  <tr>
                 <td style="width: 20%">Username</td>
                  <td><?php echo $data['username'];?></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Password</td>
                  <td><?php echo $data['password'];?></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Admin Name</td>
                  <td><?php echo $data['admin_name'];?></td>
                  </tr>
                  <tr>
                  <td style="width: 20%">Email Address</td>
                  <td><?php echo $data['email_address'];?></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Phone No</td>
                  <td><?php echo $data['phone_no'];?></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Profile Image</td>
                  <td><a data-fancybox="gallery" <?php echo "href=../../../images/profile/".$data['profile_image'];?>><img <?php echo "src=../../../images/profile/".$data['profile_image'];?> id="Picture"/></a></td>
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
                   <td style="width: 20%">Created Date</td>
                  <td><?php echo $data['created_at'];?></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Upadted Date</td>
                  <td><?php echo $data['updated_at'];?></td>
                  </tr>
                <?php } ?>
                </table>
        			</div>
        		</div>
        	</div>	
       
    </section>
</div>

 <?php //include("View/footer.php");
 include "../../View/header/footer.php";?> 
 
     
                       
 