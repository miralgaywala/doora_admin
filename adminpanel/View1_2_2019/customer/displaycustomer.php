<?php //include "../../View/header/header.php";
 //include "../../View/header/sidemenu.php";
 ?>
 <script type="text/javascript">
  $(document).ready(function() {
   $('#example1').DataTable( {
    });
} );
   function viewcustomeruserdetail(id)
      {
        $.ajax({
                 url:"../../Controller/customer/viewcustomer_controller.php?id="+id,
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
                 url:"../../Controller/customer/displaycustomerlist_controller.php",
                 method:"POST",
                 success:function(data)
                 {
                     
                      $('.content-wrapper').html(data);
                      $(hash_id).show();
                 }
              })
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
        				<table id="example1" class="table table-bordered table-hover">
			                <thead>
			                <tr>
			                  <th style="text-align:center;" width="5%">#</th>
			                  <th style="text-align:center;" width="5%">User id</th>
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
                  ?> <tr>
                                <td style="text-align:center;"><?php echo $i=$i+1;?></td>
                                <td style="text-align:center;"><?php echo $data['user_id']; ?></td>
                                <td style="text-align:center;"><?php echo $data['name']; ?></td>
                                <td style="text-align:center;"><img <?php echo "src=../../../images/profile/".$data['photo'];?> id="profilePicture"/></td>
                                <td style="text-align:center;"><?php echo $data['email'];?></td>
                                <td style="text-align:center;"><?php echo $data['mobile_no'];?></td> 
                                <td style="text-align:center;">
                                        <input type="hidden" name="id" id="id" value="<?php echo $data['user_id']; ?>">
                                        <input type="hidden" name="open" id="open" value="<?php echo $data['is_active']; ?>">
                                    <div>
                                    	<a onclick="viewcustomeruserdetail(<?php echo $data['user_id']; ?>)" <?php //echo "href=../../Controller/customer/viewcustomer_controller.php?id=".$data['user_id'];?> title="View all detail" style="cursor: pointer;"><i class="fa fa-eye"></i></a>
                                  
                                    	  
                                        <a style="cursor: pointer;" onclick="JSconfirm(<?php echo $data['user_id']; ?>)" <?php //echo "href=../../Controller/customer/deletecustomer_controller.php?id=".$data['user_id'];?>  title="Delete" >
                                        <i class="fa fa-trash-o fa-fw"></i>
                                        </a>
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
                                     </div>
                                </td>
                                 </tr>
                           <?php
                            } ?>
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
</script>


<?php //include "../../View/header/footer.php";?>  