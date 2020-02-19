 <script type="text/javascript">
  $(document).ready(function() {
   $('#example1').DataTable( {
    });
} );


  </script>

<section class="content">
   
    	<div class="row">
    		<div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Customer Points History List</h2></div>
    		<div class="col-md-2">
           <br/> 
          <button style="float: right;" onclick="viewcustomerhistory()" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>
                 
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
			                  <th style="text-align:center;" width="8%">Id</th>
			                  <th style="text-align:center;">Points</th>
                              <th style="text-align:center;">Code</th>
			                </tr>
							 </thead>
               <tbody>
               <?php 
                $i = 0;
               foreach ($customer_earn_points as $key => $data) {
              
                 ?>
                 <tr>
                                <td style="text-align:center;"><?php echo $i=$i+1;?></td>
                                <td style="text-align:center;"><?php echo $data['id']; ?></td>
                                 <td style="text-align:center;"><?php echo $data['points']; ?></td>
                                  <td style="text-align:center;"><?php echo $data['code']; ?></td>
                              </tr>
                            <?php } ?>
                  </table>
        			</div>
        		</div>
        	</div>	
       </div>
    </section>
</div>
<script type="text/javascript">
  function viewcustomerhistory()
      {
        var id = "<?php echo $data['customer_id']; ?>";
        $.ajax({
                 url:"../../Controller/customer/viewcustomerhistory_controller.php?id="+id,
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      
                 }
              })
      }
</script>
