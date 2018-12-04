<?php include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/header.php");
 include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/sidemenu.php");
 ?>
<section class="content">
   
    	<div class="row">
    		<div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Customer List</h2></div>
    		<div class="col-md-2">
                <br/>   
    		</div>
    	</div> 
        <?php 
            if($msg==1)
            {
               $msg='<div class="alert alert-info alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Deactivate Has been successfully
                </div>';
                echo $msg;
          }
          else if($msg==2)
          {
                $msg='<div class="alert alert-info alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Activate Has been successfully
                </div>';
                echo $msg;           
          }
         	else if($msg==3)
          {
                $msg='<div class="alert alert-info alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Customer Has been deleted successfully
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
			                  <th style="text-align:center;" width="5%">User id</th>
			                  <th style="text-align:center;">Customer Name</th>
                              <th style="text-align:center;">Photo</th>
                              <th style="text-align:center;">Email Id</th>
                              <th style="text-align:center;">Contact No</th>
			                  <th style="text-align:center;" width="15%">Action</th>
			                </tr>
							 </thead>
                <?php
                $i=0;
                foreach ($display_customer as $key => $data) 
                {      
                if($data[5] == NULL)
                 {
                  $data[5]= "default.png";
                 }
                else if(file_exists($_SERVER['DOCUMENT_ROOT']."/doora/images/profile/".$data[5])) {
                  $data[5] = $data[5];
                 }
                 else
                 {
                  $data[5]= "default.png";
                 }                  
                  ?> <tr>
                                <td style="text-align:center;"><?php echo $i=$i+1;?></td>
                                <td style="text-align:center;"><?php echo $data[0]; ?></td>
                                <td style="text-align:center;"><?php echo $data[2]; ?></td>
                                <td style="text-align:center;"><img <?php echo "src=/doora/images/profile/".$data[5];?> id="profilePicture"/></td>
                                <td style="text-align:center;"><?php echo $data[6];?></td>
                                <td style="text-align:center;"><?php echo $data[12];?></td> 
                                <td style="text-align:center;">
                          
                                    <div>
                                    	<a <?php echo "href=/doora/adminpanel/Controller/customer/viewcustomer_controller.php?id=".$data[0];?> title="View all detail"><i class="fa fa-eye"></i></a>
                                  
                                    	  
                                        <a onclick="javascript: return confirm('Do you really want to delete this Business?');" <?php echo "href=/doora/adminpanel/Controller/customer/deletecustomer_controller.php?id=".$data[0];?>  title="Delete" >
                                        <i class="fa fa-trash-o fa-fw"></i>
                                        </a>
                                        <br/>
                                    	<a <?php $value=$data[30]; if($value == 1 ){ ?>
                                    		onclick="javascript: return confirm('Do you really want to Deactivate This Customer?');"
                                    	<?php } else{ ?>
                                    		onclick="javascript: return confirm('Do you really want to Activate This Customer?');"
                                    	<?php }?>
                                    	<?php echo "href=/doora/adminpanel/Controller/Customer/isactive_controller.php?id=".$data[0]."&value=".$data[30];?>><?php $value=$data[30]; if($value == 1 ){
                                    		echo "Activate";
                                    	}
                                    	else
                                    	{
                                    		echo "Deactivate"; 
                                    	} ?></a>
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