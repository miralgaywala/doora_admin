<?php //include("View/header.php");
include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/header.php");
 //include("View/sidemenu.php");
include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/sidemenu.php");
 ?>
 
 
<!--Main Content -->
    <section class="content">
      <div class="row">
        <div class="col-md-10" style="float: left;"> <h2>View Sub Category</h2></div>
        <div class="col-md-2">
                <br/>   
               <!-- <a href="http://localhost/doora/adminpanel/Controller/category/displaycategorycontroller.php" class="btn btn-default"><b><- Back</b></a>-->
               <button style="float: right;" onclick="window.location.href='http://localhost/doora/adminpanel/Controller/sub_category/displaysubcategorycontroller.php'" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>
           <!-- <a href="/doora/adminpanel/View/category/addcategory.php" class="btn btn-primary">+ Add Category</a>-->
        </div>
      </div> 
        <div class="row">
        	<div class="col-xs-12">
        		<div class="box">            
        			<div class="box-body">
        				<table width="50%" style="font-size: 15px;">
                  <?php
                   foreach ($view_subcategory as $key => $data) 
                  {
               ?>
                  <tr>
                    <td>Sub_Category_Id</td>
                  <td><?php echo $data[0];?></td>
                  </tr>
                  <tr>
                  <td>Category_Id</td>
                  <td><?php echo $data[1];?></td>
                  </tr>
                  <tr>
                  <td>Sub_Catgeory_Name</td>
                  <td><?php echo $data[2];?></td>
                  </tr>
                  <tr>
                    <td>Sub_Category_Image</td>
                  <td><img <?php echo "src=/doora/images/sub_category/".$data[3];?> id="SubCategoryPicture"/></td>
                  </tr>
                  <tr>
                    <td>is_deleted</td>
                  <td><?php echo $data[4];?></td>
                  </tr>
                  <tr>
                    <td>Created_at</td>
                  <td><?php echo $data[5];?></td>
                  </tr>
                  <tr>
                    <td>Upadted_at</td>
                  <td><?php echo $data[6];?></td>
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
 
     
                       
 