<?php 
// include "../../View/header/header.php";
//  include "../../View/header/sidemenu.php";
?> 
<script type="text/javascript">
  $(document).ready(function() {
   $('#example1').DataTable( {
    });
} );
  function addtag()
      {
            $.ajax({
                 url:"../../View/tag/addtag.php",
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                       // pageurl = "../../View/tag/addtag.php";
                       // window.history.pushState({path:pageurl},'',pageurl);  
                 }
              })
      }
      function viewtag(id)
      {
            $.ajax({
                 url:"../../Controller/tag/viewtag_controller.php?id="+id,
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                        
                 }
              })
      }
      function edittag(id)
      {
            $.ajax({
                 url:"../../Controller/tag/edittag_controller.php?id="+id,
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      
                 }
              })
      }
      function listtag(data)
      {
            hash_id = data;
            $.ajax({
                 url:"../../Controller/tag/displaytagcontroller.php",
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
    		<div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Tag List</h2></div>
    		<div class="col-md-2">
                <br/>   
    		<button type="button" style="float: right;" class="btn btn-primary" onclick="addtag()">+ Add Tag</button>
    		</div>
    	</div> 
                <div class="alert alert-info alert-dismissible" id="delete" style="display: none;">
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    Tag has been deleted successfully
                 </div>
                <div class="alert alert-info alert-dismissible" id="add" style="display: none">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Tag has been Added successfully
                </div>
                <div class="alert alert-info alert-dismissible" id="edit" style="display: none">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Tag has been Edit successfully
                </div>
        <div class="row">
        	<div class="col-xs-12">
        		<div class="box">
        				<div class="box-body">
        				<table id="example1" class="table table-bordered table-hover">
			                <thead>
			                <tr>
			                  <th style="text-align:center;" width="5%">#</th>
			                  <th style="text-align:center;" width="5%">Tag Id</th>
			                  <th style="text-align:center;">Tag</th>
			                  <th style="text-align:center;" width="10%">Action</th>
			                </tr>
							 </thead>
                <?php
                $i=0;
                foreach ($display_tag as $key => $data) 
                {                    
                  ?> <tr>
                                <td style="text-align:center;"><?php echo $i=$i+1;?></td>
                                <td style="text-align:center;"><?php echo $data['tag_id']; ?></td>
                                <td style="text-align:center;"><?php echo $data['tag']; ?></td>
                                <td style="text-align:center;">
                                  <input type="hidden" name="id" id="id" value="<?php echo $data['tag_id']; ?>">
                                    <div>
                                        <a onclick="edittag(<?php echo $data['tag_id']; ?>)" <?php //echo "href=../../Controller/tag/edittag_controller.php?id=".$data['tag_id']; ?> title="Edit" style="cursor: pointer;" >
                                          <i class="fa fa-pencil-square-o fa-fw"></i>
                                        </a>
                                        <a onclick="JSconfirm(<?php echo $data['tag_id']; ?>)" <?php //echo "href=../../Controller/tag/deletetag_controller.php?id=".$data['tag_id'];?>  title="Delete" style="cursor: pointer;">
                                        <i class="fa fa-trash-o fa-fw"></i>
                                        </a>
                                        <a onclick="viewtag(<?php echo $data['tag_id']; ?>)" title="View all detail" style="cursor: pointer;">
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
    content: 'Are you sure you want to delete this tag ?',
    buttons: {
      Yes: {
            btnClass: 'btn-red any-other-class', 
          action: function(){
             var count_id = "delete";
            $.ajax({
                 url:"../../Controller/tag/tag_controller.php",
                 method:"POST",
                 data : {count_id:count_id,id:bla},
                 success:function(data)
                 {
                      listtag(data);
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