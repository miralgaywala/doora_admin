<?php //include "../../View/header/header.php";
 //include "../../View/header/sidemenu.php";
 ?>
<script type="text/javascript">



$(document).ready(function() {
    $("#user").select2();
});

function viewcustomeruserdetail(id) {
    $.ajax({
        url: "../../Controller/customer/viewcustomer_controller.php?id=" + id,
        method: "POST",
        success: function(data) {
            $('.content-wrapper').html(data);

        }
    })
}

function viewcustomerhistory(id) {
    $.ajax({
        url: "../../Controller/customer/viewcustomerhistory_controller.php?id=" + id,
        method: "POST",
        success: function(data) {
            $('.content-wrapper').html(data);

        }
    })
}

function listbusiness(data) {
    hash_id = data;
    $.ajax({
        url: "../../Controller/customer/displaycustomerlist_controller.php",
        method: "POST",
        success: function(data) {

            $('.content-wrapper').html(data);
            $(hash_id).show();
        }
    })
}
$(document).ready(function() {
    $('#user').change(function() {
        loadcustomer($(this).find(':selected').val())
    })
})

function loadcustomer(UserId) {

    //var UsersId = $('#category').val(); 
    var elem = document.getElementById("user");
    selectedNode = elem.options[elem.selectedIndex];
    var UserId = selectedNode.value;
    console.log(selectedNode.value);
    $.ajax({
        url: "../../Controller/customer/customerfilter.php?user_id=" + UserId,
        method: "POST",
        success: function(data) {
            $('.content-wrapper').html(data);

        }
    })
    //window.location.href='../../Controller/business/businessfilter.php?user_id='+UserId;
}

</script>

