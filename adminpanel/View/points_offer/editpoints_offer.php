
<script type="text/javascript">
   $(function () {
        $('#offer_start_date').datetimepicker({
          useCurrent: false,
           format: 'YYYY-MM-DD HH:mm:ss' //Important! See issue #1075
        });
        $('#offer_end_date').datetimepicker({
            useCurrent: false,
             format: 'YYYY-MM-DD HH:mm:ss' //Important! See issue #1075
        });
    });
</script>
        <script type="text/javascript">
           $(document).ready(function(){
        $('#busiess_offer_points').select2();
      });
           function backoffer_points()
            {
         
            $.ajax({
                  url:"../../Controller/points_offer/displaypoints_offer.php",
                  method:"POST",
                  success:function(data)
                  {
                    $('.content-wrapper').html(data);
                  }
              })
      }
      function listpoints_offer(id)
      {
            hash_id = id;
            $.ajax({
                  url:"../../Controller/points_offer/displaypoints_offer.php",
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
        <div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Add/Edit Points Offer</h2></div>
        <div class="col-md-2">
                <br/>   
               <!-- <a href="http://localhost/sprookr/adminpanel/Controller/category/displaycategorycontroller.php" class="btn btn-default"><b><- Back</b></a>-->
               <button style="float: right;" onclick="backoffer_points()" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>
           <!-- <a href="/sprookr/adminpanel/View/category/addcategory.php" class="btn btn-primary">+ Add Category</a>-->
        </div>
      </div>   
      <div class="alert alert-info alert-dismissible" id="exists" style="display: none;">
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    Points offer has been alredy exists
                 </div>   
        <div class="row">
        	<div class="col-xs-12">
        		<div class="box">
        			<br>
        			<!-- box-header -->
        			<div class="box-body">
                <?php 
                $points_value = 0;
                $num_pur = 1;
                $mul = 1;
                foreach ($displaydetailpoints_offer as $key => $value) {
                  $points_value = $value['points'];
                  $num_pur = $value['number_of_purchase'];
                  $mul = $value['multiplier'];
                ?>
        				<form class="form-horizontal" name="addtag" id="addtag" role="form" action="" method="post" enctype="multipart/form-data" >
                 
                      <input type="hidden" name="points_offer_id" id="points_offer_id" value="<?php echo $value['offer_id']; ?>">
        					          <div class="form-group notranslate">
                                <label for="points_offer_desc" class="col-sm-3 control-label">Offer Description<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <textarea name="points_offer_desc" type="text" id="points_offer_desc" class="form-control"><?php echo $value['offer_desc']; ?></textarea>
                                    <span id="points_offer_descerror" class="show_required"></span>
                                </div>
                            </div>
                            <?php if($value['is_fixed_points'] == 0)
                            {
                                $checked = ""; 
                                $read = "readonly";
                            }
                            else
                            {
                              $checked = "checked";
                              $read = "";
                            } ?>
                            <div class="form-group notranslate">
                                <label for="is_fixed_points" class="col-sm-3 control-label">Fixed Points<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                   <input type="checkbox" name="is_fixed_points" id="is_fixed_points" value="<?php echo $value['is_fixed_points']; ?>" checked="<?php echo $checked; ?>">
                                    <span id="is_fixed_pointserror" class="show_required"></span>
                                </div>
                            </div>
                            <div class="form-group notranslate">
                                <label for="points_number" class="col-sm-3 control-label">Points<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <input name="points_number" type="number" id="points_number" class="form-control" step="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="<?php echo $value['points']; ?>" <?php echo $read; ?>/>
                                    <span id="points_numbererror" class="show_required"></span>
                                </div>
                            </div>
                             <div class="form-group notranslate">
                                <label for="multipliers_points" class="col-sm-3 control-label">Multipliers<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <input name="multipliers_points" type="number" id="multipliers_points" class="form-control" step="1" min="1" value="<?php echo $mul; ?>" />
                                    <span id="multipliers_pointserror" class="show_required"></span>
                                </div>
                            </div>
                             <div class="form-group notranslate">
                                <label for="number_of_purchase_offer" class="col-sm-3 control-label">Number Of Purchase<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <input name="number_of_purchase_offer" type="number" id="number_of_purchase_offer" class="form-control" step="1" min="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="<?php echo $num_pur; ?>"/>
                                    <span id="number_of_purchase_offererror" class="show_required"></span>
                                </div>
                            </div>
                           <div class="form-group notranslate">
                                <label for="busiess_offer_points" class="col-sm-3 control-label">Business<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                  <select id="busiess_offer_points" name="" class="form-control select2">
                                    <option value="0">All Business</option> 
                                       <?php foreach ($view_business as  $data) {
                                          ?> <option value="<?php echo $data['user_id']; ?>"><?php echo $data['business_name']; ?></option> <?php }?>  
                                          </select>  
                                    <span id="busiess_offer_pointserror" class="show_required"></span>
                                </div>
                            </div>
                            <div class="form-group notranslate">
                                <label for="offer_start_date" class="col-sm-3 control-label">Offer Start Date<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <input name="offer_start_date" type="text" id="offer_start_date" class="form-control" value="<?php echo $value['offer_start_date']; ?>" />
                                    <span id="offer_start_dateerror" class="show_required"></span>
                                </div>
                            </div>
                            <div class="form-group notranslate">
                                <label for="offer_end_date" class="col-sm-3 control-label">Offer End Date<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <input name="offer_end_date" type="text" id="offer_end_date" class="form-control" value="<?php echo $value['offer_end_date']; ?>"/>
                                    <span id="offer_end_dateerror" class="show_required"></span>
                                </div>
                            </div>
                             </div>                               
                             <div class="box-footer  notranslate">
                                    <input type="submit" name="tag_submit" style="margin-left: 5px;" value="Submit" class="btn btn-primary pull-right" id="tag_submit" onclick="return validateForm();"/>
                                    <button class="btn btn-default pull-right" onclick="backoffer_points()">Cancel</button>
                            </div>  
                           </div>
                         </form>
                       <?php } ?>
        			</div>
        		</div>              
    </section>
</div>


  <?php //include "../../View/header/footer.php";?>
 <script type="text/javascript">
  $('#multipliers_points').keypress(function(event) {
  if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
    event.preventDefault();
  }
});

   
  $('input[type="checkbox"]').click(function(){
                                if($(this).prop("checked") == true){
                                    $(this).val(1);
                                    $("#points_number").val("<?php echo $points_value; ?>");
                                    $("#points_number").prop("readonly", false);
                                }
                                else if($(this).prop("checked") == false){
                                   $(this).val(0);
                                   $("#points_number").val(0);
                                   $("#points_number").prop("readonly", true);
                                }
                            });
                  
                              function validateForm() {
                                  var points_offer_id = document.getElementById("points_offer_id").value;
                                    var points_offer_desc = document.getElementById("points_offer_desc").value;
                                    var is_fixed_points = document.getElementById("is_fixed_points").value;
                                    var count=0;
                                    
                                    if (points_offer_desc.trim() == "") {
                                        document.getElementById('points_offer_descerror').innerHTML="Please Enter Points Offer Description";
                                        count++;
                                      }
                                      else
                                      {
                                        document.getElementById('points_offer_descerror').innerHTML="";
                                      }
                                      var points_number = document.getElementById("points_number").value;
                                    
                                    if (points_number.trim() == "") {
                                        document.getElementById('points_numbererror').innerHTML="Please Enter Points";
                                        count++;
                                      }
                                      else
                                      {
                                        document.getElementById('points_numbererror').innerHTML="";
                                      }
                                       var multipliers_points = document.getElementById("multipliers_points").value;
                                    
                                    if (multipliers_points.trim() == "") {
                                        document.getElementById('multipliers_pointserror').innerHTML="Please Enter Multipliers";
                                        count++;
                                      }
                                      else
                                      {
                                        if(multipliers_points == 0){
                                            document.getElementById('multipliers_pointserror').innerHTML="Please Enter More Than 0 Value";
                                            count++;
                                          }
                                          else
                                          {
                                            document.getElementById('multipliers_pointserror').innerHTML="";
                                          }
                                      }
                                        var number_of_purchase_offer = document.getElementById("number_of_purchase_offer").value;
                                    
                                    if (number_of_purchase_offer.trim() == "") {
                                        document.getElementById('number_of_purchase_offererror').innerHTML="Please Enter Number Of Purchase";
                                        count++;
                                      }
                                      else
                                      {
                                        if(number_of_purchase_offer == 0){
                                            document.getElementById('number_of_purchase_offererror').innerHTML="Please Enter More Than 0 Value";
                                            count++;
                                          }
                                          else
                                          {
                                            document.getElementById('number_of_purchase_offererror').innerHTML="";
                                          }
                                      }
                                      var busiess_offer_points = document.getElementById("busiess_offer_points").value;
                                    
                                    // if (busiess_offer_points.trim() == "") {
                                    //     document.getElementById('busiess_offer_pointserror').innerHTML="Please Select Business";
                                    //     count++;
                                    //   }
                                    //   else
                                    //   {
                                    //     document.getElementById('busiess_offer_pointserror').innerHTML="";
                                    //   }
                                       var offer_start_date = document.getElementById("offer_start_date").value;
                                    
                                    if (offer_start_date.trim() == "") {
                                        document.getElementById('offer_start_dateerror').innerHTML="Please Enter Offer start Date";
                                        count++;
                                      }
                                      else
                                      {
                                        document.getElementById('offer_start_dateerror').innerHTML="";
                                      }
                                    
                                     var offer_end_date = document.getElementById("offer_end_date").value;
                                    
                                    if (offer_end_date.trim() == "") {
                                        document.getElementById('offer_end_dateerror').innerHTML="Please Enter Offer End Date";
                                        count++;
                                      }
                                      else
                                      {
                                        document.getElementById('offer_end_dateerror').innerHTML="";
                                      }
                                  if(count>0)
                                   {
                                    return false;
                                   }
                                   else
                                   {
                                      var count_id = "edit";
            							            $.ajax({
            							                 url:"../../Controller/points_offer/points_offer_controller.php",
            							                 method:"POST",
            							                 data : {count_id:count_id,points_offer_desc:points_offer_desc,points_number:points_number,multipliers_points:multipliers_points,is_fixed_points:is_fixed_points,number_of_purchase_offer:number_of_purchase_offer,busiess_offer_points:busiess_offer_points,offer_start_date:offer_start_date,offer_end_date:offer_end_date,points_offer_id:points_offer_id},
            							                 success:function(data)
            							                 {
                                            console.log(data);
            							                 	if(data == "#edit")
            							                 	{
            							                    	listpoints_offer(data);
            							                    }
            							                    else
            							                    {
            							                    }
            							                 }
            							              })
                                   }
                                  }
</script>	

 