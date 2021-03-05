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
                 url:"../../Controller/subscription_benefits/addsubscription_controller.php",
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
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
      function viewbenefit(id)
      {
            $.ajax({
                 url:"../../Controller/subscription_package/viewbenefit_controller.php?id="+id,
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                        
                 }
              })
      }
      function editsubscription(id)
      {
        console.log("Id:"+id);
            $.ajax({
                 url:"../../Controller/subscription_benefits/editsubscription_controller.php?id="+id,
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      console.log(data);
                 }
              })
      }
      function listsubscription(id)
      {
            hash_id = data;
            $.ajax({
                 url:"../../Controller/subscription_benefits/viewbenefits_controller.php?id="+id,
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
    		<div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Benefit List</h2></div>
    	</div> 
       <div class="alert alert-info alert-dismissible" id="delete" style="display: none;">
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    Subscription Benefit has been deleted successfully
                 </div>
                <div class="alert alert-info alert-dismissible" id="add" style="display: none">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Subscription Benefit has been added successfully
                </div>
                <div class="alert alert-info alert-dismissible" id="edit" style="display: none">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Subscription Benefit has been edited successfully
                </div>
        <div class="row">
        	<div class="col-xs-12">
        	
        		<div class="box">
        				<div class="box-body">
        				<table id="example1" class="table table-bordered table-hover">
			                <thead>
			                <tr>
			                  <th style="text-align:center;" width="5%">#</th>
			                  <th style="text-align:center;" width="15%">Benefit Id</th>
                        <th style="text-align:center;">Title</th>
                        <th style="text-align:center;">Is Main?</th>
			                  
                        
                       
			                  <th style="text-align:center;" width="10%">Action</th>
			                </tr>
							 </thead>
                <?php
                $i=0;
                foreach ($view_benefits as $key => $data) 
                {                    
                  ?> <tr>
                                <td style="text-align:center;"><?php echo $i=$i+1;?></td>
                                <td style="text-align:center;"><?php echo $data['benefit_id']; ?></td>
                                <td style="text-align:center;"><?php echo $data['title']; ?></td>
                                <td style="text-align:center;"><?php echo $data['is_main']; ?></td>
                                
                                
                                
                                  
                                <td style="text-align:center;">
                              
                                    <div >
                                        <a onclick="viewbenefit(<?php echo $data['benefit_id']; ?>)" <?php //echo "href=../../Controller/subscription_package/editsubscription_controller.php?id=".$data['subscription_plan_id']; ?> title="Edit" style="cursor: pointer;" >
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
    content: 'Are you sure you want to delete this subscription benefit?',
    buttons: {
      Yes: {
            btnClass: 'btn-red any-other-class', 
          action: function(){
             var count_id = "delete";
            $.ajax({
                   url:"../../Controller/subscription_benefits/subscription_controller.php",
                 method:"POST",
                 data : {count_id:count_id,id:id},
                 success:function(data)
                 {
                    console.log("before list");
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