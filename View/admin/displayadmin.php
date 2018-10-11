<?php include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/header.php");
 include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/sidemenu.php");
 ?>
<section class="content">   
    	<div class="row">
    		<div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Admin List</h2></div>
    		<div class="col-md-2">
                <br/>   
                <button type="button" style="float: right;" class="btn btn-primary" onclick="window.location.href='/doora/adminpanel/View/admin/addadmin.php';">+ Add Admin</button>
    		</div>
    	</div> 
        <?php 
          //   if($msg==1)
          //   {
          //      $msg='<div class="alert alert-info alert-dismissible">
          //       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          //       Deactivate Has been successfully
          //       </div>';
          //       echo $msg;
          // }
          // else if($msg==2)
          // {
          //       $msg='<div class="alert alert-info alert-dismissible">
          //       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          //       Activate Has been successfully
          //       </div>';
          //       echo $msg;           
          // }
         	if($msg==3)
          {
                $msg='<div class="alert alert-info alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Admin Has been deleted successfully
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
      			                  <th style="text-align:center;" width="5%">Admin id</th>
                              <th style="text-align:center;" width="5%">Role id</th>
      			                  <th style="text-align:center;">Userame</th>
                              <th style="text-align:center;">Admin Name</th>
                              <th style="text-align:center;">Contact No</th>
                              <th style="text-align:center;">Photo</th>
                              <th style="text-align:center;">Email Id</th>
                              
			                        <th style="text-align:center;" width="15%">Action</th>
			                </tr>
							 </thead>
                <?php
                $i=0;
                foreach ($display_admin as $key => $data) 
                {                    
                  ?> <tr>
                                <td style="text-align:center;"><?php echo $i=$i+1;?></td>
                                <td style="text-align:center;"><?php echo $data[0]; ?></td>
                                <td style="text-align:center;"><?php echo $data[1]; ?></td>
                                <td style="text-align:center;"><?php echo $data[2];?></td>
                                <td style="text-align:center;"><?php echo $data[4];?></td> 
                                <td style="text-align:center;"><?php echo $data[6];?></td>
                                <td style="text-align:center;"><img <?php echo "src=/doora/images/profile/".$data[7];?> id="profilePicture"/></td>
                                <td style="text-align:center;"><?php echo $data[5];?></td> 
                                <td style="text-align:center;">
                                  <div >
                                        <a <?php //echo "href=/doora/adminpanel/Controller/category/editcategory_controller.php?id=".$data[0]; ?> title="Edit" >
                                          <i class="fa fa-pencil-square-o fa-fw"></i>
                                        </a>
                                        <a onclick="javascript: return confirm('Do you really want to delete this Admin?');" <?php echo "href=/doora/adminpanel/Controller/admin/deleteadmin_controller.php?id=".$data[0];?>  title="Delete" >
                                        <i class="fa fa-trash-o fa-fw"></i>
                                        </a>
                                        <a <?php echo "href=/doora/adminpanel/Controller/admin/viewadmin_controller.php?id=".$data[0]; ?> title="View all detail">
                                          <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </td>
                                 </tr>
                           <?php
                            } ?>
                  </table>
        			</div>
        		</div>
        	</div>	
       </div>
    </section>
</div>
 <?php include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/footer.php");?>  