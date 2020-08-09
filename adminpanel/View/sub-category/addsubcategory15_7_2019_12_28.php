 <?php //include "../../View/header/header.php";
//  include "../../View/header/sidemenu.php";

 ?>
 
 <?php 
       // include_once("../../Controller/sub_category/subcategory_controller.php");
       //  $controller=new subcategory_controller();
       //  $controller->add_subcategory();  
        ?>
        <script type="text/javascript">
           $(document).ready(function(){
        $('#category_name').select2();
      });
           function backsubcategory()
            {
         
            $.ajax({
                 url:"../../Controller/sub_category/displaysubcategorycontroller.php",
                 method:"POST",
                 success:function(data)
                 {
                       $('.content-wrapper').html(data);
                 }
            })
      }
      
      function existsubcategory(data)
      {
         hash_id = data;
            $.ajax({
                   url:"../../Controller/sub_category/addsubcategory_controller.php",
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      $(hash_id).show();
                      
                 }
              })
      } 
      function listsubcategory(id)
      {
            hash_id = id;
            $.ajax({
                 url:"../../Controller/sub_category/displaysubcategorycontroller.php",
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      $(hash_id).show();
                 }
              })
      } 
        </script>
<!--Main Content -->
    <section class="content">
      <div class="row">
        <div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Add/Edit Sub Category</h2></div>
        <div class="col-md-2">
                <br/>   
               <!-- <a href="http://localhost/sprookr/adminpanel/Controller/category/displaycategorycontroller.php" class="btn btn-default"><b><- Back</b></a>-->
               <button style="float: right;" onclick="backsubcategory()" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>
           <!-- <a href="/sprookr/adminpanel/View/category/addcategory.php" class="btn btn-primary">+ Add Category</a>-->
        </div>
      </div>    
      <div class="alert alert-info alert-dismissible" id="exists" style="display: none;">
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    Sub Catgeory has been alredy exists
                 </div>     
        <div class="row">
        	<div class="col-xs-12">
        		<div class="box">
        			<br>
        			<!-- box-header -->
        			<div class="box-body">
        				<form class="form-horizontal" name="addsubcategory" id="addsubcategory_form" role="form" action="" method="post" enctype="multipart/form-data" >
                  <div class="form-group notranslate">
                                <label for="category_name" class="col-sm-3 control-label">Category<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <select id="category_name" name="category_name" class="form-control">
                                       <option value="0">Select category</option>
                                  <?php    foreach ($category as $key => $data) 
                                    { ?>
                                    <option value="<?php echo $data['category_id'];?>"><?php echo $data['category_name'];?></option>
                                  <?php }?>
                                  </select>
                                  <span id="categoryerror" class="show_required"></span>
                                </div> 
                            </div>

        					          <div class="form-group notranslate">
                                <label for="sub_category_name" class="col-sm-3 control-label">Sub Category Name<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <input name="sub_category_name" type="text" id="sub_category_name" class="form-control"/>
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
                                      <div class="col-md-3" style="margin-top: 10px;">
                                        <div id="preview-crop-image" style="width:188px;height:188px; border-style: groove;border-width: thin;"></div>
                                     	<input type="hidden" name="imagename" id="imagename">
                                      </div>  
                                       <div class="col-md-1" style="margin-top: 10px;"> 
                                          <div id="upload-demo" style="width:201px;height:201px; border-style: groove;border-width: thin;"></div>
                                      </div>                     
                                  </div> 
                             </div>                               
                             <div class="box-footer  notranslate">
                                    <input type="submit" name="subcategory_submit" style="margin-left: 5px;" value="Submit" class="btn btn-primary pull-right" id="subcategory_submit" onclick="return validateForm();"/>
                                    <button class="btn btn-default pull-right" onclick="backsubcategory()">Cancel</button>
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
                     width: 186,
                    height: 186,
                    type: 'square' 
                },
                boundary: {
                     width: 200,
                    height: 200
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
              if(document.getElementById("sub_category_image").value == "") {
                var categoryimage = document.getElementById("sub_category_image").value;
                if(categoryimage == "")
                                      {
                                        document.getElementById("category_imageerror").innerHTML="Please Select Image";
                                       count++;
                                      }
                                      else
                                      {
                                        document.getElementById("category_imageerror").innerHTML="";
                                      }
              }
              else
              {
                resize.croppie('result', {
                    type: 'canvas',
                    size: 'viewport'
                }).then(function (img) {
                    $.ajax({
                        url: "../../View/sub-category/croppie.php",
                        type: "POST",
                        data: {"sub_category_image":img},
                        success: function (data) {
                            html = '<img src="' + img + '" />';
                            // alert(data);
                           	$('#imagename').val(data);
                            $("#preview-crop-image").html(html);
                        }
                    });
                });
              }
            });	
        </script>                         
    </section>
</div>

  <?php //include "../../View/header/footer.php";?>
 <script type="text/javascript">
                  
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
                                      var count_id = "add";
                                      $.ajax({
                                        type: 'POST',
                                        url: '../../Controller/sub_category/subcategory_controller.php',
                                        data: {count_id:count_id,subcategoryname:subcategoryname,category_name:category_name,imagename:imagename},
                                        success: function (data) {
                                         if(data == "#add")
                                          {
                                              listsubcategory(data);
                                            }
                                            else
                                            {
                                              existsubcategory(data);
                                            }
                                     }
                                      });
                                   }
                                  }
</script>	
 