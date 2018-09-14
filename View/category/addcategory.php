<?php include("View/header/header.php");
 include("View/header/sidemenu.php");
 ?>
<!--Main Content -->
    <section class="content">
        <div class="row">
        	<div class="col-xs-12">
        		<div class="box">
        			<br>
        			<!-- box-header -->
        			<div class="box-body">
        				<form class="form-horizontal" id="addcategory_form" role="form" action="" method="post" enctype="multipart/form-data">
        					<div class="form-group notranslate">
                                <label for="category_name" class="col-sm-3 control-label">Category Name<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <input name="category_name" type="text" id="category_name" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group notranslate">
                                <label for="category_image" class="col-sm-3 control-label">Category Image<span class="show_required">*</span></label>
                                    <div class="col-sm-8">
                                    <!--    <input type="hidden" id="image" name="category_image" value="" />-->
                                        <input name="category_image" type="file" id="category_image" accept="image/*" onchange="ImagePreview()" >
                                        <div id="PreviewPicture" style="margin:10px 0 0 0" ></div>
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
                                        <input name="is_super_market" type="checkbox" id="is_super_market">
                                    </div>
                             </div>    
                             <div class="box-footer  notranslate">
                                    <input type="submit" name="category_submit" value="Submit" id="category_submit" class="btn btn-primary" />
                                    <button class="btn btn-default pull-right">Cancel</button>
                            </div>                         
                    </div>
                         </form>
        			</div>
        		</div>
        	</div>	
       
    </section>
</div>
 <?php include("View/header/footer.php");?> 
 <script type="text/javascript">
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
                            if($_POST){
                              if (isset ($_FILES['category_image'])){
                                  $imagename = $_FILES['category_image']['name'];
                                  $source = $_FILES['category_image']['tmp_name'];
                                  $target = "images/".$imagename;
                                 
                                  move_uploaded_file($source, $target);
                                  $imagepath = $imagename;
                                  $save = "images/" . $imagepath; //This is the new file you saving
                                  $file = "images/" . $imagepath; //This is the original file

                                  list($width, $height) = getimagesize($file) ;  

                                  if($width <= 1185)
                                  {
                                    echo "<script>console.log(".$width.");</script>";
                                    echo "<script>alert('your image size is not proper');</script>";
                                  }
                                  else
                                  {
                                     $modwidth = 1185; 
                                  }
                                  $modwidth=1185;
                                  $diff = $width / $modwidth;
                                  if($height <= 510)
                                  {
                                    echo "<script>console.log(".$height.");</script>";
                                  }
                                  else
                                  {
                                  $modheight = 510; 
                                  }
                                  $modheight = 510;
                                  $tn = imagecreatetruecolor($modwidth, $modheight) ; 
                                  $image = imagecreatefromjpeg($file) ; 
                                  imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height) ; 

                                  imagejpeg($tn, $save, 90) ; 
                                  return $save;
                              }
                            } 
                            ?>
 