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
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <input name="privacy_policy" type="text" id="privacy_policy" value="<?php foreach($display_content as $data) { echo $data[1];}?>" class="form-control"/>
                                    <span id="privacy_error" class="show_required"></span><br>
                                </div>
                            </div>  
                            <div class="form-group notranslate">
                                <label for="term_condition" class="col-sm-3 control-label">Terms & Conditions<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <input name="term_condition" type="text" id="term_condition" value="<?php foreach($display_content as $data) { echo $data[2];}?>" class="form-control"/>
                                    <span id="term_error" class="show_required"></span><br>
                                </div>
                            </div> 
                            <div class="form-group notranslate">
                                <label for="help" class="col-sm-3 control-label">Help<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <input name="help" type="text" id="help" class="form-control" value="<?php foreach($display_content as $data) { echo $data[3];}?>"/>
                                    <span id="help_error" class="show_required"></span><br>
                                </div>
                            </div>                                             
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
                                    var help = document.getElementById("help").value;
                                    var count=0;
                                    var count=0;
                                    if (privacy.trim() == "") {
                                        document.getElementById('privacy_error').innerHTML="Please Enter Privacy Policy URL";
                                        count++;
                                      }
                                      else
                                      {
                                        document.getElementById('privacy_error').innerHTML="";
                                      }
                                    if(term.trim() == "")
                                      {
                                        document.getElementById("term_error").innerHTML="Please Enter Terms And Condition URL";
                                       count++;
                                      }
                                      else
                                      {
                                        document.getElementById("term_error").innerHTML="";
                                      }
                                     if(help.trim() == "")
                                    {
                                      document.getElementById("help_error").innerHTML="Please Enter Help URL";
                                        count++;
                                    }
                                    else
                                    {
                                      document.getElementById("help_error").innerHTML="";
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
                                    $help =$_POST['help'];
                              }
                            ?>       