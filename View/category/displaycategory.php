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

    <section class="content">
   
    	<div class="row">
    		<div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Category List</h2></div>
    		<div class="col-md-2">
                <br/>   
    		<button type="button" style="float: right;" class="btn btn-primary" onclick="window.location.href='/doora/adminpanel/View/category/addcategory.php';">+ Add Category</button>

           <!-- <a href="/doora/adminpanel/View/category/addcategory.php" class="btn btn-primary">+ Add Category</a>-->
    		</div>
    	</div> 
        <div class="row">
        	<div class="col-xs-12">
        	
        		<div class="box">
        			
        			<!-- box-header -->
			        	

			          
        				<div class="box-body">
        				<table id="example1" class="table table-bordered table-hover">
			                <thead>
			                <tr>
			                  <th style="text-align:center;" width="5%">#</th>
			                  <th style="text-align:center;" width="5%">Id</th>
			                  <th style="text-align:center;" width="25%">Image</th>
			                  <th style="text-align:center;">Category Name</th>
			                  <th style="text-align:center;" width="10%">Is_Delete</th>
			                  <th style="text-align:center;" width="10%">Action</th>
			                </tr>
							 </thead>
                <?php
                $i=0;
                foreach ($displaycategory as $key => $data) 
                {
                    
                  ?> <tr>
                                <td style="text-align:center;"><?php echo $i=$i+1;?></td>
                                <td style="text-align:center;"><?php echo $data[0]; ?></td>
                                <td style="text-align:center;"><img <?php echo "src=/doora/images/category/".$data[2];?> id="Picture"/></td>
                                <td style="text-align:center;"><?php echo $data[1]; ?></td>
                                <td style="text-align:center;"><?php echo $data[3]; ?></td>
                                <td style="text-align:center;">
                          
                                    <div >
                                        <a <?php echo "href=/doora/adminpanel/Controller/category/editcategory_controller.php?id=".$data[0]; ?> title="Edit" >
                                          <i class="fa fa-pencil-square-o fa-fw"></i>
                                        </a>
                                        <a onclick="javascript: return confirm('Do you really want to delete this Category?');" <?php echo "href=/doora/adminpanel/Controller/category/deletecategory_controller.php?id=".$data[0];?>  title="Delete" >
                                        <i class="fa fa-trash-o fa-fw"></i>
                                        </a>
                                        <a <?php echo "href=/doora/adminpanel/Controller/category/viewcategory_controller.php?id=".$data[0]; ?> title="View all detail">
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