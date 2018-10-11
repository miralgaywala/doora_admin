<?php 
include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/header.php");

include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/sidemenu.php");
 ?>

 <?php 
        include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/Controller/tag/tag_controller.php");
        $controller=new tag_controller();
        $controller->add_tag();       
        ?>

<!--Main Content -->

    <section class="content">
      <div class="row">
        <div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Add/Edit Tag</h2></div>
        <div class="col-md-2">
                <br/>   
            
               <button style="float: right;" onclick="window.location.href='/doora/adminpanel/Controller/tag/displaytagcontroller.php'" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>
        </div>
      </div>   
        <div class="row">
        	<div class="col-xs-12">
        		<div class="box">
        			<br>
        			<!-- box-header -->
        			<div class="box-body">
        				<form class="form-horizontal" name="addtag" id="addtag_form" role="form" action="" method="post" onsubmit="return validateForm();">
        					<div class="form-group notranslate">
                                <label for="tag_name" class="col-sm-3 control-label">Tag<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <input name="tag_name" type="text" id="tag_name" class="form-control"/>
                                    <span id="tag_error" class="show_required"></span><br>
                                </div>
                            </div>                                              
                             <div class="box-footer  notranslate">
                                    <input type="submit" name="tag_submit" style="margin-left: 5px;" class="btn btn-primary pull-right" value="Submit" id="tag_submit"/>
                                    <input type="button" class="btn btn-default pull-right" onclick="document.getElementById('addtag_form').reset();window.location.href='/doora/adminpanel/Controller/tag/displaytagcontroller.php'" value="Cancel"></button>
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
                                    var tag = document.getElementById("tag_name").value;
                                    var count=0;
                                    if (tag.trim() == "") {
                                        document.getElementById('tag_error').innerHTML="Please Enter Tag";
                                        count++;
                                      }
                                      else
                                      {
                                      	document.getElementById('tag_error').innerHTML="";
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
                            if(isset($_POST['tag_submit']) && !empty($_POST['tag_submit'])){
                                  $tag =$_POST['tag_name'];
                              }
                            ?>       