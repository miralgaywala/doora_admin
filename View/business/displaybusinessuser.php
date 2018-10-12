<?php include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/header.php");
 include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/sidemenu.php");
 ?>
<section class="content">
   
    	<div class="row">
    		<div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Business User List</h2></div>
    		<div class="col-md-2">
                <br/>   
    		<!--<button type="button" style="float: right;" class="btn btn-primary" onclick="window.location.href='/doora/adminpanel/View/tag/addtag.php';">+ Add Tag</button>-->
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
                Business Has been deleted successfully
                </div>';
                echo $msg;           
          }
           ?>
            <script>
        $(document).ready(function(){
            $("#user").select2(); 
        });

    </script>
        <div class="row">
        	<div class="col-xs-12">
        	
        		<div class="box">
        				<div class="box-body">
        					<form class="form-horizontal" name="displayuser" id="displayuser" role="form" action="" method="post" enctype="multipart/form-data">
                             <div class="form-group">
                                <label for="user" class="col-sm-3 control-label">Business User</label>
                                <div class="col-sm-7" style="padding-top: 6px">
                                    <select id="user" name="user" class="form-control" aria-invalid="false" >
                                    <option value="0">All Business User</option>
                                    <option value="0">Activate</option>
                                     <option value="0">Deactivate</option>
                                     <option value="0">Deleted</option>
                                    </select>
                                </div> 
                            </div>
                          </form>
                          <hr>
        				<table id="example1" class="table table-bordered table-hover">
			                <thead>
			                <tr>
			                  <th style="text-align:center;" width="5%">#</th>
			                  <th style="text-align:center;" width="5%">User id</th>
			                  <th style="text-align:center;">Buisness Name</th>
                        <th style="text-align:center;">Photo</th>
                        <th style="text-align:center;">Email Id</th>
                        <th style="text-align:center;">Contact No</th>
                        <th style="text-align:center;" width="5%">Stripe Customer Id</th>
                        <th style="text-align:center;" width="5%">Super Market</th>
			                  <th style="text-align:center;" width="15%">Action</th>
			                </tr>
							 </thead>
                <?php
                $i=0;
                foreach ($display_businessuser as $key => $data) 
                {                    
                  ?> <tr>
                                <td style="text-align:center;"><?php echo $i=$i+1;?></td>
                                <td style="text-align:center;"><?php echo $data[0]; ?></td>
                                <td style="text-align:center;"><?php echo $data[1]; ?></td>
                                <td style="text-align:center;"><img <?php echo "src=/doora/images/profile/".$data[5];?> id="profilePicture"/></td>
                                <td style="text-align:center;"><?php echo $data[6];?></td>
                                <td style="text-align:center;"><?php echo $data[12];?></td>
                                <td style="text-align:center;"><?php echo $data[13];?></td>
                                <td style="text-align:center;"><?php echo $data[22];?></td>
                                <td style="text-align:center;">
                          
                                    <div>
                                    	<a <?php echo "href=/doora/adminpanel/Controller/business/viewbusiness_controller.php?id=".$data[0];?> title="View all detail"><i class="fa fa-eye"></i></a>
                                  
                                    	  
                                        <a onclick="javascript: return confirm('Do you really want to delete this Business?');" <?php echo "href=/doora/adminpanel/Controller/business/deletebusiness_controller.php?id=".$data[0];?>  title="Delete" >
                                        <i class="fa fa-trash-o fa-fw"></i>
                                        </a>
                                        <br/>
                                    	<a <?php $value=$data[24]; if($value == 1 ){ ?>
                                    		onclick="javascript: return confirm('Do you really want to Deactivate This Business?');"
                                    	<?php } else{ ?>
                                    		onclick="javascript: return confirm('Do you really want to Activate This Business?');"
                                    	<?php }?>
                                    	<?php echo "href=/doora/adminpanel/Controller/business/isactive_controller.php?id=".$data[0]."&value=".$data[24];?>><?php $value=$data[24]; if($value == 1 ){
                                    		echo "Activate";
                                    	}
                                    	else
                                    	{
                                    		echo "Deactivate"; 
                                    	} ?></a>
                                    	<br/>
                                    	<a <?php echo "href=/doora/adminpanel/Controller/business/viewbusinessbranch_controller.php?id=".$data[0];?> title="View all detail" style="margin-right: 3px;">
                                        	View Brach
                                        </a>
                                         <br/>
                                        <a href="#" <?php //echo "href=/doora/adminpanel/Controller/business/viewbusiness_controller.php?id=".$data[0];?> title="View all detail">Verification Detail</a>
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
    </section>
</div>
 <?php include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/footer.php");?>  