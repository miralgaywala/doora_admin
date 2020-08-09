 <?php //include "../../View/header/header.php";
// include "../../View/header/sidemenu.php";

 ?>
 <script>
  $(document).ready(function() {
   $('#example1').DataTable( {
    "columnDefs": [ {
            "targets": [3,8],
            "orderable": false
            } ]
    });
} );
  function viewbusinessinvoice(id)
      {
        $.ajax({
                 url:"../../Controller/business/viewbusinessinvoice_controller.php?id="+id,
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      
                 }
              })
      }
      function viewbusinessbranch(id)
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
      function viewbusinessuserdetail(id)
      {
        $.ajax({
                 url:"../../Controller/business/viewbusiness_controller.php?id="+id,
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
      function viewverificationdetail(id)
      {
          $.ajax({
                 url:"../../Controller/business/viewverificationcontroller.php?id="+id,
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      
                 }
              })
      }
      function viewfreetrialdates(id)
      {
        $.ajax({
                 url:"../../Controller/business/viewfreedayscontroller.php?id="+id,
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      topFunction();
                 }
              })
      }
        $(document).ready(function(){
            $("#user").select2(); 
        });

        $(document).ready(function(){
      $('#user').change(function(){
        loadbusiness($(this).find(':selected').val())
      })
    })
        function loadbusiness(UserId){
      
        //var UsersId = $('#category').val(); 
        var elem = document.getElementById("user");
        selectedNode = elem.options[elem.selectedIndex];
        var UserId = selectedNode.value;
       
         $.ajax({
                 url:"../../Controller/business/businessfilter.php?user_id="+UserId,
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      
                 }
              })
        //window.location.href='../../Controller/business/businessfilter.php?user_id='+UserId;
}
    </script>
