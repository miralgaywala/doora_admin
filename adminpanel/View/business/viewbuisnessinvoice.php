<?php //include "../../View/header/header.php";
//include "../../View/header/sidemenu.php";
 ?>
 <script>
  $(document).ready(function() {
   $('#example1').DataTable( {
     "columnDefs": [ {
            "targets": [6],
            "orderable": false
            } ]
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
      function viewinvoicedetail(id)
      {
              
            $.ajax({
                 url:"../../Controller/business/viewinvoicedetail_controller.php?id="+id,
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
    		<div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Business Receipts List</h2></div>
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
			                  <!-- <th style="text-align:center;" width="8%">Receipts id</th> -->
			                  <th style="text-align:center;">Receipts</th>
                              <th style="text-align:center;">Receipts start date</th>
                              <th style="text-align:center;">Receipts end date</th>
                              <th style="text-align:center;">Payment</th>
                        <th style="text-align:center;">Status</th>
			                  <th style="text-align:center;" width="10%">Action</th>
			                </tr>
							 </thead>
                <?php
                $i=0;
                foreach ($view_invoices as $key => $data) 
                {         
                $invoice_year=$data['year'];
                $invoice_month=$data['month'];
                $invoice_month=date('M', mktime(0, 0, 0, $invoice_month, 1, 2000));
                $start_date= $data['month_start_date'];
                $start_date=date('jS M, Y', strtotime($start_date));    
                $end_date = $data['bill_paid_date'];
                $end_date=date('jS M, Y', strtotime($end_date));
                if($data['bill_pending'] == 0)
                {
                  $status = "Paid";
                   $style="style=\"text-align:center;\"";
                }
                else
                {
                  $status = "Due";
                   $style="style=\"color:red;text-align:center;\"";
                }
                  ?> <tr>
                                <td style="text-align:center;"><?php echo $i=$i+1;?></td>
                                <!-- <td style="text-align:center;"><?php echo $data['business_invoice_id']; ?></td> -->
                                <td style="text-align:center;"><?php echo $invoice_month.",".$invoice_year; ?></td>
                                <td style="text-align:center;"><?php echo $start_date; ?></td>
                                <td style="text-align:center;"><?php echo $end_date; ?></td>
                                <td style="text-align:center;"><?php echo "$ ".$data['total_amount']; ?></td>
                                <td <?php echo $style; ?>><?php echo $status; ?></td>
                                <td style="text-align:center;">
                                    <div>
                                        </a>
                                        <a onclick="viewinvoicedetail(<?php echo $data['business_invoice_id']; ?>)" <?php //echo "href=../../Controller/business/viewinvoicedetail_controller.php?id=".$data['business_invoice_id'];?> title="View all detail" style="cursor: pointer;">
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