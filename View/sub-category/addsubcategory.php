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
                                        <input name="sub_category_image" type="file" id="sub_category_image" accept="image/*"><span id="category_imageerror" class="show_required"></span>
										<button id="submit" class="btn btn-success" name="btn-upload" style="margin-top:2%">Upload Image</button>
                                      </div> <span id="category_imageerror" class="show_required"></span>
                                        <div class="col-md-3" style="margin-top: 10px;"> </div>
                                      <div class="col-md-2" style="margin-top: 10px;">
                                        <div id="preview-crop-image" style="width:62px;height:62px;"></div>
                                     	<input type="hidden" name="imagename" id="imagename">
                                      </div>  
                                       <div class="col-md-1" style="margin-top: 10px;"> 
                                          <div id="upload-demo"></div>
                                      </div>                     
                               
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
            
            $('#submit').on('click', function (ev) {
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
</script>	
 <?php 
                            if(isset($_POST['subcategory_submit']) && !empty($_POST['subcategory_submit'])){
                                  $category_name =$_POST['sub_category_name'];

                                   $_POST['imagename'];
                                   $category_id=$_POST['category_name'];
                              }
                            ?>       
                       
 