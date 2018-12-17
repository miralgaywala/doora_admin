<?php include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/header.php");
 include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/sidemenu.php");
 ?>
<section class="content">
   
    	<div class="row">
    		<div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Business Invoice List</h2></div>
    		<div class="col-md-2">
                <br/>   
                <button style="float: right;" onclick="window.location.href='/doora/adminpanel/Controller/business/displaybusinesslist_controller.php'" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>
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
			                  <th style="text-align:center;" width="5%">Invoice id</th>
			                  <th style="text-align:center;">Invoice</th>
                              <th style="text-align:center;">Invoice start date</th>
                              <th style="text-align:center;">Invoice end date</th>
			                  <th style="text-align:center;" width="10%">Action</th>
			                </tr>
							 </thead>
                <?php
                $i=0;
                foreach ($view_invoices as $key => $data) 
                {         
                $year=$data['year'];
                $invoice_year=date('Y', strtotime($year));
                $invoice_month=$data['month'];
                $invoice_month=date('M', mktime(0, 0, 0, $invoice_month, 1, 2000));
                $start_date= $data['month_start_date'];
                $start_date=date('jS M, Y', strtotime($start_date));    
                $end_date = $data['month_end_date'];
                $end_date=date('jS M, y', strtotime($end_date));
                  ?> <tr>
                                <td style="text-align:center;"><?php echo $i=$i+1;?></td>
                                <td style="text-align:center;"><?php echo $data['business_invoice_id']; ?></td>
                                <td style="text-align:center;"><?php echo $invoice_month.",".$invoice_year; ?></td>
                                <td style="text-align:center;"><?php echo $start_date; ?></td>
                                <td style="text-align:center;"><?php echo $end_date; ?></td>
                                <td style="text-align:center;">
                                    <div>
                                        </a>
                                        <a <?php echo "href=/doora/adminpanel/Controller/business/viewinvoicedetail_controller.php?id=".$data['business_invoice_id'];?> title="View all detail">
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