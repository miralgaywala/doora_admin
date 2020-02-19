
        <script type="text/javascript">
           function backdoora_dollor_value()
            {
         
            $.ajax({
                 url:"../../Controller/doora_dollor_value/displaydoora_dollor_value.php",
                 method:"POST",
                 success:function(data)
                 {
                       $('.content-wrapper').html(data);
                      
                 }
            })
      }
      function listdoora_dollor_value(id)
      {
            hash_id = id;
            $.ajax({
                 url:"../../Controller/doora_dollor_value/displaydoora_dollor_value.php",
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      $(hash_id).show();
                 }
              })
      }
      function existsedittag(tag_id,data)
      {
         hash_id = data;
            $.ajax({
                 url:"../../Controller/tag/edittag_controller.php?id="+tag_id,
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
<?php foreach ($detail_doora_dollor_value as $key => $data) {
  # code...
 ?>
    <section class="content">
      <div class="row">
        <div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Add/Edit Dora Dollor Value</h2></div>
        <div class="col-md-2">
                <br/>   
               <!-- <a href="http://localhost/sprookr/adminpanel/Controller/category/displaycategorycontroller.php" class="btn btn-default"><b><- Back</b></a>-->
               <button style="float: right;" onclick="backdoora_dollor_value()" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>
           <!-- <a href="/sprookr/adminpanel/View/category/addcategory.php" class="btn btn-primary">+ Add Category</a>-->
        </div>
      </div>   
      <div class="alert alert-info alert-dismissible" id="exists" style="display: none;">
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    Doora dollor value has been alredy Exists
                 </div>   
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <br>
              <!-- box-header -->
              <div class="box-body">
                <form class="form-horizontal" name="addtag" id="addtag" role="form" action="" method="post" enctype="multipart/form-data" >
                 

                            <div class="form-group notranslate">
                                <label for="doora_dollor_value_points" class="col-sm-3 control-label">Points<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                  <input type="hidden" name="doora_dollor_value_id" value="<?php echo $data['id'];?>" id="doora_dollor_value_id">
                                    <input name="doora_dollor_value_points" type="text" id="doora_dollor_value_points" class="form-control" value="<?php echo $data['points']; ?>" />
                                    <span id="doora_dollor_value_pointserror" class="show_required"></span>
                                </div>
                            </div>
                            <div class="form-group notranslate">
                                <label for="doora_dollor_value_amount" class="col-sm-3 control-label">Amounts<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <input name="doora_dollor_value_amount" type="text" id="doora_dollor_value_amount" class="form-control" value="<?php echo $data['amount']; ?>" />
                                    <span id="doora_dollor_value_amounterror" class="show_required"></span>
                                </div>
                            </div>

                           
                             </div>                               
                             <div class="box-footer  notranslate">
                                    <input type="submit" name="tag_submit" style="margin-left: 5px;" value="Submit" class="btn btn-primary pull-right" id="tag_submit" onclick="return validateForm();"/>
                                    <button class="btn btn-default pull-right" onclick="backdoora_dollor_value()">Cancel</button>
                            </div>  
                           </div>
                         </form>
              </div>
            <?php } ?>
            </div>              
    </section>
</div>

  <?php //include "../../View/header/footer.php";?>
 <script type="text/javascript">
                  
                      function validateForm() {
                                    var doora_dollor_value_points = document.getElementById("doora_dollor_value_points").value;
                                    var doora_dollor_value_amount = document.getElementById("doora_dollor_value_amount").value;
                                    var doora_dollor_value_id = document.getElementById("doora_dollor_value_id").value;
                                  
                                    var count=0;
                                    
                                    if (doora_dollor_value_points.trim() == "") {
                                        document.getElementById('doora_dollor_value_pointserror').innerHTML="Please Enter Points";
                                        count++;
                                      }
                                      else
                                      {
                                        document.getElementById('doora_dollor_value_pointserror').innerHTML="";
                                      }
                                      if (doora_dollor_value_amount.trim() == "") {
                                        document.getElementById('doora_dollor_value_amounterror').innerHTML="Please Enter Amounts";
                                        count++;
                                      }
                                      else
                                      {
                                        document.getElementById('doora_dollor_value_amounterror').innerHTML="";
                                      }
                                    
                                  if(count>0)
                                   {
                                    return false;
                                   }
                                   else
                                   {
                                      var count_id = "edit";
                       
                                      $.ajax({
                                           url:"../../Controller/doora_dollor_value/doora_dollor_value_controller.php",
                                           method:"POST",
                                           data : {count_id:count_id,doora_dollor_value_points:doora_dollor_value_points,doora_dollor_value_amount:doora_dollor_value_amount,doora_dollor_value_id:doora_dollor_value_id},
                                           success:function(data)
                                           {
                                         
                                            if(data == "#edit")
                                            {
                                                listdoora_dollor_value(data);
                                              }
                                              else
                                              {
                                                
                                              }
                                           }
                                        })
                                   }
                                  }
</script> 

