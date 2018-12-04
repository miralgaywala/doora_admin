<?php //include("View/header.php");
include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/header.php");
 //include("View/sidemenu.php");
include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/sidemenu.php");
 ?>
 
 
<!--Main Content -->
    <section class="content">
      <div class="row">
        <div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>View Admin Detail</h2></div>
        <div class="col-md-2">
                <br/>   
               <!-- <a href="http://localhost/doora/adminpanel/Controller/category/displaycategorycontroller.php" class="btn btn-default"><b><- Back</b></a>-->
               <button style="float: right;" onclick="window.location.href='/doora/adminpanel/Controller/admin/displayadminlist_controller.php'" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>
           <!-- <a href="/doora/adminpanel/View/category/addcategory.php" class="btn btn-primary">+ Add Category</a>-->
        </div>
      </div> 
        <div class="row">
        	<div class="col-xs-12">
        		<div class="box">            
        			<div class="box-body">
        				<table width="50%" style="font-size: 15px;">
                  <?php
                   foreach ($viewadmin_detail as $key => $data) 
                  {
                    if($data[7] == NULL)
                 {
                  $data[7]= "default.png";
                 }
                else if(file_exists($_SERVER['DOCUMENT_ROOT']."/doora/images/profile/".$data[5])) {
                  $data[7] = $data[7];
                 }
                 else
                 {
                  $data[7]= "default.png";
                 }            
               ?>
                  <tr>
                    <td>Admin Id</td>
                  <td><?php echo $data[0];?></td>
                  </tr>
                  <tr>
                    <td>Role Id</td>
                  <td><?php echo $data[1];?></td>
                  </tr>
                  <tr>
                    <td>Username</td>
                  <td><?php echo $data[2];?></td>
                  </tr>
                  <tr>
                    <td>Password</td>
                  <td><?php echo $data[3];?></td>
                  </tr>
                  <tr>
                    <td>Admin Name</td>
                  <td><?php echo $data[4];?></td>
                  </tr>
                  <tr>
                    <td>Email Address</td>
                  <td><?php echo $data[5];?></td>
                  </tr>
                  <tr>
                    <td>Phone No</td>
                  <td><?php echo $data[6];?></td>
                  </tr>
                  <tr>
                    <td>Profile Image</td>
                  <td><img <?php echo "src=/doora/images/profile/".$data[7];?> id="Picture"/></td>
                  </tr>
                  <tr>
                    <td>Is Deleted</td>
                  <td><?php echo $data[8];?></td>
                  </tr>
                  <tr>
                    <td>Created At</td>
                  <td><?php echo $data[9];?></td>
                  </tr>
                  <tr>
                    <td>Upadted At</td>
                  <td><?php echo $data[10];?></td>
                  </tr>
                <?php } ?>
                </table>
        			</div>
        		</div>
        	</div>	
       
    </section>
</div>

 <?php //include("View/footer.php");
 include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/footer.php");?> 
 
     
                       
 