<section class="content">
   
    	<div class="row">
    		<div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Customer List</h2></div>
    		<div class="col-md-2">
                <br/>   
    		</div>
    	</div>
      <div class="alert alert-info alert-dismissible" style="display: none;" id="deactive">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Customer has been deactivated successfully
                </div> 
                <div class="alert alert-info alert-dismissible" style="display: none;" id="active">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Customer has been activated successfully
                </div>
                <div class="alert alert-info alert-dismissible" style="display: none;" id="delete">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Customer Has been deleted successfully
                </div>
        <div class="row">
        	<div class="col-xs-12">
        	
        		<div class="box">
        				<div class="box-body">
                  <form class="form-horizontal" name="displayuser" id="displayuser" role="form" action="" method="post" enctype="multipart/form-data">
                             <div class="form-group">
                                <label for="user" class="col-sm-3 control-label" style="margin-top: 5px;">Customer</label>
                                <div class="col-sm-5" style="padding-top: 6px">
                                    <select id="user" name="user" class="form-control select2" aria-invalid="false">
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
                                     <option value="f0">All Customer</option>
                                     <option value="f1" <?php if("f1" == $selected ) { ?> selected  <?php } ?>>Active</option>
                                     <option value="f2" <?php if("f2" == $selected ) { ?> selected  <?php } ?>>Deactive</option>
                                    <!--  <option value="f3" <?php if("f3" == $selected ) { ?> selected  <?php } ?>>Deleted</option> -->
                                    </select>
                                </div> 
                                <div class="col-sm-4">
                                </div>
                            </div>
                          </form>
                          <hr>
        				<table id="example1" class="table table-bordered table-hover">
			                <thead>
			                <tr>
			                  <th style="text-align:center;" width="5%">#</th>
			                  <th style="text-align:center;" width="8%">User Id</th>
			                  <th style="text-align:center;">Customer Name</th>
                              <th style="text-align:center;">Photo</th>
                              <th style="text-align:center;">Email Id</th>
                              <th style="text-align:center;">Contact No</th>
			                  <th style="text-align:center;" width="15%">Action</th>
			                </tr>
							 </thead>
                <?php
                $i=0;
                foreach ($display_customer as $key => $data) 
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
                   <?php $value=$data['is_deleted']; if($value == 0 ){ ?>  <tr>
                                <td style="text-align:center;"><?php echo $i=$i+1;?></td>
                                <td style="text-align:center;"><?php echo $data['user_id']; ?></td>
                                <td style="text-align:center;"><?php echo htmlentities($data['name'], ENT_QUOTES); ?></td>
                                <td style="text-align:center;"><img <?php echo "src=../../../images/profile/".$data['photo'];?> id="profilePicture" style="object-fit: contain;border: none;"/></td>
                                <td style="text-align:center;"><?php echo $data['email'];?></td>
                                <td style="text-align:center;"><?php echo $data['mobile_no'];?></td> 
                                <td style="text-align:center;">
                                        <input type="hidden" name="id" id="id" value="<?php echo $data['user_id']; ?>">
                                        <input type="hidden" name="open" id="open" value="<?php echo $data['is_active']; ?>">
                                    <div>
                                    	<a onclick="viewcustomeruserdetail(<?php echo $data['user_id']; ?>)" <?php //echo "href=../../Controller/customer/viewcustomer_controller.php?id=".$data['user_id'];?> title="View all detail" style="cursor: pointer;"><i class="fa fa-eye"></i></a>
                                        <?php $value=$data['is_deleted']; if($value == 0 ){ ?> 
                                        <a onclick="JSconfirm(<?php echo $data['user_id']; ?>)" <?php //echo "href=../../Controller/business/deletebusiness_controller.php?id=".$data['user_id'];?>  title="Delete" >
                                        <i class="fa fa-trash-o fa-fw"></i>
                                        </a>
                                           <?php } ?>
                                           <?php $value=$data['is_deleted']; if($value == 0 ){ ?> 
                                        <br/>
                                    	<a style="cursor: pointer;" <?php $value=$data['is_active']; if($value == 1 ){ ?>
                                    		onclick="Jsclosealrt(<?php echo $value; ?>,<?php echo $data['user_id']; ?>)"
                                    	<?php } else{ ?>
                                    		onclick="Jsopenalrt(<?php echo $value; ?>,<?php echo $data['user_id']; ?>)"
                                    	<?php }?>
                                    	<?php //echo "href=../../Controller/Customer/isactive_controller.php?id=".$data['user_id']."&value=".$data['is_active'];?>><?php $value=$data['is_active']; if($value == 1 ){
                                    		echo "Deactive";
                                    	}
                                    	else
                                    	{
                                    		echo "Active"; 
                                    	} ?></a>
                                      <br>
                                      <a onclick="viewcustomerhistory(<?php echo $data['user_id']; ?>)" title="View all detail" style="cursor: pointer;">Customer Points History</a>
                                       <?php } ?>
                                     </div>
                                </td>
                                 </tr>
                           <?php
                            } else {?>
                              <tr style="color:red;">
                                <td style="text-align:center;"><?php echo $i=$i+1;?></td>
                                <td style="text-align:center;"><?php echo $data['user_id']; ?></td>
                                <td style="text-align:center;"><?php echo htmlentities($data['name'], ENT_QUOTES); ?></td>
                                <td style="text-align:center;"><img <?php echo "src=../../../images/profile/".$data['photo'];?> id="profilePicture" style="object-fit: contain;"/></td>
                                <td style="text-align:center;"><?php echo $data['email'];?></td>
                                <td style="text-align:center;"><?php echo $data['mobile_no'];?></td> 
                                <td style="text-align:center;">
                                        <input type="hidden" name="id" id="id" value="<?php echo $data['user_id']; ?>">
                                        <input type="hidden" name="open" id="open" value="<?php echo $data['is_active']; ?>">
                                    <div>
                                      <a onclick="viewcustomeruserdetail(<?php echo $data['user_id']; ?>)" <?php //echo "href=../../Controller/customer/viewcustomer_controller.php?id=".$data['user_id'];?> title="View all detail" style="cursor: pointer;"><i class="fa fa-eye"></i></a>
                                        <?php $value=$data['is_deleted']; if($value == 0 ){ ?> 
                                        <a onclick="JSconfirm(<?php echo $data['user_id']; ?>)" <?php //echo "href=../../Controller/business/deletebusiness_controller.php?id=".$data['user_id'];?>  title="Delete" >
                                        <i class="fa fa-trash-o fa-fw"></i>
                                        </a>
                                           <?php } ?>
                                           <?php $value=$data['is_deleted']; if($value == 0 ){ ?> 
                                        <br/>
                                      <a style="cursor: pointer;" <?php $value=$data['is_active']; if($value == 1 ){ ?>
                                        onclick="Jsclosealrt(<?php echo $value; ?>,<?php echo $data['user_id']; ?>)"
                                      <?php } else{ ?>
                                        onclick="Jsopenalrt(<?php echo $value; ?>,<?php echo $data['user_id']; ?>)"
                                      <?php }?>
                                      <?php //echo "href=../../Controller/Customer/isactive_controller.php?id=".$data['user_id']."&value=".$data['is_active'];?>><?php $value=$data['is_active']; if($value == 1 ){
                                        echo "Deactivate";
                                      }
                                      else
                                      {
                                        echo "Activate"; 
                                      } ?></a>
                                      <br>
                                      <a onclick="viewcustomerhistory(<?php echo $data['user_id']; ?>)" title="View all detail" style="cursor: pointer;">Customer Points History</a>
                                       <?php } ?>
                                     </div>
                                </td>
                                 </tr>
                            <?php } } ?>
                  </table>
        			</div>
        		</div>
        	</div>	
       </div>
    </section>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script type="text/javascript">

