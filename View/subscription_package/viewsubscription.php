<?php //include("View/header.php");
include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/header.php");
 //include("View/sidemenu.php");
include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/sidemenu.php");
 ?>
 
 
<!--Main Content -->
    <section class="content">
      <div class="row">
        <div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>View Subscription Plan</h2></div>
        <div class="col-md-2">
                <br/>   
               <!-- <a href="http://localhost/doora/adminpanel/Controller/category/displaycategorycontroller.php" class="btn btn-default"><b><- Back</b></a>-->
               <button style="float: right;" onclick="window.location.href='/doora/adminpanel/Controller/subscription_package/displaysubscription_controller.php'" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>
           <!-- <a href="/doora/adminpanel/View/category/addcategory.php" class="btn btn-primary">+ Add Category</a>-->
        </div>
      </div> 
        <div class="row">
        	<div class="col-xs-12">
        		<div class="box">            
        			<div class="box-body">
        				<table width="50%" style="font-size: 15px;">
                  <?php
                   foreach ($view_subscription as $key => $data) 
                  {
               ?>
                  <tr>
                    <td>Subscription plan Id</td>
                  <td><?php echo $data['subscription_plan_id'];?></td>
                  </tr>
                  <tr>
                    <td>Price</td>
                  <td><?php echo $data['price'];?></td>
                  </tr>
                  <tr>
                    <td>Per Deal Redeem Price</td>
                  <td><?php echo $data['per_deal_redeem_price'];?></td>
                  </tr>
                  <tr>
                    <td>Free Days</td>
                  <td><?php echo $data['free_days'];?></td>
                  </tr>
                  <tr>
                    <td>Is Deleted</td>
                  <td><?php echo $data['is_deleted'];?></td>
                  </tr>
                  <tr>
                    <td>Created At</td>
                  <td><?php echo $data['created_at'];?></td>
                  </tr>
                  <tr>
                    <td>Upadted At</td>
                  <td><?php echo $data['updated_at'];?></td>
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
 
     
                       
 