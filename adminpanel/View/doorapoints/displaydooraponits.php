<?php 
// include "../../View/header/header.php";
//  include "../../View/header/sidemenu.php";
?> 
<script type="text/javascript">
  $(document).ready(function() {
   $('#example1').DataTable( {
    });
} );

   function adddoorapoints()
      {
            $.ajax({
                 url:"../../View/doorapoints/adddoorapoints.php",
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                 }
              })
      }
      function listdooradollors(data)
      {
            hash_id = data;
            $.ajax({
                 url:"../../Controller/doorapoints/displaydoora_points.php",
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      $(hash_id).show();
                 }
              })
      }
      function existsdooradollors(data)
      {
         hash_id = data;
            $.ajax({
                 url:"../../View/doorapoints/adddoorapoints.php",
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      $(hash_id).show();
                      
                 }
              })
      }
      function editdoorapoints(id)
      {
         $.ajax({
                 url:"../../Controller/doorapoints/editdoorapoints_controller.php?id="+id,
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      
                 }
              })
      }
      function viewdoorapoints(id)
      {
        $.ajax({
                 url:"../../Controller/doorapoints/viewdoorapoints_controller.php?id="+id,
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      
                 }
              })
      }
      function existseditdooradollors(id,data)
      {
        hash_id = data;
         $.ajax({
                 url:"../../Controller/doorapoints/editdoorapoints_controller.php?id="+id,
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
    		<div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Doora Dollors Points List</h2></div>
    		<div class="col-md-2">
                <br/>   
    		<button type="button" style="float: right;" class="btn btn-primary" onclick="adddoorapoints()">+ Add Doora Dollor Points</button>
    		</div>
    	</div> 
                <div class="alert alert-info alert-dismissible" id="delete" style="display: none;">
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    Doora dollors points has been deleted successfully
                 </div>
                <div class="alert alert-info alert-dismissible" id="add" style="display: none">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    Doora dollors points has been Added successfully
                </div>
                <div class="alert alert-info alert-dismissible" id="edit" style="display: none">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    Doora dollors points has been Edit successfully
                </div>
        <div class="row">
        	<div class="col-xs-12">
        		<div class="box">
        				<div class="box-body">
        				<table id="example1" class="table table-bordered table-hover">
			                <thead>
			                <tr>
			                  <th style="text-align:center;" width="5%">#</th>
			                  <th style="text-align:center;" width="8%">Id</th>
			                  <th style="text-align:center;">Doora Dollor Points</th>
                        <th style="text-align:center;">Code</th>
                        <th style="text-align:center;">Description</th>
                        <th style="text-align:center;">points</th>
			                  <th style="text-align:center;" width="10%">Action</th>
			                </tr>
							 </thead>
                <?php
                $i=0;
                foreach ($display_points as $key => $data) 
                {                    
                  // print_r($data);
                  ?> <tr>
                                <td style="text-align:center;"><?php echo $i=$i+1;?></td>
                                <td style="text-align:center;"><?php echo $data['id']; ?></td>
                                <td style="text-align:center;"><?php echo $data['type']; ?></td>
                                <td style="text-align:center;"><?php echo $data['code']; ?></td>
                                <td style="text-align:center;"><?php echo $data['doora_dollar_points_desc']; ?></td>
                                <td style="text-align:center;"><?php echo $data['points']; ?></td>
                                <td style="text-align:center;">
                                  <input type="hidden" name="id" id="id" value="<?php echo $data['id']; ?>">
                                    <div>
                                        <a onclick="editdoorapoints(<?php echo $data['id']; ?>)" title="Edit" style="cursor: pointer;" >
                                          <i class="fa fa-pencil-square-o fa-fw"></i>
                                        </a>
                                       <!--  <a onclick="JSconfirm(<?php echo $data['id']; ?>)" title="Delete" style="cursor: pointer;">
                                        <i class="fa fa-trash-o fa-fw"></i>
                                        </a> -->
                                        <a onclick="viewdoorapoints(<?php echo $data['id']; ?>)" title="View all detail" style="cursor: pointer;">
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
    content: 'Are you sure you want to delete this Doora Points ?',
    buttons: {
      Yes: {
            btnClass: 'btn-red any-other-class', 
          action: function(){
             var count_id = "delete";
            $.ajax({
                 url:"../../Controller/doorapoints/doorapoints_controller.php",
                 method:"POST",
                 data : {count_id:count_id,id:bla},
                 success:function(data)
                 {
                      listdooradollors(data);
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