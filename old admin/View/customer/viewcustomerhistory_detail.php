<?php //include("View/header.php");
// include "../../View/header/header.php";
//  include "../../View/header/sidemenu.php";
 ?>
 <script type="text/javascript">
   function backcustomer()
      {
             
        $.ajax({
                 url:"../../Controller/customer/displaycustomerlist_controller.php",
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      
                 }
              })
      }
      function viewcustomerearnedhistory(id)
      {
        $.ajax({
                 url:"../../Controller/customer/viewcustomerearnedhistory.php?id="+id,
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      
                 }
              })
      }
 </script>
 <?php
 $cu_e_po= 0;
       foreach ($customer_earn_points as $key => $data) 
      {
        $cu_e_po += $data['points'];
        $user_id = $data['customer_id'];
      }

  $cu_re_po= 0;
  $cu_re_amt = 0;
       foreach ($customer_reward_points as $key => $data) 
      {
        $cu_re_po += $data['points'];
        $cu_re_amt += $data['amt'];
      }
      $total_av_po = 0;
      $total_av_po = $cu_e_po-$cu_re_po;
       $cu_ear_cas= 0;
       foreach ($customer_earned_cashback as $key => $data) 
      {
        $cu_ear_cas += $data['amt'];
        
      }
      $to_av_cas = 0;
      $to_av_cas = $cu_re_amt-$cu_ear_cas;
               ?>
<!--Main Content -->
    <section class="content">
      <div class="row">
        <div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>View Customer Points history Detail</h2></div>
        <div class="col-md-2">
                <br/>   
               <!-- <a href="http://localhost/sprookr/adminpanel/Controller/category/displaycategorycontroller.php" class="btn btn-default"><b><- Back</b></a>-->
               <button style="float: right;" onclick="backcustomer()" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>
  
        </div>
      </div> 
        <div class="row">
        	<div class="col-xs-12">
        		<div class="box">            
        			<div class="box-body">
        				 <table style="font-size: 15px;" style="width: 100%;" class="table table-striped">
                  <tr>
                  <td style="width: 20%">Total earned points</td>
                  <td><?php echo $cu_e_po;?></td>
                  </tr>
                  <tr>
                  <td style="width: 20%">Total rewarded points</td>
                  <td><?php echo $cu_re_po;?></td>
                  </tr>
                  <tr>
                  <td style="width: 20%">Total available points</td>
                  <td><?php echo $total_av_po;?></td>
                  </tr>
                  <tr>
                  <td style="width: 20%">Total earned cashback</td>
                  <td><?php echo $cu_ear_cas;?></td>
                  </tr>
                  <tr>
                  <td style="width: 20%">Total available cashback</td>
                  <td><?php echo $to_av_cas;?></td>
                  </tr>
                  <?php if($cu_e_po == 0)
                  {

                  } 
                  else
                    {?>
                  <tr>
                  <td style="width: 20%">Check Customer earned points</td>
                  <td><a onclick="viewcustomerearnedhistory(<?php echo $user_id; ?>)" title="View all detail" style="cursor: pointer;color: #f66867;">Click here</a></td>
                  </tr>
                <?php } ?>
                </table>
        			</div>
        		</div>
        	</div>	
    </section>
</div>

