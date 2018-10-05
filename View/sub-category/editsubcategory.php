<?php //include("View/header.php");
include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/header.php");
 //include("View/sidemenu.php");
include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/sidemenu.php");
 ?>
 
 <?php 
        include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/Controller/sub_category/subcategory_controller.php");
        $controller=new subcategory_controller();
        $controller->edit_subcategorydata(); 
        ?>
<script>
        $(document).ready(function(){
            $("#category_name").select2(); 
        });
    </script>
<!--Main Content -->
    <section class="content">
      <div class="row">
        <div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Add/Edit Sub Category</h2></div>
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
                       <?php
                                        foreach ($editdisplaycategory as $key => $data) 
                                      { ?>
                                <label for="category_name" class="col-sm-3 control-label">Category<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <select id="category_name" name="category_name" class="form-control">
                                       <option value="<?php echo $data[2];?>"><?php echo $data[0];?></option>
                                      <?php
                                        foreach ($category_view as $key => $data1) 
                                      { ?>
                                         <option value="<?php echo $data1[0];?>"><?php echo $data1[1];?></option>
                                    <?php   } ?>
                                    </select>
                                    <span id="cat_nameerror" class="show_required"></span><br>
                                </div> 
                            </div>
                             
                  <input type="hidden" name="sub_category_id" value='<?php echo $data[1];?>' id="sub_category_id"/>
        					   <div class="form-group notranslate">
                                <label for="sub_category_name" class="col-sm-3 control-label">Sub Category Name<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <input name="sub_category_name" type="text" id="sub_category_name" class="form-control" value='<?php echo $data[3];?>' onblur="subcategoryname();"/>
                                    <span id="category_nameerror" class="show_required"></span><br>
                                </div>
                            </div>
                            <div class="form-group notranslate">
                                <label for="sub_category_image" class="col-sm-3 control-label">Sub Category Image<span class="show_required">*</span></label>
                                    <div class="col-sm-8">
                                        <input name="sub_category_image" type="file" id="sub_category_image" accept="image/*" style="margin-top: 10px;"><span id="category_imageerror" class="show_required"></span><br>
                                       <input type="button" id="btn-upload" class="btn btn-success" value="Upload Image" name="btn-upload" style="margin-top:2%">
                                      </div> 
                                        <div class="col-md-3" style="margin-top: 10px;"> </div>
                                      <div class="col-md-2" style="margin-top: 10px;">
                                        <div id="preview-crop-image" style="width:64px;height:64px; border-style: groove;border-width: thin;"><img src="<?php echo "/doora/images/sub_category/".$data[4]; ?>" style="width:62px;height:62px;" /></div>
                                      <input type="hidden" name="imagename" id="imagename" value='<?php echo $data[4];?>'/>
                                      </div>  
                                       <div class="col-md-1" style="margin-top: 10px;"> 
                                          <div id="upload-demo" style="width:102px;height:102px; border-style: groove;border-width: thin;"></div>
                                      </div>                     
                               
                           </div>
                                  
                                    <?php
                                  }?>
                                                    
                             <div class="box-footer  notranslate">
                                    <input type="submit" name="subcategory_submit" style="margin-left: 5px;" value="Submit" id="subcategory_submit" class="btn btn-primary pull-right"/>
                                    <input type="button" name="Cancel" value="Cancel" class="btn btn-default pull-right" onclick="window.location.href='http://localhost/doora/adminpanel/Controller/sub_category/displaysubcategorycontroller.php'">
                            </div>  
                           </div>
                         </form>
        			</div>
        		</div>
        	</div>	
       <script type="text/javascript">
            var resize = $('#upload-demo').croppie({
                enableExif: true,
                enableOrientation: true,    
                viewport: { 
                     width: 62,
                    height: 62,
                    type: 'square' 
                },
                boundary: {
                     width: 100,
                    height: 100
                }
            });
            
            $('#sub_category_image').on('change', function () { 
                var reader = new FileReader();
                reader.onload = function (e) {
                    resize.croppie('bind',{
                        url: e.target.result
                    }).then(function(){
                        console.log('Complete');
                    });
                },
                reader.readAsDataURL(this.files[0]);
            });
            
            $('#btn-upload').on('click', function (ev) {
                resize.croppie('result', {
                    type: 'canvas',
                    size: 'viewport'
                }).then(function (img) {
                    $.ajax({
                        url: "/doora/adminpanel/View/sub-category/croppie.php",
                        type: "POST",
                        data: {"sub_category_image":img},
                        success: function (data) {
                            html = '<img src="' + img + '" />';
                            //alert(data);
                            $('#imagename').val(data);
                            $("#preview-crop-image").html(html);
                        }
                    });
                });
            }); 
        </script>                         
    </section>
</div>

 <?php //include("View/footer.php");
 include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/footer.php");?> 
 <script type="text/javascript">
                      function validateForm() {
                                    //var category_name = document.getElementById["category_name"].value;
                                    var subcategoryname = document.forms["addsubcategory"]["sub_category_name"].value;
                                    var subcategoryimage = document.getElementById("sub_category_image").value;
                                    if(category_name == "0" && subcategoryname.trim() == "" && subcategoryimage == "")
                                    {
                                       document.getElementById('categoryerror').innerHTML="Please Select Category Name";
                                       document.getElementById('category_nameerror').innerHTML="Please Enter Sub-Category Name";
                                       document.getElementById("category_imageerror").innerHTML="Please Select Image";
                                        return false;
                                    }
                                    if(category_name == "0")
                                    {
                                      document.getElementById('categoryerror').innerHTML="Please Enter Category Name";
                                        return false;
                                    }
                                    if (subcategoryname.trim() == "") {
                                        document.getElementById('category_nameerror').innerHTML="Enter Category Name";
                                        return false;
                                      }
                                   /* if(subcategoryimage == "")
                                      {
                                        document.getElementById("category_imageerror").innerHTML="Please Select Image";
                                        return false;
                                      }*/
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
                                  $_POST['imagename'];
                                   $category_id=$_POST['category_name'];                                  
                                   $sub_category_id=$_POST['sub_category_id'];
                                  //echo $sub_category_id;
                   
                              }
                            ?>       
                       
 