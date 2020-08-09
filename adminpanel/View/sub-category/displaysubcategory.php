 <?php 
 // include "../../View/header/header.php";
 // include "../../View/header/sidemenu.php";

 ?>
     
    <script>

$(document).ready(function() {
   $('#example1').DataTable( {
           "columnDefs": [ {
            "targets": [3],
            "orderable": false
            } ] 
    } );
   

} );

        $(document).ready(function(){
            $("#category_name").select2(); 
        });

        $(document).ready(function(){
      $('#category_name').change(function(){
        loadsubcategory($(this).find(':selected').val())
      })
    })
        function loadsubcategory(CategoryId){
      
        //var UsersId = $('#category').val(); 
        var elem = document.getElementById("category_name");
        selectedNode = elem.options[elem.selectedIndex];
        var CategoryId = selectedNode.value;
       // window.location.href='../../Controller/sub_category/subcategoryfilter.php?category_id='+CategoryId;
        $('#example2').dataTable().fnDestroy();
       $.ajax({
       url: '../../Controller/sub_category/subcategoryfilter.php?category_id='+CategoryId,
       type: 'POST',
       success: function(data) {
         $('.content-wrapper').html(data);
       }
      });
}
function subcategory()
      {
      
            $.ajax({
                 url:"../../Controller/sub_category/addsubcategory_controller.php",
                 method:"POST",
                 success:function(data)
                 {
                         $('.content-wrapper').html(data);
                 }
              })
      }
 function Viewsubcategory(id)
      {
            $.ajax({
                 url: "../../Controller/sub_category/viewsubcategory_controller.php?id="+id,
                 method:"POST",
                 success:function(data)
                 {
                       $('.content-wrapper').html(data);
                 }
              })
      }     
      function Editsubcategory(id)
      {
           
            $.ajax({
                 url: "../../Controller/sub_category/editsubcategory_controller.php?id="+id,
                 method:"POST",
                 success:function(data)
                 {
                       $('.content-wrapper').html(data);
                     
                 }
              })
      }   
      function listsubcategory(id)
      {
            hash_id = id;
            $.ajax({
                 url:"../../Controller/sub_category/displaysubcategorycontroller.php",
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
            <div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Sub Category List</h2></div>
            <div class="col-md-2">
                <br/>   
            <button type="button" style="float: right;" class="btn btn-primary" onclick="subcategory()" >+ Add Sub Category</button>          
            </div>
            
        </div> 
        <div class="alert alert-info alert-dismissible" id="add" style="display: none;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Sub Category has been added successfully
            </div>
            <div class="alert alert-info alert-dismissible" id="edit" style="display: none;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Sub Category has been edited successfully
            </div>
            <div class="alert alert-info alert-dismissible" id="delete" style="display: none;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Sub Category has been deleted successfully
            </div>
        
        <div class="row">
            <div class="col-xs-12">
            
                <div class="box">                    
                    <!-- box-header -->                    
                        <div class="box-body">
                          <form class="form-horizontal" name="addsubcategory" id="addsubcategory_form" role="form" action="" method="post" enctype="multipart/form-data">
                             <div class="form-group">
                                <label for="category_name" class="col-sm-1 control-label" style="margin-top: 5px;">Category</label>
                                <div class="col-sm-4" style="padding-top: 6px">
                                    <select id="category_name" name="category_name" class="form-control select2" aria-invalid="false" >
                                        <option value="0">All Category</option>
                                    <?php 
                                    if($_GET['category_id'])
                                    {
                                      $selected = $_GET['category_id'];
                                    }
                                    else
                                    {
                                      $selected = ' ';
                                    }
                                      ?>
                                     <?php
						                 foreach ($category_view as $key => $data1) 
						                { ?>
						                	  <option value="<?php echo $data1['category_id'];?>" <?php if($data1['category_id'] == $selected ) { ?> selected  <?php } ?>><?php echo $data1['category_name'];?></option>
						                	<?php   } ?>
                                    </select>
                                </div> 
                                <input type="hidden" name="category_name" id="category_name"/>
                            </div>
                          </form>
                          <hr>
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                              <th style="text-align:center;" width="5%">#</th>
                              <th style="text-align:center;" width="15%">Sub Category Id</th>
                              <!-- <th style="text-align:center;" width="15%">Sub Category Image</th> -->
                              <th style="text-align:center;">Sub Category Name</th>
                              
                              <th style="text-align:center;" width="10%">Action</th>
                            </tr>
                             </thead>
                             <tbody>
              <?php 
                $i=0;
                foreach ($displaysubcategory as $key => $data) 
                {
                  ?> <tr>
                                <td style="text-align:center;"><?php echo $i=$i+1;?></td>
                                <td style="text-align:center;"><?php echo $data['sub_category_id']; ?></td>
                               <!--  <td style="text-align:center;"><img <?php echo "src=../../../images/sub_category/".$data['sub_category_image'];?> id="SubCategoryPicture" style="object-fit: contain;"/></td> -->
                                <td style="text-align:center;"><?php echo $data['sub_category_name']; ?></td>
                                
                                <td style="text-align:center;">
                                  <input type="hidden" name="id" id="id" value="<?php echo $data['sub_category_id']; ?>">
                                    <div >
                                        <a onclick="Editsubcategory(<?php echo $data['sub_category_id']; ?>)" <?php //echo "href=../../Controller/sub_category/editsubcategory_controller.php?id=".$data['sub_category_id']; ?> style="cursor: pointer;" title="Edit" >
                                          <i class="fa fa-pencil-square-o fa-fw"></i>
                                        </a>
                                        <a onclick="JSconfirm(<?php echo $data['sub_category_id']; ?>)" <?php //echo "href=../../Controller/sub_category/deletesubcategory_controller.php?id=".$data['sub_category_id']; ?> style="cursor: pointer;" title="Delete" >
                                        <i class="fa fa-trash-o fa-fw"></i>
                                        </a>
                                        <a onclick="Viewsubcategory(<?php echo $data['sub_category_id']; ?>)" <?php //echo "href=../../Controller/sub_category/viewsubcategory_controller.php?id=".$data['sub_category_id']; ?> style="cursor: pointer;" title="View all detail">
                                          <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </td>
                                 </tr>
                           <?php } ?>
                           </tbody>
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
    content: 'Are you sure you want to delete this sub-category ?',
    buttons: {
      Yes: {
            btnClass: 'btn-red any-other-class', 
          action: function(){
            var count_id = "delete";
            $.ajax({
                  url: '../../Controller/sub_category/subcategory_controller.php',
                 method:"POST",
                 data : {count_id:count_id,id:bla},
                 success:function(data)
                 {
                      listsubcategory(data);
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