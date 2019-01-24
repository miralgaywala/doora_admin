<?php 
include "../../View/header/header.php";
 include "../../View/header/sidemenu.php";
?> 

 <?php 
        include_once("../../Controller/subscription_package/subscription_controller.php");
        $controller=new subscription_controller();
        $controller->edit_subscription();       
        ?>

<!--Main Content -->

    <section class="content">
      <div class="row">
        <div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Add/Edit Subscription</h2></div>
        <div class="col-md-2">
                <br/>   
            
               <button style="float: right;" onclick="window.location.href='../../Controller/subscription_package/displaysubscription_controller.php'" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>
        </div>
      </div>   
        <div class="row">
        	<div class="col-xs-12">
        		<div class="box">
        			<br>
        			<!-- box-header -->
        			<div class="box-body">
        				<form class="form-horizontal" name="addsubscription" id="addsubscription_form" role="form" action="" method="post" onsubmit="return validateForm();"> 
                  <?php foreach ($edit_subscription as $key => $data) {
                    ?>
                    <input type="hidden" name="subscription_plan_id" value="<?php echo $data['subscription_plan_id']; ?>">
                            <div class="form-group notranslate">
                                <label for="price" class="col-sm-3 control-label">Price<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <input name="price" type="text" id="price" class="form-control" value="<?php echo $data['price']; ?>" />
                                    <span id="price_error" class="show_required"></span><br>
                                </div>
                            </div>  
                            <div class="form-group notranslate">
                                <label for="per_deal_redeem_price" class="col-sm-3 control-label">Per deal redeem price<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <input name="per_deal_redeem_price" type="text" id="per_deal_redeem_price" class="form-control" value="<?php echo $data['per_deal_redeem_price']; ?>" />
                                    <span id="per_deal_redeem_price_error" class="show_required"></span><br>
                                </div>
                            </div>    
                            <div class="form-group notranslate">
                                <label for="free_days" class="col-sm-3 control-label">Free days<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <input name="free_days" type="text" id="free_days" class="form-control" value="<?php echo $data['free_days']; ?>" />
                                    <span id="free_days_error" class="show_required"></span><br>
                                </div>
                            </div>                                          
                             <div class="box-footer  notranslate">
                                    <input type="submit" name="subscription_submit" style="margin-left: 5px;" class="btn btn-primary pull-right" value="Submit" id="subscription_submit"/>
                                    <input type="button" class="btn btn-default pull-right" onclick="document.getElementById('addsubscription_form').reset();window.location.href='../../Controller/subscription_package/displaysubscription_controller.php'" value="Cancel"></button>
                            </div>  
                           </div>
                         </form>
                       <?php } ?>
        			</div>
        		</div>
        	</div>	
       
    </section>
</div>

 <?php 
include "../../View/header/footer.php";?> 
 <script type="text/javascript">
                      function validateForm() {
                                    var price = document.getElementById("price").value;
                                    var per_deal_redeem_price = document.getElementById("per_deal_redeem_price").value;
                                    var free_days = document.getElementById("free_days").value;
                                    var count=0;
                                    if (price.trim() == "") {
                                        document.getElementById('price_error').innerHTML="Please Enter Price";
                                        count++;
                                      }
                                      else
                                      {
                                      	document.getElementById('price_error').innerHTML="";
                                      }
                                   if (per_deal_redeem_price.trim() == "") {
                                        document.getElementById('per_deal_redeem_price_error').innerHTML="Please Enter Per Deal Redeem Price";
                                        count++;
                                      }
                                      else
                                      {
                                        document.getElementById('per_deal_redeem_price_error').innerHTML="";
                                      }
                                      if (free_days.trim() == "") {
                                        document.getElementById('free_days_error').innerHTML="Please Enter Free Days";
                                        count++;
                                      }
                                      else
                                      {
                                        document.getElementById('free_days_error').innerHTML="";
                                      }
                                   if(count>0)
                                   {
                                   	return false;
                                   }
                                   else
                                   {
                                   	return true;
                                   }
                                  }
 
</script>
 <?php 
                            if(isset($_POST['subscription_submit']) && !empty($_POST['subscription_submit'])){
                              $subscription_plan_id= $_POST['subscription_plan_id'];
                                  $price =$_POST['price'];
                                  $per_deal_redeem_price =$_POST['per_deal_redeem_price'];
                                  $free_days =$_POST['free_days'];
                              }
                            ?>       