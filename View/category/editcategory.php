<?php 
include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/header.php");
include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/sidemenu.php");
?> 
 <?php
    foreach ($editcategorylist as $key => $data) 
    {
      $image=$data[2];
 ?>
  <?php
      include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/Controller/category/category_controller.php");
      $controller=new category_controller();
      $controller->editcategory_data();      
  ?>
<!--Main Content -->
    <section class="content">
      <div class="row">
        <div class="col-md-10" style="float: left;"> <h2>Category</h2></div>    
        <div class="col-md-2">
            <br/>   
            <button style="float: right;" onclick="window.location.href='http://localhost/doora/adminpanel/Controller/category/displaycategorycontroller.php'" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>          
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
                                    <input name="category_name" type="text" id="category_name" class="form-control" value='<?php echo $data[1];?>' onblur="categoryname();"/>
                                     <span id="category_nameerror" class="show_required"></span><br>
                                </div>
                            </div>
                            <div class="form-group notranslate">
                                <label for="category_image" class="col-sm-3 control-label">Category Image<span class="show_required">*</span></label>
                                    <div class="col-sm-8">
                                        <input name="category_image" type="file" id="category_image" accept="image/*">
                                        <span id="category_imageerror" class="show_required"></span>
                                       <input type="hidden" name="imagename" id="imagename" value="<?php echo $data[2]; ?>">
                                       <input type="button" id="btn-upload" class="btn btn-success" value="Upload Image" name="btn-upload" style="margin-top:2%">
                                      </div> 

                                        <div class="col-md-2" style="margin-top: 10px;"> </div>
                                      <div class="col-md-5" style="margin-top: 125px;">
                                        <div id="preview-crop-image" style="width:300px;height:300px;"><img src="<?php echo "/doora/images/category/".$data[2]; ?>" style="width:400px;height:170px;" /></div>
                                      </div>  
                                       <div class="col-md-2" style="margin-top: 10px;"> 
                                          <div id="upload-demo"></div>
                                      </div>                     
                               </div>
                        
                           <div class="form-group notranslate">
                                <label for="is_super_market" class="col-sm-3 control-label">Is Super Market</label>
                                    <div class="col-sm-8" style="padding-top: 6px">
                                        <input name="is_super_market" type="checkbox" id="is_super_market" <?php if($data[6] == 1) echo 'checked="checked"';?>/>
                                         <br> <span id="issuper_market_error" class="show_required"></span> 
                                    </div>
                             </div>  
        <script type="text/javascript">
            var resize = $('#upload-demo').croppie({
                enableExif: true,
                enableOrientation: true,    
                viewport: { 
                     width: 400,
                    height: 170,
                    type: 'square' 
                },
                boundary: {
                     width: 400,
                    height: 400
                }
            });
            
            $('#category_image').on('change', function () { 
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
                        url: "/doora/adminpanel/View/category/croppie.php",
                        type: "POST",
                        data: {"category_image":img},
                        success: function (data) {
                          alert(data);
                            html = '<img src="' + img + '" />';
                            $('#imagename').val(data);
                            $("#preview-crop-image").html(html);
                        }
                    });
                });
            });
        </script>                  
                               
                             <div class="box-footer notranslate">
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
 <?php 
 include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/footer.php");?> 
 <script type="text/javascript">
  function categoryname()
                      {
                        var name=document.getElementById("category_name").value;
                        if(name)
                        {
                            $.ajax({
                              type: 'post',
                              url: '/doora/adminpanel/View/category/checkdata.php',
                              data: {
                                category_name:name
                              },
                              success: function (data) {
                               $('#category_nameerror').html(data);
                               if(data=="OK") 
                               {
                                return true;  
                               }
                               else
                               {
                                return false; 
                               }
                              }
                              });
                            /* }
                             else
                             {
                              $( '#category_nameerror' ).html("");
                              return false;
                             }*/

                        }
                   }   
                          function validateForm() {
                                    var categoryname = document.forms["addcategory"]["category_name"].value;
                                    var categoryimage = document.getElementById("category_image").value;
                                    if (categoryname.trim() == "") {
                                        document.getElementById('category_nameerror').innerHTML="Please Enter Category Name";
                                        return false;
                                      }
                                      
                                  }
         function validate() {
            if (document.getElementById('is_super_market').checked) {
                  if(confirm("are you sure you want to checked it?") == true )
                  {
                    $.ajax({
                              type: 'post',
                              url: '/doora/adminpanel/View/category/issuper.php',
                              data: {
                                is_super_market:name
                              },
                              success: function (data) {
                               $('#issuper_market_error').html(data);
                             }
                              });
                            /* }
                             else
                             {
                              $( '#category_nameerror' ).html("");
                              return false;
                             }*/

                        }
                  
                  else
                  {
                    return false;
                  }

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
                                   $_POST['imagename'];  
                                  }
                                ?>       