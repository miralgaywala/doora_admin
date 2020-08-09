
        <script type="text/javascript">
           $(document).ready(function(){
        $('#category_name').select2();
      });
          function backbusiness()
      {
              
            $.ajax({
                 url:"../../Controller/business/displaybusinesslist_controller.php",
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      
                 }
              })
      }
      function listbusiness(data)
      {
            hash_id = data;
            $.ajax({
                 url:"../../Controller/business/displaybusinesslist_controller.php",
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
        <?php
                $i=0;
                foreach ($viewverification_detail as $data) 
                {  
                  ?>
        <div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2><?php echo $data['business_name']; ?><br><?php echo $data['email']; ?></h2></div>
        <div class="col-md-2">
                <br/>   
               <!-- <a href="http://localhost/sprookr/adminpanel/Controller/category/displaycategorycontroller.php" class="btn btn-default"><b><- Back</b></a>-->
               <button style="float: right;" onclick="backbusiness()" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>
           <!-- <a href="/sprookr/adminpanel/View/category/addcategory.php" class="btn btn-primary">+ Add Category</a>-->
        </div>
      </div>   
      <div class="alert alert-info alert-dismissible" id="exists" style="display: none;">
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    Tag has been alredy exists
                 </div>   
        <div class="row">
        	<div class="col-xs-12">
        		<div class="box">
        			<br>
        			<!-- box-header -->
        			<div class="box-body">
        				<form class="form-horizontal" name="addfreedays" id="addfreedays" role="form" action="" method="post" enctype="multipart/form-data" >
                 
                    
                  <input type="hidden" name="user_id" id="user_id" value="<?php echo $data['user_id']; ?>">
                  <!-- <div class="form-group notranslate">
                                <label for="email_id" class="col-sm-3 control-label">Email ID</label>
                                <div class="col-sm-8" style="">
                                    <label for="email_id" class="control-label"><?php echo $data['email']; ?></label>
                                   
                                </div>
                            </div> -->
        					          <div class="form-group notranslate">
                                <label for="free_days" class="col-sm-3 control-label">Free Days<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <input name="free_days" type="number" id="free_days" class="form-control" min="<?php echo $data['free_trail_days']; ?>" value="<?php echo $data['free_trail_days']; ?>" step="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57"/>
                                    <span id="free_dayserror" class="show_required"></span>
                                </div>
                            </div>
                            <input type="hidden" name="free_min_date" id="free_min_date" value="<?php echo $data['free_trail_days']; ?>">
                             </div>                          
                             <div class="box-footer  notranslate">
                                    <input type="button" name="free_submit" style="margin-left: 5px;" value="Submit" class="btn btn-primary pull-right" id="free_submit" onclick="return validateForm();"/>
                                    <button class="btn btn-default pull-right" onclick="backbusiness()">Cancel</button>
                            </div>  
                           </div>
                           <?php
                           
                } ?>
                         </form>
        			</div>
        		</div>              
    </section>
</div>

  <?php //include "../../View/header/footer.php";?>
 <script type="text/javascript">
                  
                      function validateForm() {
                                    var free_days = document.getElementById("free_days").value;
                                    var user_id = document.getElementById("user_id").value;
                                    var free_min_date = document.getElementById("free_min_date").value;
                                    var count=0;
                                    if (free_days.trim() == "") {
                                        document.getElementById('free_dayserror').innerHTML="Please Enter Free Days";
                                        count++;
                                      }
                                      else if(free_days <= free_min_date)
                                      {
                                         document.getElementById('free_dayserror').innerHTML="Please Enter More Then "+free_min_date+" Days";
                                        count++;
                                      }
                                      else
                                      {
                                        document.getElementById('free_dayserror').innerHTML="";
                                      }
                                    
                                  if(count>0)
                                   {
                                    return false;
                                   }
                                   else
                                   {
                                      var count_id = "free_add";
							            // window.location.href='../../Controller/tag/tag_controller.php?id='+bla+'&count_id=';
							            $.ajax({
							                 url:"../../Controller/business/business_controller.php",
							                 method:"POST",
							                 data : {count_id:count_id,free_days:free_days,user_id,user_id},
							                 success:function(data)
							                 {
                                console.log(data);
							                 	if(data == "#add")
							                 	{
							                    	listbusiness(data);
							                    }
							                    else
							                    {
							                    	listbusiness(data);
							                    }
							                 }
							              })
                                   }
                                  }
</script>	

 