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
                                <label for="category_name" class="col-sm-3 control-label">Category<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <select id="category_name" name="category_name" class="form-control">
                                       <option value="0">Select category</option>
                                  <?php    foreach ($category as $key => $data) 
                                    { ?>
                                    <option value="<?php echo $data[0];?>"><?php echo $data[1];?></option>
                                    
                                  <?php }?>
                                  </select>
                                  <span id="categoryerror" class="show_required"></span>
                                </div> 
                            </div>

        					   <div class="form-group notranslate">
                                <label for="sub_category_name" class="col-sm-3 control-label">Sub Category Name<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <input name="sub_category_name" type="text" id="sub_category_name" class="form-control" onblur="subcategoryname();" />
                                    <span id="category_nameerror" class="show_required"></span>
                                </div>
                            </div>
                            <div class="form-group notranslate">
                                <label for="sub_category_image" class="col-sm-3 control-label">Sub Category Image<span class="show_required">*</span></label>
                                    <div class="col-sm-8">
                                        <input name="sub_category_image" type="file" id="sub_category_image" accept="image/*" style="margin-top: 10px;">
                                        <span id="category_imageerror" class="show_required"></span><br><br>
										                  <input type="button" id="btn-upload" class="btn btn-success" value="Upload Image" name="btn-upload">
                                      </div>
                                        <div class="col-md-3" style="margin-top: 10px;"> </div>
                                      <div class="col-md-2" style="margin-top: 10px;">
                                        <div id="preview-crop-image" style="width:64px;height:64px; border-style: groove;border-width: thin;"></div>
                                     	<input type="hidden" name="imagename" id="imagename">
                                      </div>  
                                       <div class="col-md-1" style="margin-top: 10px;"> 
                                          <div id="upload-demo" style="width:102px;height:102px; border-style: groove;border-width: thin;"></div>
                                      </div>                     
                           </div> 
                             </div>                               
                             <div class="box-footer  notranslate">
                                    <input type="submit" name="subcategory_submit" style="margin-left: 5px;" value="Submit" class="btn btn-primary pull-right" id="subcategory_submit"/>
                                    <button class="btn btn-default pull-right" onclick="document.getElementById('addsubcategory_form').reset();window.location.href='http://localhost/doora/adminpanel/Controller/sub_category/displaysubcategorycontroller.php'">Cancel</button>
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
                      /*function subcategoryname()
                      {
                        var name=document.getElementById("sub_category_name").value;
                        if(name)
                        {
                            $.ajax({
                              type: 'post',
                              url: '/doora/adminpanel/View/sub-category/checkdata.php',
                              data: {
                                sub_category_name:name
                              },
                              success: function (data) {
                               
                               $('#category_nameerror').html(data);
                             }
                              });
                            /* }
                             else
                             {
                              $( '#category_nameerror' ).html("");
                              return false;
                             }

                        }
                   }  */
                  
                      function validateForm() {
                                    var subcategoryname = document.getElementById("sub_category_name").value;
                                    var subcategoryimage = document.getElementById("sub_category_image").value;
                                    var category_name = document.getElementById("category_name").value;
                                      var imagename = document.getElementById("imagename").value;
                                    // if(category_name == "0" && subcategoryname.trim() == "" && subcategoryimage == "" && imagename == "")
                                    // {
                                    //    document.getElementById('categoryerror').innerHTML="Please Select Category Name";
                                    //    document.getElementById('category_nameerror').innerHTML="Please Enter Sub-Category Name";
                                    //    document.getElementById("category_imageerror").innerHTML="Please Select Image";
                                    //     return false;
                                    // }
                                    var count=0;
                                    if(category_name == "0")
                                    {
                                      document.getElementById('categoryerror').innerHTML="Please Enter Category Name";
                                       count++;
                                    }
                                    else
                                      {
                                        document.getElementById('categoryerror').innerHTML="";
                                      }
                                    if (subcategoryname.trim() == "") {
                                        document.getElementById('category_nameerror').innerHTML="Please Enter Sub-Category Name";
                                        count++;
                                      }
                                      else
                                      {
                                        document.getElementById('category_nameerror').innerHTML="";
                                      }
                                    if(subcategoryimage == "")
                                      {
                                        document.getElementById("category_imageerror").innerHTML="Please Select Image";
                                        count++;
                                      }
                                       else
                                      {
                                        document.getElementById('category_imageerror').innerHTML="";
                                      }
                                    if(imagename == "")
                                    {
                                      document.getElementById("category_imageerror").innerHTML="Please Select Image";
                                       count++;
                                    }
                                     else
                                      {
                                        document.getElementById('category_imageerror').innerHTML="";
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
                            if(isset($_POST['subcategory_submit']) && !empty($_POST['subcategory_submit'])){
                                  $category_name =$_POST['sub_category_name'];

                                   $_POST['imagename'];
                                   $category_id=$_POST['category_name'];
                              }
                            ?>       
                       
 