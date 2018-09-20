<?php //include("View/header.php");
include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/header.php");
 //include("View/sidemenu.php");
include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/sidemenu.php");
 ?>
 
 <?php 
 

                foreach ($editcategorylist as $key => $data) 
                {
               
                 
     
        ?>
       <?php
        include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/Controller/category/category_controller.php");
        $controller=new category_controller();
        $controller->editcategory_data();      
         ?>
<!--Main Content -->
    <section class="content">
      <div class="row">
        <div class="col-md-10"> <h2>Category</h2></div>
        <div class="col-md-2" style="padding-left: 100px;padding-bottom: 10px;">
                <br/>   
               <!-- <a href="http://localhost/doora/adminpanel/Controller/category/displaycategorycontroller.php" class="btn btn-default"><b><- Back</b></a>-->
               <button onclick="window.location.href='http://localhost/doora/adminpanel/Controller/category/displaycategorycontroller.php'" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>

           <!-- <a href="/doora/adminpanel/View/category/addcategory.php" class="btn btn-primary">+ Add Category</a>-->
        </div>
      </div> 
        <div class="row">
        	<div class="col-xs-12">
        		<div class="box">
        			<br>
        			<!-- box-header -->
        			<div class="box-body">
        				<form class="form-horizontal" name="addcategory" id="addcategory_form" role="form" action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm();">
        					<input type="hidden" name="category_id" value='<?php echo $data[0];?>' id="category_id"/>
        					<div class="form-group notranslate">
                                <label for="category_name" class="col-sm-3 control-label">Category Name<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <input name="category_name" type="text" id="category_name" class="form-control" value='<?php echo $data[1];?>' />
                                     <span id="category_nameerror" class="show_required"></span><br>
                                </div>
                            </div>
                            <div class="form-group notranslate">
                                <label for="category_image" class="col-sm-3 control-label">Category Image<span class="show_required">*</span></label>
                                    <div class="col-sm-8">
                                    <!--    <input type="hidden" id="image" name="category_image" value="" />-->
                                        <input name="category_image" type="file" id="category_image" accept="image/*" onchange="ImagePreview();" >

                                        <div id="PreviewPicture" style="background-image: url(http://localhost/doora/images/category/<?php echo $data[2];?>);margin:10px 0 0 0;background-color: none;" >
                                          
                                        </div><br/>
                                        <span id="category_imageerror" class="show_required"></span>
                                        <!--<div id="preview_div" style="margin:10px 0 0 0">
                                            <img id="preview_img" src="thumbnail.png" data-src="" height="150" class="img-responsive img-thumbnail lazy">
                                        </div>-->
                                            <p id="alert_image" class="show_required" style = "display:none">Please choose only image </p>
                                            <p id="alert_image_any" class="show_required" style = "display:none">Please choose any image </p>
                                   </div>
                             </div>                             
                             <div class="form-group notranslate">
                                <label for="is_super_market" class="col-sm-3 control-label">Is Super Market</label>
                                    <div class="col-sm-8" style="padding-top: 6px">
                                        <input name="is_super_market" type="checkbox" id="is_super_market" <?php if($data[6] == 1) echo 'checked="checked"';?> >
                                    </div>
                             </div>    
                             <div class="box-footer  notranslate">
                                    <input type="submit" name="category_submit" value="Submit" id="category_submit" class="btn btn-primary" />
                                    <button class="btn btn-default pull-right" onclick="history.go(0);">Cancel</button>
                            </div>                         
                    </div>
                         </form> <?php } ?>
        			</div>
        		</div>
        	</div>	
       
    </section>
</div>

 <?php //include("View/footer.php");
 include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/footer.php");?> 
 <script type="text/javascript">
                          function validateForm() {
                                    var x = document.forms["addcategory"]["category_name"].value;
                                    var y = document.getElementById("category_image").files.length;
                                    if (x == "" || y == 0 ) {
                                        document.getElementById('category_nameerror').innerHTML="Enter Category Name";
                                        document.getElementById("category_imageerror").innerHTML="Please Select Image";
                                        return false;
                                    }
                                  }
         function validate() {
            if (document.getElementById('is_super_market').checked) {
                    alert("are you sure you want to checked it?");
            } 
            else {
                    alert("You didn't check it! Let me check it for you.");
                }
        }
         document.getElementById('is_super_market').addEventListener('change', validate);

         function ImagePreview() { 
             var PreviewIMG = document.getElementById('PreviewPicture'); 
             var UploadFile    =  document.getElementById('category_image').files[0]; 
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
                         if(isset($_POST['category_submit']) && !empty($_POST['category_submit'])){
                                  $category_name =$_POST['category_name'];
            
                                  //echo $category_name;
                                  
                                  $category_id=$_POST['category_id'];
                                  //echo $category_id;
                                  if(isset($_POST['is_super_market']))
                                  {
                                    $_POST['is_super_market']=1;
                                  }
                                  else
                                  {
                                    $_POST['is_super_market']=0;
                                  }
                                  $_POST['is_super_market'];
                                  $imagename = $_FILES['category_image']['name'];
                                  $source = $_FILES['category_image']['tmp_name'];
                                  
                                  $target = $_SERVER['DOCUMENT_ROOT']."/doora/images/category/" . $imagename; 
                                 
                                  move_uploaded_file($source, $target);
                                  $imagepath = $imagename;
                                 
                                  $path="/doora/images/category/" . $imagepath; 
                                  $save = $_SERVER['DOCUMENT_ROOT'].$path;//This is the new file you saving
                                  $_FILES['category_image']= $imagepath;

                                  $file = $_SERVER['DOCUMENT_ROOT']."/doora/images/category/" . $imagepath; //$_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/images/". $imagepath; //This is the original file
                                  //echo $_POST['category_image'];
                                  list($width, $height) = getimagesize($file) ;  

                                  
                                  $modwidth=394;
                                  $diff = $width / $modwidth;
                                  
                                  $modheight = 170;
                                  $tn = imagecreatetruecolor($modwidth, $modheight) ; 
                                  $image = imagecreatefromjpeg($file) ; 
                                  imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height) ; 

                                  imagejpeg($tn, $save, 90) ; 
                                  return $save; 

                                 
                              }
                            ?>       
                       
 