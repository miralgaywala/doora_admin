<?php include "../../View/header/header.php";
 include "../../View/header/sidemenu.php";

 ?>
<section class="content">
   
    	<div class="row">
    		<div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Subscription List</h2></div>
    		<div class="col-md-2">
                <br/>   
    		<button type="button" style="float: right;" class="btn btn-primary" onclick="window.location.href='../../View/subscription_package/addsubscription.php';">+ Add Subscription plan</button>
    		</div>
    	</div> 
        <?php 
            if($msg==0)
            {
               $msg='<div class="alert alert-info alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Subscription plan has been added successfully
                </div>';
                echo $msg;
          }
          else if($msg==2)
          {
                $msg='<div class="alert alert-info alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Subscription has been updated successfully
                </div>';
                echo $msg;           
          }
          else if($msg==3)
          {
                $msg='<div class="alert alert-info alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Subscription plan has been deleted successfully
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
			                  <th style="text-align:center;" width="15%">subscription plan id</th>
			                  <th style="text-align:center;">price</th>
                        <th style="text-align:center;">per deal redeem price</th>
                        <th style="text-align:center;">free days</th>
			                  <th style="text-align:center;" width="10%">Action</th>
			                </tr>
							 </thead>
                <?php
                $i=0;
                foreach ($display_subscription as $key => $data) 
                {                    
                  ?> <tr>
                                <td style="text-align:center;"><?php echo $i=$i+1;?></td>
                                <td style="text-align:center;"><?php echo $data['subscription_plan_id']; ?></td>
                                <td style="text-align:center;"><?php echo $data['price']; ?></td>
                                 <td style="text-align:center;"><?php echo $data['per_deal_redeem_price']; ?></td>
                                  <td style="text-align:center;"><?php echo $data['free_days']; ?></td>
                                <td style="text-align:center;">
                          
                                    <div >
                                        <a <?php echo "href=../../Controller/subscription_package/editsubscription_controller.php?id=".$data['subscription_plan_id']; ?> title="Edit" >
                                          <i class="fa fa-pencil-square-o fa-fw"></i>
                                        </a>
                                        <a onclick="javascript: return confirm('Do you really want to delete this subscription plan?');" <?php echo "href=../../Controller/subscription_package/deletesubscription_controller.php?id=".$data['subscription_plan_id'];?>  title="Delete" >
                                        <i class="fa fa-trash-o fa-fw"></i>
                                        </a>
                                        <a <?php echo "href=../../Controller/subscription_package/viewsubscription_controller.php?id=".$data['subscription_plan_id'];?> title="View all detail">
                                          <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </td>
                                 </tr>
                           <?php  } ?>
                  </table>
        			</div>
        		</div>
        	</div>	
       </div>
    </section>
</div>
 <?php include "../../View/header/footer.php";?>  