<?php include "../../View/header/header.php";
 include "../../View/header/sidemenu.php";

 ?>
<section class="content">   
    	<div class="row">
    		<div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Admin List</h2></div>
    		<div class="col-md-2">
                <br/>   
                <button type="button" style="float: right;" class="btn btn-primary" onclick="window.location.href='../../View/admin/addadmin.php';">+ Add Admin</button>
    		</div>
    	</div> 
        <?php 
            if($msg==1)
            {
               $msg='<div class="alert alert-info alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Admin Has been Added successfully
                </div>';
                echo $msg;
          }
          else if($msg==2)
          {
                $msg='<div class="alert alert-info alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Admin Has been Updated successfully
                </div>';
                echo $msg;           
          }
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
                  if($data['profile_image'] == NULL)
                 {
                  $data['profile_image']= "default.png";
                 }
                else if(file_exists("../../../images/profile/".$data['profile_image'])) {
                  $data['profile_image'] = $data['profile_image'];
                 }
                 else
                 {
                  $data['profile_image']= "default.png";
                 }            
                  ?> <tr>
                                <td style="text-align:center;"><?php echo $i=$i+1;?></td>
                                <td style="text-align:center;"><?php echo $data['admin_id']; ?></td>
                                <td style="text-align:center;"><?php echo $data['role_id']; ?></td>
                                <td style="text-align:center;"><?php echo $data['username'];?></td>
                                <td style="text-align:center;"><?php echo $data['admin_name'];?></td> 
                                <td style="text-align:center;"><?php echo $data['phone_no'];?></td>
                                <td style="text-align:center;"><img <?php echo "src=../../../images/profile/".$data['profile_image'];?> id="profilePicture"/></td>
                                <td style="text-align:center;"><?php echo $data['email_address'];?></td> 
                                <td style="text-align:center;">
                                  <div >
                                        <a <?php echo "href=../../Controller/admin/editadmin_controller.php?id=".$data['admin_id']; ?> title="Edit" >
                                          <i class="fa fa-pencil-square-o fa-fw"></i>
                                        </a>
                                        <a onclick="javascript: return confirm('Do you really want to delete this Admin?');" <?php echo "href=../../Controller/admin/deleteadmin_controller.php?id=".$data['admin_id'];?>  title="Delete" >
                                        <i class="fa fa-trash-o fa-fw"></i>
                                        </a>
                                        <a <?php echo "href=../../Controller/admin/viewadmin_controller.php?id=".$data['admin_id']; ?> title="View all detail">
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
 <?php include "../../View/header/footer.php";?>  