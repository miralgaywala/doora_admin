<?php include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/header.php");
 include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/sidemenu.php");
 ?>
    <section class="content">
   
    	<div class="row">
    		<div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Category List</h2></div>
    		<div class="col-md-2">
                <br/>   
    		<button type="button" style="float: right;" class="btn btn-primary" onclick="window.location.href='/doora/adminpanel/View/category/addcategory.php';">+ Add Category</button>
    		</div>
    	</div> 
        <?php 
            if($msg==0)
            {
           $msg='<div class="alert alert-info alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Category Has been Added successfully
            </div>';
            echo $msg;
          }
          else if($msg==2)
          {
            $msg='<div class="alert alert-info alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Category Has been updated successfully
            </div>';
            echo $msg;
           
          }
          else if($msg==3)
          {
            $msg='<div class="alert alert-info alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Category Has been deleted successfully
            </div>';
            echo $msg;
           
          }
           ?>
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
                                <td style="text-align:center;"><img <?php echo "src=/doora/images/category/".$data['category_image'];?> id="Picture"/></td>
                                <td style="text-align:center;"><?php echo $data['category_name']; ?></td>
                                <td style="text-align:center;">
                          
                                    <div >
                                        <a <?php echo "href=/doora/adminpanel/Controller/category/editcategory_controller.php?id=".$data['category_id']; ?> title="Edit" >
                                          <i class="fa fa-pencil-square-o fa-fw"></i>
                                        </a>
                                        <a onclick="javascript: return confirm('Do you really want to delete this Category?');" <?php echo "href=/doora/adminpanel/Controller/category/deletecategory_controller.php?id=".$data['category_id'];?>  title="Delete" >
                                        <i class="fa fa-trash-o fa-fw"></i>
                                        </a>
                                        <a <?php echo "href=/doora/adminpanel/Controller/category/viewcategory_controller.php?id=".$data['category_id']; ?> title="View all detail">
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
 <?php include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/footer.php");?>  