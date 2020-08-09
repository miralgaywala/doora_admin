
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
      function listsubscription(id)
      {
            hash_id = id;
            $.ajax({
                  url:"../../Controller/subscription_package/displaysubscription_controller.php",
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      $(hash_id).show();
                 }
              })
      }
      function existssubscription(data)
      {
         hash_id = data;
            $.ajax({
                  url:"../../View/subscription_package/addsubscription.php",
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      $(hash_id).show();
                      
                 }
              })
      }
        </script>
<!--Main Content -->
    <section class="content">
      <div class="row">
       <div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Add/Edit Subscription</h2></div>
        <div class="col-md-2">
                <br/>   
               <!-- <a href="http://localhost/sprookr/adminpanel/Controller/category/displaycategorycontroller.php" class="btn btn-default"><b><- Back</b></a>-->
               <button style="float: right;" onclick="backsubscription()" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>
           <!-- <a href="/sprookr/adminpanel/View/category/addcategory.php" class="btn btn-primary">+ Add Category</a>-->
        </div>
      </div>   
      <div class="alert alert-info alert-dismissible" id="exists" style="display: none;">
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    Subscription Package Has been alredy exists
                 </div>   
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <br>
              <!-- box-header -->
              <div class="box-body">
                <form class="form-horizontal" name="addsubscription" id="addsubscription_form" role="form" action="" method="post">
                 
                   <?php foreach ($edit_subscription as $key => $data) {
                    ?>
                     <input type="hidden" name="subscription_plan_id" value="<?php echo $data['subscription_plan_id']; ?>" id="subscription_plan_id">
                           <div class="form-group notranslate">
                                <label for="price" class="col-sm-3 control-label">Price<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <input name="price" type="text" id="price" class="form-control" value="<?php echo $data['price']; ?>"/>
                                    <span id="price_error" class="show_required"></span><br>
                                </div>
                            </div>  
                            <div class="form-group notranslate">
                                <label for="per_deal_redeem_price" class="col-sm-3 control-label">Per deal redeem price<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <input name="per_deal_redeem_price" type="text" id="per_deal_redeem_price" class="form-control" value="<?php echo $data['per_deal_redeem_price']; ?>"/>
                                    <span id="per_deal_redeem_price_error" class="show_required"></span><br>
                                </div>
                            </div>    
                            <div class="form-group notranslate">
                                <label for="free_days" class="col-sm-3 control-label">Free days<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <input name="free_days" type="text" id="free_days" class="form-control" value="<?php echo $data['free_days']; ?>"/>
                                    <span id="free_days_error" class="show_required"></span><br>
                                </div>
                            </div>                 
                           <?php }?>  
                             </div>                               
                             <div class="box-footer  notranslate">
                                    <input type="submit" name="subscription_submit" style="margin-left: 5px;" value="Submit" class="btn btn-primary pull-right" id="tag_submit" onclick="return validateForm();"/>
                                    <button class="btn btn-default pull-right" onclick="backsubscription()">Cancel</button>
                            </div>  
                           </div>
                         </form>
              </div>
            </div>              
    </section>
</div>

  <?php //include "../../View/header/footer.php";?>
 <script type="text/javascript">
                  
                      function validateForm() {
                                     var price = document.getElementById("price").value;
                                    var per_deal_redeem_price = document.getElementById("per_deal_redeem_price").value;
                                    var free_days = document.getElementById("free_days").value;
                                    var subscription_plan_id = document.getElementById("subscription_plan_id").value;
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
                                      
                                      var count_id = "edit";
                                      $.ajax({
                                           url:"../../Controller/subscription_package/subscription_controller.php",
                                           method:"POST",
                                           data : {count_id:count_id,price:price,per_deal_redeem_price:per_deal_redeem_price,free_days:free_days,subscription_plan_id:subscription_plan_id},
                                           success:function(data)
                                           {
                                     
                                            if(data == "#edit")
                                            {
                                                listsubscription(data);
                                              }
                                              else
                                              {
                                                existssubscription(data);
                                              }
                                           }
                                        })
                                   }
                                  }
</script> 

 