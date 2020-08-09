<?php 
// include "../../View/header/header.php";
// include "../../View/header/sidemenu.php";
 ?>
 <script type="text/javascript">
     function backpayment()
      {
               $.ajax({
                       url:"../../Controller/view_payment/displaypayment_controller.php",
                       method:"POST",
                       success:function(data)
                       {
                            $('.content-wrapper').html(data);
                            
                       }
                    })
      }
 </script>
<section class="content">
   <?php foreach ($view_invoice_detail as $data)
                                {
                                    ?>
    	<div class="row">
    		<div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Business Invoice detail</h2></div>
    		<div class="col-md-2">
                <br/>   
                <button style="float: right;" onclick="backpayment()" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>
    		</div>
    	</div> 
        <div class="row">
        	<div class="col-xs-12">
        	
        		<div class="box">
        				<div class="box-body">
                            <?php
                                    $price_per_redeem=$data['price_per_redeem'];
                                    $invoice_month=$data['month'];
                                    $invoice_month=date('F', mktime(0, 0, 0, $invoice_month, 1, 2000));
                                    $start_date= $data['month_start_date'];
                                    $start_date=date('jS M Y', strtotime($start_date));    
                                    $end_date = $data['month_end_date'];
                                    $end_date=date('jS M Y', strtotime($end_date));
                            ?>
        				<table style="width: 50%;">
                            <tr>
                                <td><b>Business Name:</b></td>
                                <td><?php echo $data['business_name'];?></td>
                            </tr>
                            <tr>
                                <td><b>Month:</b></td>
                                <td><?php echo $invoice_month; ?></td>
                            </tr>
                            <tr>
                                <td><b>Billing Date:</b></td>
                                <td><?php echo $start_date." <b>  to  </b> ".$end_date; ?></td>
                            </tr>
                            <tr>
                                <td><b>Card details:</b></td>
                                <td>************<?php echo $data['last_four_digit'];?></td>
                            </tr>
                            <tr>
                                <td><b>Total Amount:</b></td>
                                <td><?php echo "$ ".$data['total_amount'];?></td>
                            </tr>
                            <?php if($data['bill_pending'] == 0)
                                {
                                  $status = "Paid";
                                   $style="style=\"\"";
                                }
                                else
                                {
                                  $status = "Due";
                                   $style="style=\"color:red;\"";
                                } ?>
                             <tr>
                                <td><b>status:</b></td>
                                <td <?php echo $style; ?>><?php echo $status;?></td>
                            </tr>
                        </table>
                    <?php  }?>
        			</div>
        		</div>
                <?php 
                    foreach ($view_deal_invoice_detail as $value) {
                       
                                    $start_date= $value['deal_start_time'];
                                    $start_date=date('jS M Y', strtotime($start_date));    
                                    $end_date = $value['deal_end_time'];
                                    $end_date=date('jS M Y', strtotime($end_date));
                ?>
                <div class="box">
                    <div class="box-body">
                        <table style="width: 100%;" class="table table-striped">
                            <thead>
                            <tr>
                                <th>Deals</th>
                                <th></th>
                                <th>Total Amount</th>
                            </tr>
                            </thead>
                            <tr>
                                <td>Deal:</td>
                                <td><?php echo $value['deal_title']; ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Validity:</td>
                                <td><?php echo $start_date." <b>  to  </b> ".$end_date; ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Total Quantity:</td>
                                <td><?php echo $value['overall_qty']; ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <?php $redeem_amount=$value['offline_redeem'] * $price_per_redeem; ?>
                                <td>In store redeem:</td>
                                <td><?php echo $value['offline_redeem'];echo " Qty * $ "; echo $price_per_redeem; ?></td>
                                <td><?php echo " $ ";echo sprintf("%.2f", $redeem_amount);?></td>
                            </tr>
                            <tr>
                                <td>In Store Purchase:</td>
                                <td><?php echo $value['offline_purchase']; ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <?php $redeem_online_amount=$value['online_purchase'] * $price_per_redeem; ?>
                                <td>Online redeem:</td>
                                <td><?php echo $value['online_purchase'];echo " Qty * $ "; echo $price_per_redeem; ?></td>
                                <td><?php echo " $ ";echo sprintf("%.2f", $redeem_online_amount);?></td>
                            </tr>
                            <tr>
                                <td>Online Purchase</td>
                                <td><?php echo $value['online_purchase']; ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Total Redeem</td>
                                <td><?php echo $value['offline_redeem'] + $value['online_purchase']; ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Total Purchase</td>
                                <td><?php echo $value['offline_purchase'] + $value['online_purchase']; ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <?php $total_amount=$redeem_online_amount + $redeem_amount; ?>
                                <td>Total Bill</td>
                                <td></td>
                                <td><?php echo " $ ";echo sprintf("%.2f", $total_amount);  ?></td>
                            </tr>
                         </table> 
                    </div>
                </div>
                <?php 
                    }
                ?>
        	</div>	
       </div>
    </section>
</div>
  <?php //include "../../View/header/footer.php";?>  