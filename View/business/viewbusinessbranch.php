<?php //include("View/header.php");
// include "../../View/header/header.php";
// include "../../View/header/sidemenu.php";
 ?>
 <script type="text/javascript">
     $(document).ready(function() {
   $('#example1').DataTable( {
    });
} );
     function backbusiness()
      {
              
            $.ajax({
                 url:"../../Controller/business/displaybusinesslist_controller.php",
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      
                 }
              })
      }
     function viewbusinessbranchdetail(id)
      {
        $.ajax({
                 url:"../../Controller/business/viewbranchdetail_controller.php?id="+id,
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      
                 }
              })
      }
 </script>
<section class="content">
   
    	<div class="row">
    		<div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Business Franchise List</h2></div>
    		<div class="col-md-2">
                <br/>   
                <button style="float: right;" onclick="backbusiness()" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>
    		</div>
    	</div> 
        <div class="row">
        	<div class="col-xs-12">
        	
        		<div class="box">
        				<div class="box-body">
        				<table id="example1" class="table table-bordered table-hover">
			                <thead>
			                <tr>
			                  <th style="text-align:center;" width="5%">#</th>
			                  <th style="text-align:center;" width="5%">Franchise id</th>
			                  <th style="text-align:center;">Franchise Address</th>
			                  <th style="text-align:center;" width="10%">Action</th>
			                </tr>
							 </thead>
                <?php
                $i=0;
                foreach ($view_businessbranch as $key => $data) 
                {                    
                  ?> <tr>
                                <td style="text-align:center;"><?php echo $i=$i+1;?></td>
                                <td style="text-align:center;"><?php echo $data['franchise_id']; ?></td>
                                <td style="text-align:center;"><?php echo $data['franchise_address']; ?></td>
                                <td style="text-align:center;">
                          
                                    <div>
                                        </a>
                                        <a onclick="viewbusinessbranchdetail(<?php echo $data['franchise_id']; ?>)" <?php //echo "href=../../Controller/business/viewbranchdetail_controller.php?id=".$data['franchise_id'];?> title="View all detail" style="cursor: pointer;">
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
 <?php //include "../../View/header/footer.php";?>  