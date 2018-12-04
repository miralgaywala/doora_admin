<?php 
include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/header.php");
include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/sidemenu.php");
 ?>

 <?php 
        include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/Controller/content_management/contentmanagement_controller.php");
        $controller=new content_controller();
        $controller->add_content();       
        ?>

<!--Main Content -->
<script src="https://cdn.ckeditor.com/4.5.7/full/ckeditor.js"></script>
    <section class="content">
      <div class="row">
        <div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Add/Edit Content Management</h2></div>
        <div class="col-md-2">
                <br/>   
            
        </div>
      </div> 
      <?php
      if($msg==0)
            {
           $msg='<div class="alert alert-info alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Content management has been Added successfully
            </div>';
            echo $msg;
          }
          else if($msg==2)
          {
            $msg='<div class="alert alert-info alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Content management has been updated successfully
            </div>';
            echo $msg;
           
          }  
          ?>
        <div class="row">
        	<div class="col-xs-12">
        		<div class="box">
        			<br>
        			<!-- box-header -->
        			<div class="box-body">
        				<form class="form-horizontal" name="addtag" id="addtag_form" role="form" action="" method="post" onsubmit="return validateForm();">
        					<div class="form-group notranslate">
                    <input type="hidden" name="content_id" value="<?php foreach($display_content as $data) { echo $data[0];}?>">
                                <label for="privacy_policy" class="col-sm-3 control-label">Privacy Policy<span class="show_required">*</span></label>
                                <div class="col-sm-8 notranslate">
                                   <textarea class="ckeditor" cols="80" id="privacy_policy" name="privacy_policy" rows="10" >
                                                  <?php 
                                                  foreach($display_content as $data)
                                                  {
                                                    echo $data[1];
                                                  }

                                                   ?>
                                                 </textarea>
                                    <span id="privacy_error" class="show_required"></span><br>
                                </div>
                            </div>  
                             <script language="Javascript">
                                            CKEDITOR.replace( 'privacy_policy' );
                                         </script> 
                            <div class="form-group notranslate">
                                <label for="term_condition" class="col-sm-3 control-label">Terms & Conditions<span class="show_required">*</span></label>
                                <div class="col-sm-8 notranslate">
                                    <textarea class="ckeditor" cols="80" id="term_condition" name="term_condition" rows="10" >
                                                  <?php 
                                                  foreach($display_content as $data)
                                                  {
                                                    echo $data[2];
                                                  }

                                                   ?>
                                                 </textarea>
                                    <span id="term_error" class="show_required"></span><br>
                                </div>
                            </div> 
                             <script language="Javascript">
                                            CKEDITOR.replace( 'term_condition' );
                                         </script> 
                                  <div class="form-group notranslate">
                                             <label for="helpc" class="notranslate col-sm-3 control-label">Help(Customer)<span class="show_required">*</span></label>
                                             <div class="col-sm-8 notranslate">
                                                 <textarea class="ckeditor" cols="80" id="helpc" name="helpc" rows="10" >
                                                  <?php 
                                                  foreach($display_content as $data)
                                                  {
                                                    echo $data[3];
                                                  }
                                                   ?>
                                                 </textarea>
                                                 <span id="helpc_error" class="show_required"></span><br>
                                             </div>
                                         </div>   
                                         <script language="Javascript">
                                            CKEDITOR.replace( 'helpc' );
                                         </script>   
                                         <div class="form-group notranslate">
                                             <label for="helpb" class="notranslate col-sm-3 control-label">Help(Business)<span class="show_required">*</span></label>
                                             <div class="col-sm-8 notranslate">
                                                 <textarea class="ckeditor" cols="80" id="helpb" name="helpb" rows="10" >
                                                  <?php 
                                                  foreach($display_content as $data)
                                                  {
                                                    echo $data[4];
                                                  }
                                                   ?>
                                                 </textarea>
                                                 <span id="helpb_error" class="show_required"></span><br>
                                             </div>
                                         </div>   
                                         <script language="Javascript">
                                            CKEDITOR.replace( 'helpb' );
                                         </script>                                       
                             <div class="box-footer  notranslate">
                                    <input type="submit" name="content_submit" style="margin-left: 5px;" class="btn btn-primary pull-right" value="Submit" id="content_submit"/>
                            </div>  
                           </div>
                         </form>
        			</div>
        		</div>
        	</div>	
       
    </section>
</div>

 <?php 
 include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/footer.php");?> 
 <script type="text/javascript">
                      function validateForm() {
                                    var privacy = document.getElementById("privacy_policy").value;
                                    var term = document.getElementById("term_condition").value;
                                    var helpc = document.getElementById("helpc").value;
                                     var helpb = document.getElementById("helpb").value;
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
                                    return true;
                                   }
                                  }
 
</script>
 <?php 
                            if(isset($_POST['content_submit']) && !empty($_POST['content_submit'])){
                                 $content_id =$_POST['content_id'];
                                  $privacy_policy =$_POST['privacy_policy'];
                                   $term_condition =$_POST['term_condition'];
                                    $helpc =$_POST['helpc'];
                                    $helpb =$_POST['helpb'];
                              }
                            ?>       