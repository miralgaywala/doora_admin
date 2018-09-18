<?php include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/header.php");
 include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/sidemenu.php");
 ?>
<!--Main Content -->

    <section class="content">
    	<div class="row">
    		<div class="col-md-10"></div>
    		<div class="col-md-2">
    			<button type="button" class="btn btn-primary" onclick="window.location.href='/doora/adminpanel/View/category/addcategory.php';"><b>+ Add Category</b></button>
    		</div>

    	</div> 
        <div class="row" >
        	<div class="col-xs-12">
        		<br/>
        		<div class="box">
        			<br>
        			<!-- box-header -->
			        	<div class="box-header">
			                <h1 class="box-title"><b>Category List</b></h1>
			            </div>
        				<div class="box-body">
        				<table id="example1" class="table table-bordered table-hover">
			                <thead>
			                <tr>
			                  <th style="text-align:center;">#</th>
			                  <th style="text-align:center;" width="10%">Id</th>
			                  <th style="text-align:center;" width="25%">Image</th>
			                  <th style="text-align:center;">Category Name</th>
			                  <th style="text-align:center;" width="10%">Is_Delete</th>
			                  <th style="text-align:center;" width="10%">Action</th>
			                </tr>
							 </thead>
              
                <?php
                foreach ($displaycategory as $key => $data) 
                {
                  ?> <tr>
                                <td style="text-align:center;"></td>
                                <td style="text-align:center;"><?php echo $data[0]; ?></td>
                                <td style="text-align:center;"><img <?php echo "src=/doora/images/category/".$data[2];?> id="Picture"/></td>
                                <td style="text-align:center;"><?php echo $data[1]; ?></td>
                                <td style="text-align:center;"><?php echo $data[3]; ?></td>
                                <td style="text-align:center;">
                          
                                    <div >
                                        <a <?php echo "href=/doora/adminpanel/Controller/category/editcategory_controller.php?id=".$data[0]; ?> title="Edit" >
                                          <i class="fa fa-pencil-square-o fa-fw"></i>
                                        </a>
                                        <a <?php echo "href=/doora/adminpanel/Controller/category/deletecategory_controller.php?id=".$data[0]; ?>  title="Delete" onclick="return confirm('Are you sure delete the category?')">
                                        <i class="fa fa-trash-o fa-fw"></i>
                                        </a>
                                        <a href="#" title="View all detail">
                                          <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </td>
                                 </tr>
                           <?php    } ?>
                            
                             
                         </table>
        			</div>
        		</div>
        	</div>	
       </div>
    </section>
</div>
 <?php include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/footer.php");?> 
 