function Jsopenalrt(value,id){
  $.confirm({
    title:'Open Request',
    content: 'Are you sure you want to activate this customer ?',
    buttons: {
      Yes: {
            btnClass: 'btn-red any-other-class', 
          action: function(){
            var count_id = "request";
            $.ajax({
                 url:"../../Controller/customer/customer_controller.php",
                 method:"POST",
                 data : {count_id:count_id,value:value,id:id},
                 success:function(data)
                 {
                   listbusiness(data);
                 }
              })
            //window.location.href='../../Controller/Customer/isactive_controller.php?id='+id+'&value='+value;
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
    content: 'Are you sure you want to deactivate this customer ?',
    buttons: {
      Yes: {
            btnClass: 'btn-red any-other-class', 
          action: function(){
            var count_id = "request";
            $.ajax({
                 url:"../../Controller/customer/customer_controller.php",
                 method:"POST",
                 data : {count_id:count_id,value:value,id:id},
                 success:function(data)
                 {

                   listbusiness(data);
                 }
              })
            //window.location.href='../../Controller/customer/isactive_controller.php?id='+id+'&value='+value;
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
    content: 'Are you sure you want to delete this customer ?',
    buttons: {
      Yes: {
            btnClass: 'btn-red any-other-class', 
          action: function(){
            var count_id = "delete";
            $.ajax({
                 url:"../../Controller/customer/customer_controller.php",
                 method:"POST",
                 data : {count_id:count_id,id:id},
                 success:function(data)
                 {

                   listbusiness(data);
                 }
              })
            //window.location.href='../../Controller/customer/deletecustomer_controller.php?id='+bla;
          }
        },
        No: {
            btnClass: 'btn-blue'
            
        }
    }
});
}

$(document).ready(function() {
    $('#example1').DataTable({
        "dom": 'Bfrtip',
        "buttons": [
             'csv'
        ],
        "columnDefs": [{
            "targets": [3, 6],
            "orderable": false
        }]
    });
    $('.dt-buttons').prepend("<label style='margin-right: 10px;'>Export: </label>");
});

</script>


<?php //include "../../View/header/footer.php";?>  