<section class="content">
    	<div class="row">
    		<div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Business User List</h2></div>
    		<div class="col-md-2">
                <br/>   
    		<!--<button type="button" style="float: right;" class="btn btn-primary" onclick="window.location.href='/doora/adminpanel/View/tag/addtag.php';">+ Add Tag</button>-->
    		</div>
    	</div> 
                <div class="alert alert-info alert-dismissible" style="display: none;" id="deactive">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Business has been activated successfully
                </div>
                <div class="alert alert-info alert-dismissible" style="display: none;" id="notdeactive">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Business has not proper activated successfully
                </div>
                <div class="alert alert-info alert-dismissible" style="display: none;" id="active">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Business has been deactivated successfully
                </div>
                <div class="alert alert-info alert-dismissible" style="display: none;" id="delete">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Business has been deleted successfully
                </div>
                <div class="alert alert-info alert-dismissible" style="display: none;" id="add">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Free days has been updated successfully
                </div>
                <div class="alert alert-info alert-dismissible" style="display: none;" id="not">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                You can not update free trial days
                </div>
        <div class="row">
        	<div class="col-xs-12">
        		<div class="box">
        				<div class="box-body">
        					<form class="form-horizontal" name="displayuser" id="displayuser" role="form" action="" method="post" enctype="multipart/form-data">
                             <div class="form-group">
                                <label for="user" class="col-sm-3 control-label" style="margin-top: 5px;">Business User</label>
                                <div class="col-sm-5" style="padding-top: 6px">
                                    <select id="user" name="user" class="form-control" aria-invalid="false">
                                        <?php 
                                            if($_GET['user_id'])
                                            {
                                              $selected = $_GET['user_id'];
                                            }
                                            else
                                            {
                                              $selected = ' ';
                                            }
                                        ?>
                                     <option value="f0">All Business User</option>
                                     <option value="f1" <?php if("f1" == $selected ) { ?> selected  <?php } ?>>Active</option>
                                     <option value="f2" <?php if("f2" == $selected ) { ?> selected  <?php } ?>>Deactive</option>
                                     <option value="f3" <?php if("f3" == $selected ) { ?> selected  <?php } ?>>Deleted</option>
                                    </select>
                                </div> 
                                <div class="col-sm-4"></div>
                            </div>
                          </form>
                          <hr>
        				      <table id="example1" class="table table-bordered table-hover">
			                <thead>
			                <tr>
			                  <th style="text-align:center;" width="5%">#</th>
			                  <th style="text-align:center;" width="5%">User Id</th>
			                  <th style="text-align:center;">Buisness Name</th>
                        <th style="text-align:center;">Photo</th>
                        <th style="text-align:center;">Email Id</th>
                        <th style="text-align:center;">Contact No</th>
                        <th style="text-align:center;">Stripe Customer Id</th>
                        <th style="text-align:center;">Super Market</th>
			                  <th style="text-align:center;" width="13%">Action</th>
			                </tr>
							 </thead>
                <?php
                $i=0;
                foreach ($display_businessuser as $key => $data) 
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
                          <?php $value=$data['is_deleted']; if($value == 0 ){ ?> 
                            <tr>
                                <td style="text-align:center;"><?php echo $i=$i+1;?></td>
                                <td style="text-align:center;"><?php echo $data['user_id']; ?></td>
                                <td style="text-align:center;"><?php echo $data['business_name']; ?></td>
                                <td style="text-align:center;"><img <?php echo "src=../../../images/profile/".$data['photo'];?> id="profilePicture" style="object-fit: contain;"/></td>
                                <td style="text-align:center;"><?php echo $data['email'];?></td>
                                <td style="text-align:center;"><?php echo $data['mobile_no'];?></td>
                                <td style="text-align:center;"><?php echo $data['stripe_customer_id'];?></td>
                                <td style="text-align:center;"><?php if($data['is_super_market'] == 0)
                                                                {
                                                                  echo "No";
                                                                }
                                                                else
                                                                  {
                                                                    echo "Yes";
                                                                  }?></td>
                                <td style="text-align:center;">
                                      <input type="hidden" name="id" id="id" value="<?php echo $data['user_id']; ?>">
                                        <input type="hidden" name="open" id="open" value="<?php echo $data['is_active']; ?>">
                                    <div>
                                    	<a onclick="viewbusinessuserdetail(<?php echo $data['user_id']; ?>)" <?php //echo "href=../../Controller/business/viewbusiness_controller.php?id=".$data['user_id'];?> title="View all detail" style="cursor: pointer;"><i class="fa fa-eye"></i></a>
                                  
                                    	   <?php $value=$data['is_deleted']; if($value == 0 ){ ?> 
                                        <a onclick="JSconfirm(<?php echo $data['user_id']; ?>)" <?php //echo "href=../../Controller/business/deletebusiness_controller.php?id=".$data['user_id'];?>  title="Delete" >
                                        <i class="fa fa-trash-o fa-fw"></i>
                                        </a>
                                           <?php } ?>
                                            <?php $value=$data['is_deleted']; if($value == 0 ){ ?> 
                                        <br/>
                                       
                                    	<a style="cursor: pointer;" <?php $value=$data['is_active']; if($value == 1 ){ ?>
                                    		onclick="Jsclosealrt(<?php echo $value; ?>,<?php echo $data['user_id']; ?>)"
                                    	 <?php } else if($data['is_free_trial_started'] == 0 && $value == 0)
                                      {?>

                                        onclick="Jsclosealrtwithfree(<?php echo $value; ?>,<?php echo $data['user_id']; ?>)"
                                        <?php
                                      } else{ ?>
                                    		onclick="Jsopenalrt(<?php echo $value; ?>,<?php echo $data['user_id']; ?>)"
                                    	<?php }?>
                                    	<?php //echo "href=../../Controller/business/isactive_controller.php?id=".$data['user_id']."&value=".$data['is_active'];?>><?php $value=$data['is_active']; if($value == 1 ){
                                    		echo "Deactivate";
                                    	}
                                    	else
                                    	{
                                    		echo "Activate"; 
                                    	} ?></a>
                                        <?php } ?>
                                    	<br/>
                                     
                                    	<a onclick="viewbusinessbranch(<?php echo $data['user_id']; ?>)" <?php //echo "href=../../Controller/business/viewbusinessbranch_controller.php?id=".$data['user_id'];?> title="View all detail" style="margin-right: 3px;cursor: pointer;">
                                        	View Branch
                                        </a>
                                         <br/>
                                        <a onclick="viewverificationdetail(<?php echo $data['user_id']; ?>)" style="cursor: pointer;" <?php //echo "href=/doora/adminpanel/Controller/business/viewbusiness_controller.php?id=".$data[0];?> title="View all detail">Verification Detail</a>
                                        <br/>
                                        <a onclick="viewbusinessinvoice(<?php echo $data['user_id']; ?>)" <?php //echo "href=../../Controller/business/viewbusinessinvoice_controller.php?id=".$data['user_id'];?> title="View all detail" style="cursor: pointer;">View Receipts</a><br/>
                                        <?php
                                        if($data['is_free_trial_started'] == 0 && $data['is_active'] == 0)
                                        { ?>
                                        <a onclick="viewfreetrialdates(<?php echo $data['user_id']; ?>);" <?php //echo "href=../../Controller/business/viewbusinessinvoice_controller.php?id=".$data['user_id'];?> title="" style="cursor: pointer;">Free Trial Days</a>
                                      <?php }
                                      else{
                                        ?>
                                         <a <?php //echo "href=../../Controller/business/viewbusinessinvoice_controller.php?id=".$data['user_id'];?> title="" style="cursor: pointer;pointer-events: none;color:#D3D3D3; ">Free Trial Days</a>
                                        <?php
                                      } ?>
                                      </div>
                                </td>
                                 </tr>
                                <?php
                             } else { ?>

                              <tr style="color: red;">
                                <td style="text-align:center;"><?php echo $i=$i+1;?></td>
                                <td style="text-align:center;"><?php echo $data['user_id']; ?></td>
                                <td style="text-align:center;"><?php echo $data['business_name']; ?></td>
                                <td style="text-align:center;"><img <?php echo "src=../../../images/profile/".$data['photo'];?> id="profilePicture" style="object-fit: contain;"/></td>
                                <td style="text-align:center;"><?php echo $data['email'];?></td>
                                <td style="text-align:center;"><?php echo $data['mobile_no'];?></td>
                                <td style="text-align:center;"><?php echo $data['stripe_customer_id'];?></td>
                                <td style="text-align:center;"><?php if($data['is_super_market'] == 0)
                                                                {
                                                                  echo "No";
                                                                }
                                                                else
                                                                  {
                                                                    echo "Yes";
                                                                  }?></td>
                                <td style="text-align:center;">
                                      <input type="hidden" name="id" id="id" value="<?php echo $data['user_id']; ?>">
                                        <input type="hidden" name="open" id="open" value="<?php echo $data['is_active']; ?>">
                                    <div>
                                      <a onclick="viewbusinessuserdetail(<?php echo $data['user_id']; ?>)" <?php //echo "href=../../Controller/business/viewbusiness_controller.php?id=".$data['user_id'];?> title="View all detail" style="cursor: pointer;"><i class="fa fa-eye"></i></a>
                                  
                                         <?php $value=$data['is_deleted']; if($value == 0 ){ ?> 
                                        <a onclick="JSconfirm(<?php echo $data['user_id']; ?>)" <?php //echo "href=../../Controller/business/deletebusiness_controller.php?id=".$data['user_id'];?>  title="Delete" >
                                        <i class="fa fa-trash-o fa-fw"></i>
                                        </a>
                                           <?php } ?>
                                            <?php $value=$data['is_deleted']; if($value == 0 ){ ?> 
                                        <br/>
                                       
                                      <a style="cursor: pointer;" <?php $value=$data['is_active']; if($value == 1 ){ ?>
                                        onclick="Jsclosealrt(<?php echo $value; ?>,<?php echo $data['user_id']; ?>)"
                                      <?php } else if($data['is_free_trial_started'] == 0 && $value == 0)
                                      {?>

                                        onclick="Jsclosealrtwithfree(<?php echo $value; ?>,<?php echo $data['user_id']; ?>)"
                                        <?php
                                      } else{ ?>
                                        onclick="Jsopenalrt(<?php echo $value; ?>,<?php echo $data['user_id']; ?>)"
                                      <?php }?>
                                      <?php //echo "href=../../Controller/business/isactive_controller.php?id=".$data['user_id']."&value=".$data['is_active'];?>><?php $value=$data['is_active']; if($value == 1 ){
                                        echo "Deactivate";
                                      }
                                      else
                                      {
                                        echo "Activate"; 
                                      } ?></a>
                                        <?php } ?>
                                      <br/>
                                     
                                      <a onclick="viewbusinessbranch(<?php echo $data['user_id']; ?>)" <?php //echo "href=../../Controller/business/viewbusinessbranch_controller.php?id=".$data['user_id'];?> title="View all detail" style="margin-right: 3px;cursor: pointer;">
                                          View Branch
                                        </a>
                                         <br/>
                                        <a onclick="viewverificationdetail(<?php echo $data['user_id']; ?>)" style="cursor: pointer;" <?php //echo "href=/doora/adminpanel/Controller/business/viewbusiness_controller.php?id=".$data[0];?> title="View all detail">Verification Detail</a>
                                        <br/>
                                        <a onclick="viewbusinessinvoice(<?php echo $data['user_id']; ?>)" <?php //echo "href=../../Controller/business/viewbusinessinvoice_controller.php?id=".$data['user_id'];?> title="View all detail" style="cursor: pointer;">View Receipts</a>
                                      </div>
                                      </div>
                                </td>
                                 </tr>

                         <?php   } }?>
                                
                           
                  </table>
        			</div>
        		</div>
        	</div>	
       </div>
       <script>
// $(document).ready(function(){
//   $("#category_name").on("change", function() {
//     var value = $(this).val().toLowerCase();
//     $("#example1 tr").filter(function() {
//         $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
//     });
//   });
// });

</script>
    </section>
</div>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script type="text/javascript">

function Jsclosealrtwithfree(value,id){
  $.confirm({
    title:'Activate',
    content: 'You cannot update free trial days once you activate the user. Are you sure you want to activate this business?',
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
                  console.log(data);
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

function Jsopenalrt(value,id){
  $.confirm({
    title:'Activate',
    content: 'Are you sure you want to activate this business?',
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
                  console.log(data);
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
                  console.log(data);
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
function JSconfirm(id){
 
  $.confirm({
    title:'Delete',
    content: 'Are you sure you want to delete this business ?',
    buttons: {
      Yes: {
            btnClass: 'btn-red any-other-class', 
          action: function(){
            var count_id = "delete";
            $.ajax({
                 url:"../../Controller/business/business_controller.php",
                 method:"POST",
                 data : {count_id:count_id,id:id},
                 success:function(data)
                 {
                   listbusiness(data);
                 }
              })
            //window.location.href='../../Controller/business/deletebusiness_controller.php?id='+bla;
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