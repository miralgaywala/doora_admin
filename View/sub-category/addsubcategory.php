<?php //include("View/header.php");
include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/header.php");
 //include("View/sidemenu.php");
include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/sidemenu.php");
 ?>
 
 <?php 
       include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/Controller/sub_category/subcategory_controller.php");
        $controller=new subcategory_controller();
        $controller->add_subcategory();  
        ?>
<script>
        $(document).ready(function(){
            $("#category_name").select2(); 
        });
    </script>
<!--Main Content -->
    <section class="content">
      <div class="row">
        <div class="col-md-10" style="float: left;"> <h2>Sub Category</h2></div>
        <div class="col-md-2">
                <br/>   
               <!-- <a href="http://localhost/doora/adminpanel/Controller/category/displaycategorycontroller.php" class="btn btn-default"><b><- Back</b></a>-->
               <button style="float: right;" onclick="window.location.href='http://localhost/doora/adminpanel/Controller/sub_category/displaysubcategorycontroller.php'" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>

           <!-- <a href="/doora/adminpanel/View/category/addcategory.php" class="btn btn-primary">+ Add Category</a>-->
        </div>
      </div>      
        <div class="row">
        	<div class="col-xs-12">
        		<div class="box">
        			<br>
        			<!-- box-header -->
        			<div class="box-body">
        				<form class="form-horizontal" name="addsubcategory" id="addsubcategory_form" role="form" action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm();">
                  <div class="form-group notranslate">
                                <label for="category_name" class="col-sm-3 control-label">Category<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <select id="category_name" name="category_name" class="form-control">
                                       <option value="">Select category</option>
                                  <?php    foreach ($category as $key => $data) 
                                    { ?>
                                    <option value="<?php echo $data[0];?>"><?php echo $data[1];?></option>
                                    
                                  <?php }?>
                                  </select>
                                </div> 
                            </div>
        					   <div class="form-group notranslate">
                                <label for="sub_category_name" class="col-sm-3 control-label">Sub Category Name<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <input name="sub_category_name" type="text" id="sub_category_name" class="form-control"/>
                                    <span id="category_nameerror" class="show_required"></span><br>
                                </div>
                            </div>
                            <div class="form-group notranslate">
                                <label for="sub_category_image" class="col-sm-3 control-label">Sub Category Image<span class="show_required">*</span></label>
                                    <div class="col-sm-8">
                                        <input name="sub_category_image" type="file" id="sub_category_image" accept="image/*" onchange="ImagePreview();">
                                        <div id="SubcatPicture" style="margin:10px 0 0 0" ></div><br>
                                        <span id="category_imageerror" class="show_required"></span>                                           
                                   </div>
                             </div>                               
                             <div class="box-footer  notranslate">
                                    <input type="submit" name="subcategory_submit" value="Submit" id="subcategory_submit" class="btn btn-primary"  />
                                    <button class="btn btn-default pull-right" onclick="window.location.href='/doora/adminpanel/Controller/sub_category/addsubcategory_controller.php'">Cancel</button>
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
                                    var subcategoryname = document.forms["addsubcategory"]["sub_category_name"].value;
                                    var subcategoryimage = document.getElementById("sub_category_image").value;
                                    if (subcategoryname == "") {
                                        document.getElementById('category_nameerror').innerHTML="Enter Category Name";
                                        return false;
                                      }
                                    if(subcategoryimage == "")
                                      {
                                        document.getElementById("category_imageerror").innerHTML="Please Select Image";
                                        return false;
                                      }
                                  }

       
         function ImagePreview() { 
             var PreviewIMG = document.getElementById('SubcatPicture'); 
             var UploadFile    =  document.getElementById('sub_category_image').files[0]; 
             var ReaderObj  =  new FileReader(); 
             ReaderObj.onloadend = function () { 
                PreviewIMG.style.backgroundImage  = "url("+ ReaderObj.result+")";
              }
             if (UploadFile) { 
                ReaderObj.readAsDataURL(UploadFile);
              } else { 
                 PreviewIMG.style.backgroundcolor  = "";
              } 
            }
</script>
 <?php 
                            if(isset($_POST['subcategory_submit']) && !empty($_POST['subcategory_submit'])){
                                  $category_name =$_POST['sub_category_name'];
                                  $imagename = $_FILES['sub_category_image']['name'];
                                  $source = $_FILES['sub_category_image']['tmp_name'];
                                  
                                  $target = $_SERVER['DOCUMENT_ROOT']."/doora/images/sub_category/" . $imagename; 
                                 
                                  move_uploaded_file($source, $target);
                                  $imagepath = $imagename;
                                  //echo  $imagename;
                                  //echo $_POST['category_name'];
                                  $path="/doora/images/sub_category/" . $imagepath; 
                                  $save = $_SERVER['DOCUMENT_ROOT'].$path;//This is the new file you saving
                                  $_FILES['sub_category_image']= $imagepath;

                                  $file = $_SERVER['DOCUMENT_ROOT']."/doora/images/sub_category/" . $imagepath; //$_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/images/". $imagepath; //This is the original file
                                  //echo $_POST['category_image'];
                                  //echo $_POST['sub_category_name'];
                                  list($width, $height) = getimagesize($file) ;                                    
                                  $modwidth=62;
                                  $diff = $width / $modwidth;                                  
                                  $modheight = 62;
                                  $tn = imagecreatetruecolor($modwidth, $modheight) ; 
                                  $image = imagecreatefromjpeg($file) ; 
                                  imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height) ; 

                                  imagejpeg($tn, $save, 90) ; 
                                  return $save;                                  
                              }
                            ?>       
                       
 