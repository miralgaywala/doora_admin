<?php 
// include "../../View/header/header.php";
//  include "../../View/header/sidemenu.php";
?> 
<script type="text/javascript">
  $(document).ready(function() {
   $('#example1').DataTable( {
    "columnDefs": [ {
            "targets": [3],
            "orderable": false
            } ]
    });
} );
  function addpointsoffer()
      {
            $.ajax({
                 url:"../../Controller/points_offer/addpointsoffer_controller.php",
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                       // pageurl = "../../View/tag/addtag.php";
                       // window.history.pushState({path:pageurl},'',pageurl);  
                 }
              })
      }
      function viewpoints_offer(id,bid)
      {
            $.ajax({
                 url:"../../Controller/points_offer/viewpoints_controller.php?id="+id+"&bid="+bid,
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                        
                 }
              })
      }
      function editpoits_offer(id)
      {
            $.ajax({
                 url:"../../Controller/points_offer/editpointsoffer_controller.php?id="+id,
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      
                 }
              })
      }
      function listpoints_offer(data)
      {
            hash_id = data;
            $.ajax({
                 url:"../../Controller/points_offer/displaypoints_offer.php",
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      $(hash_id).show();
                 }
              })
      }
      function existstag(data)
      {
         hash_id = data;
            $.ajax({
                 url:"../../View/tag/addtag.php",
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
    		<div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Points Offer List</h2></div>
    		<div class="col-md-2">
                <br/>   
    		<button type="button" style="float: right;" class="btn btn-primary" onclick="addpointsoffer()">+ Add Points Offer</button>
    		</div>
    	</div> 
                <div class="alert alert-info alert-dismissible" id="delete" style="display: none;">
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    Points offer has been deleted successfully
                 </div>
                <div class="alert alert-info alert-dismissible" id="add" style="display: none">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Points offer has been added successfully
                </div>
                <div class="alert alert-info alert-dismissible" id="edit" style="display: none">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Points offer has been edit successfully
                </div>
        <div class="row">
        	<div class="col-xs-12">
        		<div class="box">
        				<div class="box-body">
        				<table id="example1" class="table table-bordered table-hover">
			                <thead>
			                <tr>
			                  <th style="text-align:center;" width="5%">#</th>
			                  <th style="text-align:center;" width="8%">Offer Id</th>
			                  <th style="text-align:center;">Offer Description</th>
                        <th style="text-align:center;">Points</th>
			                  <th style="text-align:center;" width="10%">Action</th>
			                </tr>
							 </thead>
                <?php
                $i=0;
                foreach ($displaypoints_offer as $key => $data) 
                {     
                // echo "<pre>"; print_r($data); echo "</pre>";    
                  ?> <tr>
                                <td style="text-align:center;"><?php echo $i=$i+1;?></td>
                                <td style="text-align:center;"><?php echo $data['offer_id']; ?></td>
                                <td style="text-align:center;"><?php echo htmlentities($data['offer_desc'], ENT_QUOTES); ?></td>
                                <td style="text-align:center;"><?php echo $data['points']; ?></td>
                                <td style="text-align:center;">
                                    <div>
                                        <a onclick="editpoits_offer(<?php echo $data['offer_id']; ?>)" <?php //echo "href=../../Controller/tag/edittag_controller.php?id=".$data['tag_id']; ?> title="Edit" style="cursor: pointer;" >
                                          <i class="fa fa-pencil-square-o fa-fw"></i>
                                        </a>
                                        <a onclick="JSconfirm(<?php echo $data['offer_id']; ?>)" <?php //echo "href=../../Controller/tag/deletetag_controller.php?id=".$data['tag_id'];?>  title="Delete" style="cursor: pointer;">
                                        <i class="fa fa-trash-o fa-fw"></i>
                                        </a>
                                        <a onclick="viewpoints_offer(<?php echo $data['offer_id']; ?>,<?php echo $data['business_id']; ?>)" title="View all detail" style="cursor: pointer;">
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
    content: 'Are you sure you want to delete this points offer ?',
    buttons: {
      Yes: {
            btnClass: 'btn-red any-other-class', 
          action: function(){
             var count_id = "delete";
            $.ajax({
                 url:"../../Controller/points_offer/points_offer_controller.php",
                 method:"POST",
                 data : {count_id:count_id,id:bla},
                 success:function(data)
                 {
                      listpoints_offer(data);
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
 <?php 
  //include "../../View/header/footer.php";?>  