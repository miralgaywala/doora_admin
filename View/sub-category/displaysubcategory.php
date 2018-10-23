<?php include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/header.php");
 include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/sidemenu.php");
 ?>
     <?php 
        include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/Controller/sub_category/subcategory_controller.php");
        $controller=new subcategory_controller();
        $controller->display_subcategory();
        ?>

    <script>
        $(document).ready(function(){
            $("#category_name").select2(); 
        });

    </script>
    <section class="content">
      <div id='msg'></div>
        <div class="row">
            <div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Sub Category List</h2></div>
            <div class="col-md-2">
                <br/>   
            <button type="button" style="float: right;" class="btn btn-primary" onclick="window.location.href='/doora/adminpanel/Controller/sub_category/addsubcategory_controller.php';">+ Add Sub Category</button>          
            </div>
        </div> 
        <?php 
            if($msg==0)
            {
           $msg='<div class="alert alert-info alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Sub Category Has been Added successfully
            </div>';
            echo $msg;
          }
          else if($msg==2)
          {
            $msg='<div class="alert alert-info alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Sub Category Has been updated successfully
            </div>';
            echo $msg;
           
          }
          else if($msg==3)
          {
            $msg='<div class="alert alert-info alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Sub Category Has been deleted successfully
            </div>';
            echo $msg;
          }
           ?>
        <div class="row">
            <div class="col-xs-12">
            
                <div class="box">                    
                    <!-- box-header -->                    
                        <div class="box-body">
                          <form class="form-horizontal" name="addsubcategory" id="addsubcategory_form" role="form" action="" method="post" enctype="multipart/form-data">
                             <div class="form-group">
                                <label for="category_name" class="col-sm-1 control-label">Category</label>
                                <div class="col-sm-4" style="padding-top: 6px">
                                    <select id="category_name" name="category_name" class="form-control select2" aria-invalid="false" >
                                    <option value="">Select Category</option>
                                     <?php
						                 foreach ($category_view as $key => $data1) 
						                { ?>
						                	 <option value="<?php echo $data1[0];?>"><?php echo $data1[1];?></option>
						                	<?php   } ?>
                                    </select>
                                </div> 
                                <input type="hidden" name="category_name" id="category_name" />
                            </div>
                          </form>
                          <hr>
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                              <th style="display: none;" ></th>
                              <th style="text-align:center;" width="5%">#</th>
                              <th style="text-align:center;" width="5%">Sub Category Id</th>
                              <th style="text-align:center;">Sub Category Name</th>
                              <th style="text-align:center;" width="15%">Sub Category Image</th>
                              <th style="text-align:center;" width="10%">Action</th>
                            </tr>
                             </thead>
                             <tbody>
              <?php 
              
                $i=0;
                foreach ($displaysubcategory as $key => $data) 
                {
                  ?> <tr>
                                <td style="display: none;" id="filter"><?php echo $data[1]; ?></td>
                                <td style="text-align:center;"><?php echo $i=$i+1;?></td>
                                <td style="text-align:center;"><?php echo $data[0]; ?></td>
                                <td style="text-align:center;"><?php echo $data[2]; ?></td>
                                <td style="text-align:center;"><img <?php echo "src=/doora/images/sub_category/".$data[3];?> id="SubCategoryPicture"/></td>
                                <td style="text-align:center;">
                          
                                    <div >
                                        <a <?php echo "href=/doora/adminpanel/Controller/sub_category/editsubcategory_controller.php?id=".$data[0]; ?> title="Edit" >
                                          <i class="fa fa-pencil-square-o fa-fw"></i>
                                        </a>
                                        <a onclick="return confirm('Do you really want to delete this sub-category ?');" <?php echo "href=/doora/adminpanel/Controller/sub_category/deletesubcategory_controller.php?id=".$data[0]; ?> title="Delete" >
                                        <i class="fa fa-trash-o fa-fw"></i>
                                        </a>
                                        <a <?php echo "href=/doora/adminpanel/Controller/sub_category/viewsubcategory_controller.php?id=".$data[0]; ?> title="View all detail">
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
<script>
// $(document).ready(function(){
//   $("#category_name").on("change", function() {
//     var value = $(this).val().toLowerCase();
//     $("#example1 tr").filter(function() {
//         $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
//     });
//   });
// });
$("#category_name").on("change", function() {
    var value = $(this).val();

    $("#example1 tr").each(function(index) {
        if (index != 0) {

            $row = $(this);

            var id = $row.find("td:first").text();

            if (id.indexOf(value) != 0) {
                $(this).hide();
            }
            else {
                $(this).show();
            }
        }
    });
})  
</script>
 <?php include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/footer.php");?>  
 <script type="text/javascript">
//  oTable = $('#example1').DataTable();   //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
// $('#category_name').change(function(){
//  oTable.search($(this).val()).draw() 
// })
 </script>