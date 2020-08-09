
        <script type="text/javascript">
          function backdoora()
            {
         
            $.ajax({
                 url:"../../Controller/doorapoints/displaydoora_points.php",
                 method:"POST",
                 success:function(data)
                 {
                       $('.content-wrapper').html(data);
                      
                 }
            })
      }
      function listdooradollors(id)
      {
            hash_id = id;
            $.ajax({
                 url:"../../Controller/doorapoints/displaydoora_points.php",
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
        <div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Add/Edit Doora Dollor Points</h2></div>
        <div class="col-md-2">
                <br/>   
               <!-- <a href="http://localhost/sprookr/adminpanel/Controller/category/displaycategorycontroller.php" class="btn btn-default"><b><- Back</b></a>-->
               <button style="float: right;" onclick="backdoora()" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>
           <!-- <a href="/sprookr/adminpanel/View/category/addcategory.php" class="btn btn-primary">+ Add Category</a>-->
        </div>
      </div>   
      <div class="alert alert-info alert-dismissible" id="exists" style="display: none;">
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    Doora dollor points has been alredy exists
                 </div>   
        <div class="row">
        	<div class="col-xs-12">
        		<div class="box">
        			<br>
        			<!-- box-header -->
        			<div class="box-body">
                <?php foreach ($doorapoints as $key => $data) {
 ?>
 
        				<form class="form-horizontal" name="addtag" id="addtag" role="form" action="" enctype="multipart/form-data" >
                 
                        <input type="hidden" name="id" id="doora_id" value="<?php echo $data['id']; ?>">
        					          <div class="form-group notranslate">
                                <label for="doora_dollor_points_add" class="col-sm-3 control-label">Doora Dollor Points<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <input name="doora_dollor_points_add" type="text" id="doora_dollor_points_add" class="form-control" value="<?php echo $data['type']; ?>" readonly />
                                    <span id="doora_dollor_pointserror" class="show_required"></span>
                                </div>
                            </div>
                             <div class="form-group notranslate">
                                <label for="code" class="col-sm-3 control-label">Code<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <input name="code" type="text" id="code" class="form-control" value="<?php echo $data['code']; ?>"/>
                                    <span id="codeerror" class="show_required"></span>
                                </div>
                            </div>
                             <div class="form-group notranslate">
                                <label for="description" class="col-sm-3 control-label">Description<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <input name="description" type="text" id="description" class="form-control" value="<?php echo $data['doora_dollar_points_desc']; ?>"/>
                                    <span id="descriptionerror" class="show_required"></span>
                                </div>
                            </div>
                             <div class="form-group notranslate">
                                <label for="points" class="col-sm-3 control-label">Points<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <input name="points" type="text" id="points" class="form-control" value="<?php echo $data['points']; ?>"/>
                                    <span id="pointserror" class="show_required"></span>
                                </div>
                            </div>
                             </div>                               
                             <div class="box-footer  notranslate">
                                    <input type="button" name="tag_submit" style="margin-left: 5px;" value="Submit" class="btn btn-primary pull-right" id="tag_submit" onclick="validateForm();"/>
                                    <button class="btn btn-default pull-right" onclick="backdoora()">Cancel</button>
                            </div>  
                           </div>
                         </form>
        			</div>
        		</div>              
    </section>
</div>
<?php } ?>
  <?php //include "../../View/header/footer.php";?>
 <script type="text/javascript">
                  
                      function validateForm() {
                                  var id = document.getElementById("doora_id").value;
                                    var doora_dollor_points = document.getElementById("doora_dollor_points_add").value;
                                    var count=0;
                                    
                                    if (doora_dollor_points.trim() == "" || doora_dollor_points == undefined) {
                                        document.getElementById('doora_dollor_pointserror').innerHTML="Please Enter Doora Dollor Points";
                                        count++;
                                      }
                                      else
                                      {
                                        document.getElementById('doora_dollor_pointserror').innerHTML="";
                                      }
                                       var code = document.getElementById("code").value;
                                    if (code.trim() == "" || code == undefined) {
                                        document.getElementById('codeerror').innerHTML="Please Enter Code";
                                        count++;
                                      }
                                      else
                                      {
                                        document.getElementById('codeerror').innerHTML="";
                                      }
                                      var description = document.getElementById("description").value;
                                    if (description.trim() == "" || description == undefined) {
                                        document.getElementById('descriptionerror').innerHTML="Please Enter Description";
                                        count++;
                                      }
                                      else
                                      {
                                        document.getElementById('descriptionerror').innerHTML="";
                                      }
                                      var points = document.getElementById("points").value;
                                       if (points.trim() == "" || points == undefined) {
                                        document.getElementById('pointserror').innerHTML="Please Enter Points";
                                        count++;
                                      }
                                      else
                                      {
                                        document.getElementById('pointserror').innerHTML="";
                                      }
                                    
                                  if(count>0)
                                   {
                                    return false;
                                   }
                                   else
                                   {
                                      var count_id = "edit";
							            $.ajax({
							                 url:"../../Controller/doorapoints/doorapoints_controller.php",
							                 method:"POST",
							                 data : {count_id:count_id,doora_dollor_points:doora_dollor_points,code:code,description:description,points:points,doorapoints_id:id},
							                 success:function(data)
							                 {
                                console.log(data);
							                 	if(data == "#edit")
							                 	{
							                    	listdooradollors(data);
							                    }
							                    else
							                    {
							                    	existseditdooradollors(id,data);
							                    }
							                 }
							              })
                                   }
                                  }
</script>	

 