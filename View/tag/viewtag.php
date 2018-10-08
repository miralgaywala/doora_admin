<?php //include("View/header.php");
include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/header.php");
 //include("View/sidemenu.php");
include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/sidemenu.php");
 ?>
 
 
<!--Main Content -->
    <section class="content">
      <div class="row">
        <div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>View Tag</h2></div>
        <div class="col-md-2">
                <br/>   
               <!-- <a href="http://localhost/doora/adminpanel/Controller/category/displaycategorycontroller.php" class="btn btn-default"><b><- Back</b></a>-->
               <button style="float: right;" onclick="window.location.href='http://localhost/doora/adminpanel/Controller/tag/displaytagcontroller.php'" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>
           <!-- <a href="/doora/adminpanel/View/category/addcategory.php" class="btn btn-primary">+ Add Category</a>-->
        </div>
      </div> 
        <div class="row">
        	<div class="col-xs-12">
        		<div class="box">            
        			<div class="box-body">
        				<table width="50%" style="font-size: 15px;">
                  <?php
                   foreach ($view_tag as $key => $data) 
                  {
               ?>
                  <tr>
                    <td>Tag_id</td>
                  <td><?php echo $data[0];?></td>
                  </tr>
                  <tr>
                    <td>Tag</td>
                  <td><?php echo $data[1];?></td>
                  </tr>
                  <tr>
                    <td>is_deleted</td>
                  <td><?php echo $data[2];?></td>
                  </tr>
                  <tr>
                    <td>Created_at</td>
                  <td><?php echo $data[3];?></td>
                  </tr>
                  <tr>
                    <td>Upadted_at</td>
                  <td><?php echo $data[4];?></td>
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
 
     
                       
 