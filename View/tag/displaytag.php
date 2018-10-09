<?php include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/header.php");
 include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/sidemenu.php");
 ?>
<section class="content">
   
    	<div class="row">
    		<div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Tag List</h2></div>
    		<div class="col-md-2">
                <br/>   
    		<button type="button" style="float: right;" class="btn btn-primary" onclick="window.location.href='/doora/adminpanel/View/tag/addtag.php';">+ Add Tag</button>
    		</div>
    	</div> 
        <?php 
            if($msg==0)
            {
               $msg='<div class="alert alert-info alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Tag Has been Added successfully
                </div>';
                echo $msg;
          }
          else if($msg==2)
          {
                $msg='<div class="alert alert-info alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Tag Has been updated successfully
                </div>';
                echo $msg;           
          }
          else if($msg==3)
          {
                $msg='<div class="alert alert-info alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Tag Has been deleted successfully
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
			                  <th style="text-align:center;" width="5%">Tag_id</th>
			                  <th style="text-align:center;">Tag</th>
			                  <th style="text-align:center;" width="10%">Action</th>
			                </tr>
							 </thead>
                <?php
                $i=0;
                foreach ($display_tag as $key => $data) 
                {                    
                  ?> <tr>
                                <td style="text-align:center;"><?php echo $i=$i+1;?></td>
                                <td style="text-align:center;"><?php echo $data[0]; ?></td>
                                <td style="text-align:center;"><?php echo $data[1]; ?></td>
                                <td style="text-align:center;">
                          
                                    <div >
                                        <a <?php echo "href=/doora/adminpanel/Controller/tag/edittag_controller.php?id=".$data[0]; ?> title="Edit" >
                                          <i class="fa fa-pencil-square-o fa-fw"></i>
                                        </a>
                                        <a onclick="javascript: return confirm('Do you really want to delete this Tag?');" <?php echo "href=/doora/adminpanel/Controller/tag/deletetag_controller.php?id=".$data[0];?>  title="Delete" >
                                        <i class="fa fa-trash-o fa-fw"></i>
                                        </a>
                                        <a <?php echo "href=/doora/adminpanel/Controller/tag/viewtag_controller.php?id=".$data[0];?> title="View all detail">
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
 <?php include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/footer.php");?>  