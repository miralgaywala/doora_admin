
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
                    subscription Package has been alredy exists
                 </div>   
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <br>
              <!-- box-header -->
              <div class="box-body">
                <form class="form-horizontal" name="addsubscription" id="addsubscription_form" role="form" action="" method="post">
                 

                           <div class="form-group notranslate">
                                <label for="price" class="col-sm-3 control-label">Type<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <input name="stype" type="text" id="stype" class="form-control"/>
                                    <span id="stype_error" class="show_required"></span><br>
                                </div>
                            </div> 
                            <div class="form-group notranslate">
                                <label for="price" class="col-sm-3 control-label">Price<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <input name="sprice" type="text" id="sprice" class="form-control"/>
                                    <span id="sprice_error" class="show_required"></span><br>
                                </div>
                            </div>  
                            <div class="form-group notranslate">
                                <label for="per_deal_redeem_price" class="col-sm-3 control-label">Short Description<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <input name="sdesc" type="text" id="sdesc" class="form-control"/>
                                    <span id="sdesc_error" class="show_required"></span><br>
                                </div>
                            </div>    
                           <!--  <div class="form-group notranslate">
                                <label for="free_days" class="col-sm-3 control-label">Free days<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <input name="free_days" type="text" id="free_days" class="form-control"/>
                                    <span id="free_days_error" class="show_required"></span><br>
                                </div>
                            </div>      -->            
                           
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
                                     var stype = document.getElementById("stype").value;
                                     var sprice = document.getElementById("sprice").value;
                                     var sdesc = document.getElementById("sdesc").value;
                                    // var per_deal_redeem_price = document.getElementById("per_deal_redeem_price").value;
                                    // var free_days = document.getElementById("free_days").value;
                                    var count=0;
                                    if (stype.trim() == "") {
                                        document.getElementById('stype').innerHTML="Please Enter Type";
                                        count++;
                                      }
                                      else
                                      {
                                        document.getElementById('stype').innerHTML="";
                                      }
                                      if (sprice.trim() == "") {
                                        document.getElementById('sprice').innerHTML="Please Enter price";
                                        count++;
                                      }
                                      else
                                      {
                                        document.getElementById('sprice').innerHTML="";
                                      }
                                      if (sdesc.trim() == "") {
                                        document.getElementById('sdesc').innerHTML="Please Enter short description";
                                        count++;
                                      }
                                      else
                                      {
                                        document.getElementById('sdesc').innerHTML="";
                                      }
                                      // if (free_days.trim() == "") {
                                      //   document.getElementById('free_days_error').innerHTML="Please Enter Free Days";
                                      //   count++;
                                      // }
                                      // else
                                      // {
                                      //   document.getElementById('free_days_error').innerHTML="";
                                      // }
                                    
                                  if(count>0)
                                   {
                                    return false;
                                   }
                                   else
                                   {

                                      var count_id = "add";
                                      $.ajax({
                                           url:"../../Controller/subscription_package/subscription_controller.php",
                                           method:"POST",
                                           data : {count_id:count_id,price:sprice,type:stype, desc:sdesc},
                                           success:function(data)
                                           {
                                            console.log(data);
                                            if(data == "#add")
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

 