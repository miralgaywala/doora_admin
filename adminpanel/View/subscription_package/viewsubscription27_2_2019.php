 <script type="text/javascript">
           function backsubscription()
            {
         
            $.ajax({
                 url:"../../Controller/subscription_package/displaysubscription_controller.php",
                 method:"POST",
                 success:function(data)
                 {
                       $('.content-wrapper').html(data);
                      
                 }
            })
      }
    </script>
 
<!--Main Content -->
    <section class="content">
      <div class="row">
        <div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>View Subscription Plan</h2></div>
        <div class="col-md-2">
                <br/>   
               <!-- <a href="http://localhost/sprookr/adminpanel/Controller/category/displaycategorycontroller.php" class="btn btn-default"><b><- Back</b></a>-->
               <button style="float: right;" onclick="backsubscription()" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>
           <!-- <a href="/sprookr/adminpanel/View/category/addcategory.php" class="btn btn-primary">+ Add Category</a>-->
        </div>
      </div> 
        <div class="row">
        	<div class="col-xs-12">
        		<div class="box">            
        			<div class="box-body">
        			 <table style="font-size: 15px;" style="width: 100%;" class="table table-striped">
                  <?php
                   foreach ($view_subscription as $key => $data) 
                  {
               ?>
                  <tr>
                 <td style="width: 20%">Subscription plan Id</td>
                  <td><?php echo $data['subscription_plan_id'];?></td>
                  </tr>
                  <tr>
                  <td style="width: 20%">Price</td>
                  <td><?php echo $data['price'];?></td>
                  </tr>
                  <tr>
                  <td style="width: 20%">Per Deal Redeem Price</td>
                  <td><?php echo $data['per_deal_redeem_price'];?></td>
                  </tr>
                  <tr>
                 <td style="width: 20%">Free Days</td>
                  <td><?php echo $data['free_days'];?></td>
                  </tr>
                  <!-- <tr>
                  <td style="width: 20%">Is Deleted</td>
                  <td><?php if($data['is_deleted'] == 0)
                  {
                    echo "No";
                  }
                  else
                    {
                      echo "Yes";
                    }?></td>
                  </tr> -->
                                    <tr>
                   <td style="width: 20%">Created Date</td>
                  <td><?php 
                  $newDate = date("d-m-Y H:i:s", strtotime($data['created_at']));
                          echo $newDate;?></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Updated Date</td>
                  <td><?php $newDate = date("d-m-Y H:i:s", strtotime($data['updated_at']));
                          echo $newDate;?></td>
                  </tr>
                <?php } ?>
                </table>
        			</div>
        		</div>
        	</div>	
          <?php
           ?>
    </section>
</div>


 
     
                       
 