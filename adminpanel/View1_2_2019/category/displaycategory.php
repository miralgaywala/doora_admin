<?php //include "../../View/header/header.php";
 //include "../../View/header/sidemenu.php";
 ?>
 <script type="text/javascript">
   $(document).ready(function() {
   $('#example1').DataTable( {
    });
} );
   function listcategory(id)
      {
            hash_id = id;
            $.ajax({
                url:"../../Controller/category/displaycategorycontroller.php",
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      $(hash_id).show();
                 }
              })
      } 
   function addcategory()
      {
             
        $.ajax({
                 url:"../../View/category/addcategory.php",
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      
                 }
              })
      }
      function viewcategory(id)
      {
             
        $.ajax({
                 url:"../../Controller/category/viewcategory_controller.php?id="+id,
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      
                 }
              })
      }
      function editcategory(id)
      {
             
        $.ajax({
                 url:"../../Controller/category/editcategory_controller.php?id="+id,
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      
                 }
              })
      }
 </script>
    <section class="content">
   
    	<div class="row">
    		<div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Category List</h2></div>
    		<div class="col-md-2">
                <br/>   
    		<button type="button" style="float: right;" class="btn btn-primary" onclick="addcategory()">+ Add Category</button>
    		</div>
    	</div> 
      <div class="alert alert-info alert-dismissible" style="display: none;" id="add">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Category has been added successfully
            </div>
            <div class="alert alert-info alert-dismissible" style="display: none;" id="edit">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Category has been edited successfully
            </div>
            <div class="alert alert-info alert-dismissible" style="display: none;" id="delete">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Category has been deleted successfully
            </div>
        <div class="row">
        	<div class="col-xs-12">
        	
        		<div class="box">
        				<div class="box-body">
        				<table id="example1" class="table table-bordered table-hover">
			                <thead>
			                <tr>
			                  <th style="text-align:center;" width="5%">#</th>
			                  <th style="text-align:center;" width="5%">Id</th>
			                  <th style="text-align:center;" width="25%">Image</th>
			                  <th style="text-align:center;">Category Name</th>
			                  <th style="text-align:center;" width="10%">Action</th>
			                </tr>
							 </thead>
                <?php
                $i=0;
                foreach ($displaycategory as $key => $data) 
                {                    
                  ?> <tr>
                                <td style="text-align:center;"><?php echo $i=$i+1;?></td>
                                <td style="text-align:center;"><?php echo $data['category_id']; ?></td>
                                <td style="text-align:center;"><img <?php echo "src=../../../images/category/".$data['category_image'];?> id="Picture"/></td>
                                <td style="text-align:center;"><?php echo $data['category_name']; ?></td>
                                <td style="text-align:center;">
                                     <input type="hidden" name="id" id="id" value="<?php echo $data['category_id']; ?>">
                                    <div>
                                        <a onclick="editcategory(<?php echo $data['category_id']; ?>)" <?php //echo "href=../../Controller/category/editcategory_controller.php?id=".$data['category_id']; ?> title="Edit" style="cursor: pointer;">
                                          <i class="fa fa-pencil-square-o fa-fw"></i>
                                        </a>
                                        <a onclick="JSconfirm(<?php echo $data['category_id']; ?>)" <?php //echo "href=../../Controller/category/deletecategory_controller.php?id=".$data['category_id'];?>  title="Delete" style="cursor: pointer;">
                                        <i class="fa fa-trash-o fa-fw"></i>
                                        </a>
                                        <a onclick="viewcategory(<?php echo $data['category_id']; ?>)" <?php //echo "href=../../Controller/category/viewcategory_controller.php?id=".$data['category_id']; ?> title="View all detail" style="cursor: pointer;">
                                          <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </td>
                                 </tr>
                           <?php } ?>
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
  $.confirm({
    title:'Delete',
    content: 'Are you sure you want to delete this category ?',
    buttons: {
      Yes: {
            btnClass: 'btn-red any-other-class', 
          action: function(){
            var count_id = "delete";
            $.ajax({
                 url: '../../Controller/category/category_controller.php',
                 method:"POST",
                 data : {count_id:count_id,id:id},
                 success:function(data)
                 {
                   listcategory(data);
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