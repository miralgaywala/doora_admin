<?php //include("View/header.php");
include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/header.php");
 //include("View/sidemenu.php");
include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/sidemenu.php");
 ?>

 <?php 
        include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/Controller/tag/tag_controller.php");
        $controller=new tag_controller();
        $controller->edit_tag();       
        ?>
<?php 
  foreach ($edit_tag as $key => $data) 
    {
?>
<!--Main Content -->

    <section class="content">
      <div class="row">
        <div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Add/Edit Tag</h2></div>
        <div class="col-md-2">
                <br/>   
               <!-- <a href="http://localhost/doora/adminpanel/Controller/category/displaycategorycontroller.php" class="btn btn-default"><b><- Back</b></a>-->
               <button style="float: right;" onclick="window.location.href='/doora/adminpanel/Controller/tag/displaytagcontroller.php'" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>

           <!-- <a href="/doora/adminpanel/View/category/addcategory.php" class="btn btn-primary">+ Add Category</a>-->
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
                                    <input type="hidden" name="tag_id" value='<?php echo $data[0];?>' id="tag_id"/>
                                    <input name="tag_name" type="text" id="tag_name" class="form-control" value="<?php echo $data[1]; ?>" />
                                    <span id="tag_error" class="show_required"></span><br>
                                </div>
                            </div> 
                            <?php } ?>                                             
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

 <?php //include("View/footer.php");
 include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/footer.php");?> 
 <script type="text/javascript">
                      function validateForm() {
                                    var tag = document.getElementById("tag_name").value;
                                    var count=0;
                                    if (tag.trim() == "") {
                                    	//alert(categoryname);
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
                                  $tag_id=$_POST['tag_id'];
                              }
                            ?>       