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
      function listbusiness(data)
      {
            hash_id = data;
            $.ajax({
                 url:"../../Controller/business/displaybusinesslist_controller.php",
                 method:"POST",
                 success:function(data)
                 {
                     
                      $('.content-wrapper').html(data);
                      $(hash_id).show();
                 }
              })
      }
 </script>
 
<!--Main Content -->
    <section class="content">
      <div class="row">
        <div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>View Business Verification Detail</h2></div>
        <div class="col-md-2">
                <br/>   
               <!-- <a href="http://localhost/doora/adminpanel/Controller/category/displaycategorycontroller.php" class="btn btn-default"><b><- Back</b></a>-->
               <button style="float: right;" onclick="backbusiness()" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>
  
        </div>
      </div> 
        <div class="row">
        	<div class="col-xs-12">
            <?php
 //echo "<pre>"; print_r($viewverification_detail); echo "</pre>";
       foreach ($viewverification_detail as $key => $data) 
                  {
               ?>
        		<div class="box">            
        			<div class="box-body">
        				  <table style="font-size: 15px;" style="width: 100%;" class="table table-striped">
                  <tr>
                   <td style="width: 20%">Verification Id</td>
                  <td><?php echo $data['verification_id'];?></td>
                  </tr>
                  <tr>
                  <td style="width: 20%">Business id</td>
                  <td><?php echo $data['business_id'];?></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Full name</td>
                  <td><?php echo $data['full_name'];?></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">ABN</td>
                  <td><?php echo $data['ABN'];?></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Address</td>
                  <td><?php echo $data['address'];?></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Zip Code</td>
                  <td><?php echo $data['zipcode'];?></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">About us</td>
                  <td><?php echo $data['about_us'];?></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Facebook Link</td>
                  <td><?php echo $data['facebook_link'];?></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Instagram Link</td>
                  <td><?php echo $data['instagram_link'];?></td>
                  </tr>
                 <!--  <tr>
                   <td style="width: 20%">Doc Name</td>
                  <td><?php echo $data['doc_name'];?></td>
                  </tr> -->
                  <!-- <tr>
                  <td style="width: 20%">Verified</td>
                  <td><?php if($data['is_verified'] == 0)
                  {
                    echo "No";
                  }
                  else
                    {
                      echo "Yes";
                    }?></td>
                  </tr>
                  <tr>
                  <td style="width: 20%">Submitted</td>
                  <td><?php if($data['is_submitted'] == 0)
                  {
                    echo "No";
                  }
                  else
                    {
                      echo "Yes";
                    }?></td>
                  </tr>
                  <tr>
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
                  <td>
                   <?php if($data['created_at'] == date('0000-00-00 00:00:00')){
                          //echo "No";
                      } 
                      else
                        {
                          $newDate = date("d-m-Y H:i:s", strtotime($data['created_at']));
                          echo $newDate;
                        }?></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Updated Date</td>
                  <td><?php if($data['updated_at'] == date('0000-00-00 00:00:00')){
                          //echo "No";
                      } 
                      else
                        {
                          $newDate = date("d-m-Y H:i:s", strtotime($data['updated_at']));
                          echo $newDate;
                        }?></td>
                  </tr>
                
                </table>
                <?php $value=$data['is_deleted']; if($value == 0 ){ ?> 
                <br/>
                                      <a class="btn btn-primary pull-right" style="cursor: pointer;" <?php $value=$data['is_active']; if($value == 1 ){ ?> onclick="Jsclosealrt(<?php echo $value; ?>,<?php echo $data['business_id']; ?>)"<?php } else{ ?> onclick="Jsopenalrt(<?php echo $value; ?>,<?php echo $data['business_id']; ?>)"<?php }?>><?php $value=$data['is_active']; if($value == 1 ){ echo "Deactivate"; }else{echo "Activate"; } ?></a>
                                       <?php } ?>
                                      <br/>
        			</div>
        		</div>
            <?php } ?>
        	</div>	
    </section>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script type="text/javascript">

function Jsopenalrt(value,id){
  $.confirm({
    title:'Open Request',
    content: 'Are you sure you want to activate this business ?',
    buttons: {
      Yes: {
            btnClass: 'btn-red any-other-class', 
          action: function(){
            var count_id = "request";
            $.ajax({
                 url:"../../Controller/business/business_controller.php",
                 method:"POST",
                 data : {count_id:count_id,value:value,id:id},
                 success:function(data)
                 {

                   listbusiness(data);
                 }
              })
            // window.location.href='../../Controller/business/isactive_controller.php?id='+id+'&value='+value;
          }
        },
        No: {
            btnClass: 'btn-blue'
            
        }
    }
});
}
function Jsclosealrt(value,id){
  $.confirm({
    title:'Deactivate',
    content: 'Are you sure you want to deactivate this business ?',
    buttons: {
      Yes: {
            btnClass: 'btn-red any-other-class', 
          action: function(){
            var count_id = "request";
            $.ajax({
                 url:"../../Controller/business/business_controller.php",
                 method:"POST",
                 data : {count_id:count_id,value:value,id:id},
                 success:function(data)
                 {
                
                   listbusiness(data);
                 }
              })
            //window.location.href='../../Controller/business/isactive_controller.php?id='+id+'&value='+value;
          }
        },
        No: {
            btnClass: 'btn-blue'
        }
    }
});
}
</script>
  <?php //include "../../View/header/footer.php";?>  
 
     
                       
 