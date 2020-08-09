<script src="https://cdn.ckeditor.com/4.5.7/full/ckeditor.js"></script>
        <script type="text/javascript">
           function backcontent()
            {
         
            $.ajax({
                 url:"../../Controller/content_management/addcontentmanagement_controller.php",
                 method:"POST",
                 success:function(data)
                 {
                       $('.content-wrapper').html(data);
                      
                 }
            })
      }
      function listcontent(id)
      {
            hash_id = id;
            $.ajax({
                 url:"../../Controller/content_management/addcontentmanagement_controller.php",
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
        <div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Add/Edit Tag</h2></div>
        <div class="col-md-2">
                <br/>   
               <!-- <a href="http://localhost/sprookr/adminpanel/Controller/category/displaycategorycontroller.php" class="btn btn-default"><b><- Back</b></a>-->
               <button style="float: right;" onclick="backtag()" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>
           <!-- <a href="/sprookr/adminpanel/View/category/addcategory.php" class="btn btn-primary">+ Add Category</a>-->
        </div>
      </div>   
      <div class="alert alert-info alert-dismissible" style="display: none;" id="add">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Content management has been added successfully
            </div>
            <div class="alert alert-info alert-dismissible" style="display: none;" id="edit">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Content management has been edited successfully
            </div>  
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <br>
              <!-- box-header -->
              <div class="box-body">
                <form class="form-horizontal" name="addtag" id="addtag" role="form" action="" method="post" enctype="multipart/form-data" >
                 <input type="hidden" name="content_id" value="<?php foreach($display_content as $data) { echo $data['content_management_id'];}?>" id="content_id"> 
                                <label for="privacy_policy" class="col-sm-3 control-label">Privacy Policy<span class="show_required">*</span></label>
                                <div class="col-sm-8 notranslate">
                                   <textarea class="ckeditor" cols="80" id="privacy_policy" name="privacy_policy" rows="10" >
                                                  <?php 
                                                  foreach($display_content as $data)
                                                  {
                                                    echo $data['privacy_policy'];
                                                  }

                                                   ?>
                                                 </textarea>
                                    <span id="privacy_error" class="show_required"></span><br>
                                </div>
                                 <script language="Javascript">
                                            CKEDITOR.replace( 'privacy_policy' );
                                         </script> 
                                <label for="term_condition" class="col-sm-3 control-label">Terms & Conditions<span class="show_required">*</span></label>
                                <div class="col-sm-8 notranslate">
                                   <textarea class="ckeditor" cols="80" id="term_condition" name="term_condition" rows="10" >
                                                  <?php 
                                                  foreach($display_content as $data)
                                                  {
                                                    echo $data['terms_and_condition'];
                                                  }

                                                   ?>
                                                 </textarea>
                                     <span id="term_error" class="show_required"></span><br>
                                </div>
                                <script language="Javascript">
                                            CKEDITOR.replace( 'term_condition' );
                                         </script> 
                                <label for="helpc" class="col-sm-3 control-label">Help(Customer)<span class="show_required">*</span></label>
                                <div class="col-sm-8 notranslate">
                                   <textarea class="ckeditor" cols="80" id="helpc" name="helpc" rows="10" >
                                                  <?php 
                                                  foreach($display_content as $data)
                                                  {
                                                    echo $data['help_customer'];
                                                  }

                                                   ?>
                                                 </textarea>
                                    <span id="helpc_error" class="show_required"></span><br>
                                </div>
                                 <script language="Javascript">
                                            CKEDITOR.replace( 'helpc' );
                                         </script>  
                                <label for="helpb" class="col-sm-3 control-label">Help(Business)<span class="show_required">*</span></label>
                                <div class="col-sm-8 notranslate">
                                   <textarea class="ckeditor" cols="80" id="helpb" name="helpb" rows="10" >
                                                  <?php 
                                                  foreach($display_content as $data)
                                                  {
                                                    echo $data['help_business'];
                                                  }

                                                   ?>
                                                 </textarea>
                                   <span id="helpb_error" class="show_required"></span><br>
                                </div>
                                 <script language="Javascript">
                                            CKEDITOR.replace( 'helpb' );
                                         </script> 
                             </div>                               
                             <div class="box-footer  notranslate">
                                    <input type="submit" name="tag_submit" style="margin-left: 5px;" value="Submit" class="btn btn-primary pull-right" id="tag_submit" onclick="return validateForm();"/>
                                    <button class="btn btn-default pull-right" onclick="backcontent()">Cancel</button>
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
                                    var privacy = document.getElementById("privacy_policy").value;
                                    var term = document.getElementById("term_condition").value;
                                    var helpc = document.getElementById("helpc").value;
                                     var helpb = document.getElementById("helpb").value;
                                     var content_id = document.getElementById("content_id").value;
                                    var count=0;
                                    if (privacy.trim() == "") {
                                        document.getElementById('privacy_error').innerHTML="Please Enter Privacy Policy";
                                        count++;
                                      }
                                      else
                                      {
                                        document.getElementById('privacy_error').innerHTML="";
                                      }
                                    if(term.trim() == "")
                                      {
                                        document.getElementById("term_error").innerHTML="Please Enter Terms And Condition";
                                       count++;
                                      }
                                      else
                                      {
                                        document.getElementById("term_error").innerHTML="";
                                      }
                                     if(helpc.trim() == "")
                                    {
                                      document.getElementById("helpc_error").innerHTML="Please Enter Help(Customer)";
                                        count++;
                                    }
                                    else
                                    {
                                      document.getElementById("helpc_error").innerHTML="";
                                    }
                                    if(helpb.trim() == "")
                                    {
                                      document.getElementById("helpb_error").innerHTML="Please Enter Help(Business)";
                                        count++;
                                    }
                                    else
                                    {
                                      document.getElementById("helpb_error").innerHTML="";
                                    }
                                    
                                  if(count>0)
                                   {
                                    return false;
                                   }
                                   else
                                   {
                              
                                      var count_id = "add";
                                      $.ajax({
                                           url:"../../Controller/content_management/contentmanagement_controller.php",
                                           method:"POST",
                                           data : {count_id:count_id,privacy:privacy,term:term,helpc:helpc,helpb:helpb,content_id:content_id},
                                           success:function(data)
                                           {
                                            listcontent(data);
                                           }
                                        })
                                   }
                                  }
</script> 

 