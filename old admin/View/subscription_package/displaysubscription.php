  <script type="text/javascript">
  $(document).ready(function() {
   $('#example1').DataTable( {
    "columnDefs": [ {
            "targets": [4],
            "orderable": false
            } ]
    });
} );

  function addsubscription()
      {
            $.ajax({
                 url:"../../View/subscription_package/addsubscription.php",
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                       // pageurl = "../../View/tag/addtag.php";
                       // window.history.pushState({path:pageurl},'',pageurl);  
                 }
              })
      }
      function viewsubscription(id)
      {
            $.ajax({
                 url:"../../Controller/subscription_package/viewsubscription_controller.php?id="+id,
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                        
                 }
              })
      }
      function editsubscription(id)
      {
            $.ajax({
                 url:"../../Controller/subscription_package/editsubscription_controller.php?id="+id,
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      
                 }
              })
      }
      function listsubscription(data)
      {
            hash_id = data;
            $.ajax({
                 url:"../../Controller/subscription_package/displaysubscription_controller.php",
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
    		<div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Subscription List</h2></div>
    		<div class="col-md-2">
                <br/>   
    		<button type="button" style="float: right;" class="btn btn-primary" onclick="addsubscription()">+ Add Subscription plan</button>
    		</div>
    	</div> 
       <div class="alert alert-info alert-dismissible" id="delete" style="display: none;">
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    Subscription Package has been deleted successfully
                 </div>
                <div class="alert alert-info alert-dismissible" id="add" style="display: none">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Subscription Package has been added successfully
                </div>
                <div class="alert alert-info alert-dismissible" id="edit" style="display: none">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Subscription Package has been edited successfully
                </div>
        <div class="row">
        	<div class="col-xs-12">
        	
        		<div class="box">
        				<div class="box-body">
        				<table id="example1" class="table table-bordered table-hover">
			                <thead>
			                <tr>
			                  <th style="text-align:center;" width="5%">#</th>
			                  <th style="text-align:center;" width="15%">Subscription Plan Id</th>
			                  <th style="text-align:center;">Price</th>
                        <th style="text-align:center;">Per Deal Redeem Price</th>
                        <!-- <th style="text-align:center;">Free Days</th> -->
			                  <th style="text-align:center;" width="10%">Action</th>
			                </tr>
							 </thead>
                <?php
                $i=0;
                foreach ($display_subscription as $key => $data) 
                {                    
                  ?> <tr>
                                <td style="text-align:center;"><?php echo $i=$i+1;?></td>
                                <td style="text-align:center;"><?php echo $data['subscription_plan_id']; ?></td>
                                <td style="text-align:center;"><?php echo $data['price']; ?></td>
                                 <td style="text-align:center;"><?php echo $data['per_deal_redeem_price']; ?></td>
                                  <!-- <td style="text-align:center;"><?php echo $data['free_days']; ?></td> -->
                                <td style="text-align:center;">
                              
                                    <div >
                                        <a onclick="editsubscription(<?php echo $data['subscription_plan_id']; ?>)" <?php //echo "href=../../Controller/subscription_package/editsubscription_controller.php?id=".$data['subscription_plan_id']; ?> title="Edit" style="cursor: pointer;" >
                                          <i class="fa fa-pencil-square-o fa-fw"></i>
                                        </a>
                                        <a onclick="JSconfirm(<?php echo $data['subscription_plan_id']; ?>)" <?php //echo "href=../../Controller/subscription_package/deletesubscription_controller.php?id=".$data['subscription_plan_id'];?>  title="Delete" style="cursor: pointer;">
                                        <i class="fa fa-trash-o fa-fw"></i>
                                        </a>
                                        <a onclick="viewsubscription(<?php echo $data['subscription_plan_id']; ?>)" <?php //echo "href=../../Controller/subscription_package/viewsubscription_controller.php?id=".$data['subscription_plan_id'];?> title="View all detail" style="cursor: pointer;">
                                          <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </td>
                                 </tr>
                           <?php  } ?>
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
function JSconfirm(id){
  var bla = id;
  $.confirm({
    title:'Delete',
    content: 'Are you sure you want to delete this subscription package?',
    buttons: {
      Yes: {
            btnClass: 'btn-red any-other-class', 
          action: function(){
             var count_id = "delete";
            $.ajax({
                   url:"../../Controller/subscription_package/subscription_controller.php",
                 method:"POST",
                 data : {count_id:count_id,id:bla},
                 success:function(data)
                 {
                      listsubscription(data);
                 }
              })
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