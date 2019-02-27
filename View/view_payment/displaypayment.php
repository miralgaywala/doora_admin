<?php //include "../../View/header/header.php";
//include "../../View/header/sidemenu.php";
 ?>
 <script>
  $(document).ready(function() {
   $('#example1').DataTable( {
    });
} );
     
$(document).ready(function(){
            $(".select2").select2(); 
        });
      function viewpaymentdetail(id)
      {
              
            $.ajax({
                 url:"../../Controller/view_payment/viewpaymentdetail.php?id="+id,
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                 }
              })
      }
      $(document).ready(function(){
      $('#year').change(function(){
          loadpaymentfilter()
      })
    })
      $(document).ready(function(){
      $('#month').change(function(){
          loadpaymentfilter()
      })
    })
      $(document).ready(function(){
      $('#business_invoice').change(function(){
          loadpaymentfilter()
      })
    })
      function loadpaymentfilter(){
       // console.log($('#year').val());
       //  console.log($('#month').val()); 
      
      var year = $('#year').val();
      var month = $('#month').val();
      var business_invoice = $('#business_invoice').val();
        $('#example1').dataTable().fnDestroy();
        $.ajax({
       url: '../../Controller/view_payment/loadpaymentfilter.php',
       data : {year : year,month : month,business_invoice:business_invoice},
       type: 'POST',
       success: function(data) {
               $("#result").empty();
               $("#result").append(data);
              $('#example1').dataTable({
                "destroy":true,
            });
           }

      });
        
}
</script>
<?php foreach ($month as $value) {
	$selected_month = $value['month'];
	$selected_year = $value['year'];
} ?>
<section class="content">
   
    	<div class="row">
    		<div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Business Payment List</h2></div>
    		<div class="col-md-2">
                <br/>   
    		</div>
    	</div> 
        <div class="row">
        	<div class="col-xs-12">
        	
        		<div class="box">
        				<div class="box-body">
                  <div class="row">
                     <form class="form-horizontal" name="displayyear" id="displayyear" role="form" action="" method="post" enctype="multipart/form-data">
                      <label for="year" class="col-sm-2 control-label">Business</label>
                                <div class="col-sm-2" style="padding-top: 3px">
                                    <select name="select" class="form-control select2" id="business_invoice">
                                      <option value=""><?php echo "All business"; ?></option>
                                    <?php 
                                      foreach ($business_name as $key => $data) { 
                                        ?>
                                          <option value="<?php echo $data['user_id']; ?>"><?php echo $data['business_name']; ?></option>
                                     <?php  }
                                    ?>
                                    </select>
                                </div> 
                                <label for="year" class="col-sm-1 control-label">Year</label>
                                <div class="col-sm-2" style="padding-top: 3px">
                                    <select name="select" class="form-control select2" id="year">
                                      <option value=""><?php echo "Select Year"; ?></option>
                                    <?php 
                                      foreach ($year as $key => $data) { 
                                        ?>
                                          <option value="<?php echo $data['year']; ?>" <?php if($data['year'] == $selected_year) { echo "selected=selected"; } ?>><?php echo $data['year']; ?></option>
                                     <?php  }
                                    ?>
                                    </select>
                                </div> 
                                <label for="month" class="col-sm-1 control-label">Month</label>
                                <div class="col-sm-2" style="padding-top: 3px">
                                    <select class="form-control select2" id="month">
                                      <option value=""><?php echo "Select Month"; ?></option>
                                      <?php for($i=1;$i<13;$i++){ ?>
                                      <option value="<?php echo $i; ?>" <?php if($i == $selected_month) { echo "selected=selected"; } ?>><?php echo date('F', mktime(0, 0, 0, $i, 10)); ?></option>
                                      <?php }?>
                                    </select>
                                </div> 
                            </div>
                          </form>
                  <br/>
        				<table id="example1" class="table table-bordered table-hover">
			                <thead>
			                <tr>
			                  <th style="text-align:center;" width="5%">#</th>
			                  <th style="text-align:center;" width="5%">Invoice id</th>
                        	  <th style="text-align:center;" width="5%">Business Name</th>
			                  <th style="text-align:center;">Invoice</th>
                        	  <th style="text-align:center;">Invoice start date</th>	  
                        	  <th style="text-align:center;">Invoice end date</th>
                        	  <th style="text-align:center;">Payment</th>
                        	  <th style="text-align:center;">Status</th>
			                  <th style="text-align:center;" width="10%">Action</th>
			                </tr>
							 </thead>
               <tbody id="result">
                <?php
                $i=0;
                foreach ($display_payment as $key => $data) 
                { 
                $invoice_year=$data['year'];
                $invoice_month=$data['month'];
                $invoice_month=date('M', mktime(0, 0, 0, $invoice_month, 1, 2000));
                $start_date= $data['month_start_date'];
                $start_date=date('jS M, Y', strtotime($start_date));    
                $end_date = $data['month_end_date'];
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
                                <td style="text-align:center;"><?php echo $data['business_invoice_id']; ?></td>
                                <td style="text-align:center;"><?php echo $data['business_name']; ?></td>
                                <td style="text-align:center;"><?php echo $invoice_month.",".$invoice_year; ?></td>
                                <td style="text-align:center;"><?php echo $start_date; ?></td>
                                <td style="text-align:center;"><?php echo $end_date; ?></td>
                                <td style="text-align:center;"><?php echo "$".$data['total_amount']; ?></td>
                                <td <?php echo $style; ?>><?php echo $status; ?></td>
                                <td style="text-align:center;">
                                    <div>
                                        </a>
                                        <a onclick="viewpaymentdetail(<?php echo $data['business_invoice_id']; ?>)" <?php //echo "href=../../Controller/business/viewinvoicedetail_controller.php?id=".$data['business_invoice_id'];?> title="View all detail" style="cursor: pointer;">
                                          <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </td>
                                 </tr>
                           <?php  } ?>
                           </tbody>
                    </table>
        			</div>
        		</div>
        	</div>	
       </div>
    </section>
</div>
 <?php //include "../../View/header/footer.php";?>  