
        <script type="text/javascript">
           function backsubscription()
            {
         
            $.ajax({
                 url:"../../Controller/subscription_benefits/displaysubscription_controller.php",
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
                  url:"../../Controller/subscription_benefits/displaysubscription_controller.php",
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
    <div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Add/Edit Benefit</h2></div>
    <div class="col-md-2">
      <br/>   
      <button style="float: right;" onclick="backsubscription()" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>
    </div>
  </div>   
  
  <div class="alert alert-info alert-dismissible" id="exists" style="display: none;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      subscription Benefit has been alredy exists
  </div>   
  
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <br>
        <!-- box-header -->
        <div class="box-body">
          <form class="form-horizontal" name="addsubscription" id="addsubscription_form" role="form" action="" method="post" enctype="multipart/form-data">
            <div class="form-group notranslate">
              <label for="user" style="margin-top: 5px;" class="col-sm-3 control-label"></label>
              <div class="col-sm-8" style="padding-top: 6px">
                <span id="error" class="show_required"></span><br>  
              </div>
            </div>
          
            <div class="form-group notranslate">
              <label for="subscription" style="margin-top: 5px;" class="col-sm-3 control-label">Subscription Plan</label>
              <div class="col-sm-8" style="padding-top: 6px">
                <select id="subscription" name="subscription" class="form-control" aria-invalid="false">
                  <?php
                    $i=0;
                    foreach ($subscription as $key => $data) 
                    {                    
                  ?>
                    <option value=<?php echo $data['subscription_plan_id'];?>><?php echo $data['subscription_name'];?></option>
                  <?php  } ?>
                </select>
              </div> 
            </div>  
              
            <div class="form-group notranslate">
              <label for="title" class="col-sm-3 control-label">Title<span class="show_required">*</span></label>
              <div class="col-sm-8" style="padding-top: 6px">
                <input name="title" type="text" id="title" class="form-control"/>
              </div>
            </div>  

            <div class="form-group notranslate">
              <label for="pet_friedly" class="col-sm-3 control-label">Is Main?</label>
              <div class="col-sm-8" style="padding-top: 6px">
                <input name="is_main" type="checkbox" id="is_main" /><br>
              </div>
            </div>
          </div> 

          <div class="box-footer  notranslate">
            <input type="submit" name="tag_submit" style="margin-left: 5px;" value="Submit" class="btn btn-primary pull-right" id="tag_submit" onclick="return validateForm();"/>
            <button class="btn btn-default pull-right" onclick="backsubscription()">Cancel</button>
          </div>  
        </div>
      </form>
  </div>
</div>   
</div> 
</div>          
</section>

  <?php //include "../../View/header/footer.php";?>
 <script type="text/javascript">
                  
                      function validateForm() {
                                     var title = document.getElementById("title").value;
                            
                                    var count=0;
                              
                                    var is_main = 0;

                                     if ($('#is_main').is(":checked"))

                                    {

                                      is_main = 1;

                                    }

                                    var sid = $('#subscription option:selected').attr('value');
                                    if (title.trim() == "") {
                                        document.getElementById('error').innerHTML="Please Enter Title";
                                        count++;
                                    }
                                    else
                                    {
                                      document.getElementById('error').innerHTML="";
                                    }
                                    
                                  if(count>0)
                                   {
                                    return false;
                                   }
                                   else
                                   {
                                      var count_id = "add";
                                      $.ajax({
                                           url:"../../Controller/subscription_benefits/subscription_controller.php",
                                           method:"POST",
                                           data : {count_id:count_id,title:title,is_main:is_main,sid:sid},
                                           success:function(data)
                                           {
                                            console.log(data);
                                            if (data == "success"){
                                              listsubscription("1");
                                            }else{
                                              document.getElementById('error').innerHTML="Benefit not added";
                                            }
                                           }
                                        })
                                   }
                                  }
</script> 

 