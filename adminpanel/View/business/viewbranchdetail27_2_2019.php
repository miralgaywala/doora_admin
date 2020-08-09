<?php //include("View/header.php");
// include "../../View/header/header.php";

//  //include("View/sidemenu.php");
// include "../../View/header/sidemenu.php";
 ?>
 
 <?php
       foreach ($view_branch as $key => $data) 
                  {
                    $id=$data['franchise_id'];

               ?>
               <script type="text/javascript">
                 function backbranch(id)
                  {
                    $.ajax({
                             url:"../../Controller/business/viewbusinessbranch_controller.php?id="+id,
                             method:"POST",
                             success:function(data)
                             {
                                  $('.content-wrapper').html(data);
                                  
                             }
                          })
                  }
               </script>
<!--Main Content -->
    <section class="content">
      <div class="row">
        <div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>View Branch Detail</h2></div>
        <div class="col-md-2">
                <br/>   
               <!-- <a href="http://localhost/doora/adminpanel/Controller/category/displaycategorycontroller.php" class="btn btn-default"><b><- Back</b></a>-->
               <button type="button" style="float: right;" onclick="backbranch(<?php echo $data['business_user_id']; ?>)" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>
  
        </div>
      </div> 
        <div class="row">
        	<div class="col-xs-12">
        		<div class="box">            
        			<div class="box-body">
        				 <table style="font-size: 15px;" style="width: 100%;" class="table table-striped">
                  <tr>
                 <td style="width: 20%">Frenchise id</td>
                  <td><?php echo $data['franchise_id'];?></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Business User Id</td>
                  <td><?php echo $data['business_user_id'];?></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Frenchise Address</td>
                  <td><?php echo $data['franchise_address'];?></td>
                  </tr>
                  <!-- <tr>
                   <td style="width: 20%">Latitude</td>
                  <td><?php echo $data['latitude'];?></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Longitude</td>
                  <td><?php echo $data['longitude'];?></td>
                  </tr> -->
                  <tr>
                 <td style="width: 20%">Branch Activate</td>
                  <td><?php if($data['is_branch_active'] == 0)
                  {
                    echo "No";
                  }
                  else
                    {
                      echo "Yes";
                    }?></td>
                  </tr>
                  <!-- <tr>
                  <td style="width: 20%">Deleted</td>
                  <td><?php if($data['is_deleted'] == 0)
                  {
                    echo "No";
                  }
                  else
                    {
                      echo "Yes";
                    }?></td>
                  </tr> -->
                  <tr>
                   <td style="width: 20%">Created Date</td>
                  <td><?php 
                    $newDate = date("d-m-Y H:i:s", strtotime($data['created_at']));
                  echo $newDate;?></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Updated Date</td>
                  <td><?php 
                   $newDate = date("d-m-Y H:i:s", strtotime($data['updated_at']));
                  echo $newDate;?></td>
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
 
     
                       
 