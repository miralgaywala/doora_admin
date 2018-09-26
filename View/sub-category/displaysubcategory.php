<?php include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/header.php");
 include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/sidemenu.php");
 ?>
<!--Main Content -->

   <!-- <section class="row">
        <h3 class="column-left">Category List</h3>
        <div class="column-right">
            <a href="/doora/adminpanel/View/category/addcategory.php" class="btn btn-primary">+ Add Category</a>
        </div>
    </section>-->
    <script>
        $(document).ready(function(){
            $("#category_name").select2(); 
        });
    </script>
    <section class="content">
        <div class="row">
            <div class="col-md-10" style="float: left;"> <h2>Sub Category List</h2></div>
            <div class="col-md-2">
                <br/>   
            <button type="button" style="float: right;" class="btn btn-primary" onclick="">+ Add Sub Category</button>

           <!-- <a href="/doora/adminpanel/View/category/addcategory.php" class="btn btn-primary">+ Add Category</a>-->
            </div>
        </div> 
        <div class="row">
            <div class="col-xs-12">
            
                <div class="box">
                    
                    <!-- box-header -->
                        

                      
                        <div class="box-body">
                          <form class="form-horizontal" name="addsubcategory" id="addsubcategory_form" role="form" action="" method="post" enctype="multipart/form-data">
                             <div class="form-group">
                                <label for="category_name" class="col-sm-1 control-label">Category</label>
                                <div class="col-sm-4" style="padding-top: 6px">
                                    <select id="category_name" name="category_name" class="form-control">
                                    <option value="">Select Category</option>
                                </select>
                                </div> 
                            </div>
                          </form>
                          <hr>
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                              <th style="text-align:center;" width="5%">#</th>
                              <th style="text-align:center;" width="5%">Sub Category Id</th>
                              <th style="text-align:center;">Sub Category Name</th>
                              <th style="text-align:center;" width="15%">Sub Category Image</th>
                              <th style="text-align:center;" width="10%">Is_Delete</th>
                              <th style="text-align:center;" width="10%">Action</th>
                            </tr>
                             </thead>
                <?php
                $i=0;
                foreach ($displaysubcategory as $key => $data) 
                {
                    
                  ?> <tr>
                                <td style="text-align:center;"><?php echo $i=$i+1;?></td>
                                <td style="text-align:center;"><?php echo $data[0]; ?></td>
                                <td style="text-align:center;"><?php echo $data[2]; ?></td>
                                <td style="text-align:center;"><img <?php echo "src=/doora/images/sub_category/".$data[3];?> id="Sicture"/></td>
                                <td style="text-align:center;"><?php echo $data[4]; ?></td>
                                <td style="text-align:center;">
                          
                                    <div >
                                        <a href="#" title="Edit" >
                                          <i class="fa fa-pencil-square-o fa-fw"></i>
                                        </a>
                                        <a onclick="javascript: return confirm('are you sure you want to delete?');" href="#" title="Delete" >
                                        <i class="fa fa-trash-o fa-fw"></i>
                                        </a>
                                        <a href="#" title="View all detail">
                                          <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </td>
                                 </tr>
                           <?php    } ?>
                            <script>
                                
                            </script>
                             
                         </table>
                    </div>
                </div>
            </div>  
       </div>
    </section>
</div>
 <?php include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/footer.php");?>  