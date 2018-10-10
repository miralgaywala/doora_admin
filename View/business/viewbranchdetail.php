<?php //include("View/header.php");
include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/header.php");
 //include("View/sidemenu.php");
include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/sidemenu.php");
 ?>
 
 <?php
       foreach ($view_branch as $key => $data) 
                  {
                    $id=$data[1];
               ?>
<!--Main Content -->
    <section class="content">
      <div class="row">
        <div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>View Branch Detail</h2></div>
        <div class="col-md-2">
                <br/>   
               <!-- <a href="http://localhost/doora/adminpanel/Controller/category/displaycategorycontroller.php" class="btn btn-default"><b><- Back</b></a>-->
               <button type="button" style="float: right;" onclick="window.history.go(-1); return false;" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>
  
        </div>
      </div> 
        <div class="row">
        	<div class="col-xs-12">
        		<div class="box">            
        			<div class="box-body">
        				<table width="50%" style="font-size: 15px;">
                  <tr>
                    <td>Frenchise id</td>
                  <td><?php echo $data[0];?></td>
                  </tr>
                  <tr>
                    <td>Business User Id</td>
                  <td><?php echo $data[1];?></td>
                  </tr>
                  <tr>
                    <td>Frenchise Address</td>
                  <td><?php echo $data[2];?></td>
                  </tr>
                  <tr>
                    <td>Latitude</td>
                  <td><?php echo $data[3];?></td>
                  </tr>
                  <tr>
                    <td>Longitude</td>
                  <td><?php echo $data[4];?></td>
                  </tr>
                  <tr>
                    <td>Is Deleted</td>
                  <td><?php echo $data[5];?></td>
                  </tr>
                  <tr>
                    <td>Created_at</td>
                  <td><?php echo $data[6];?></td>
                  </tr>
                  <tr>
                    <td>Upadted_at</td>
                  <td><?php echo $data[7];?></td>
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
 
     
                       
 