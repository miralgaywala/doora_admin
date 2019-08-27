 <section class="content">
      <div class="row">
        <div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Edit Business Image</h2></div>
        <div class="col-md-2">
                <br/>   
              <!--  <button style="float: right;" onclick="backcategory()" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button> -->
        </div>
      </div> 
       <div class="alert alert-info alert-dismissible" id="exists" style="display: none;">
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                   Business image has been uploaded successfully
                 </div>    
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <br>
              <div class="box-body">
                <form class="form-horizontal" name="addcategory" id="addcategory_form" role="form" action="" method="post" enctype="multipart/form-data" >
                            <div class="form-group notranslate">
                                <label for="category_image" class="col-sm-3 control-label">Business Image<span class="show_required">*</span></label>
                                    <div class="col-sm-8">
                                        <input name="category_image" type="file" id="category_image" accept="image/*" style="margin-top: 10px;" />
                                        <span id="category_imageerror12" class="show_required"></span>
                                        <span id="category_imageerror" class="show_required"></span><br>
                                        <input type="hidden" name="business_img_value" id="business_img_value">
                                      <!--  <input type="button" id="btn-upload" class="btn btn-success" value="Upload Image" name="btn-upload"> -->
                                      </div> 
                                        <div class="col-md-2" style="margin-top: 10px;"> </div>
                                      <div class="col-md-5" style="margin-top: 10px;">
                                         <?php $time = date("H:i:s"); ?>
                                        <div id="preview-crop-image" style="width:367px;height:366px;border-style: groove;border-width: thin;"><img src='../../../images/profile/businessdefault.jpg<?php echo "?time=".$time; ?>' style="width:364px;height:364px;" /></div>
                                      </div>  
                                       <div class="col-md-2" style="margin-top: 10px;">
                                        <!-- <div id="upload-demo" style="width:365px;height:365px;border-style: groove;border-width: thin;"></div> -->
                                      </div>                     
                               
                           </div> 
        <script type="text/javascript">
            var img_data;
            $('#category_image').on('change', function () {
                var reader = new FileReader();
                reader.onload = function (e) {
                  var i = new Image(); 
                  i.onload = function(){

                    image_height = i.height;
                    image_width = i.width;
                    if(image_width < 462 && image_height < 462)
                    {
                        $.confirm({
                                title:'Alert',
                                content: 'Please upload image bigger than 462x462 px dimension.',
                                buttons: {
                                  OK: function(){
                                     $("#category_image").val("");
                                    }
                                }
                            });
                    }
                    else if(image_width > 1500 && image_height > 1500)
                   {
                    $.confirm({
                                title:'Alert',
                                content: 'Please upload image smaller than 1500x1500 px dimension.',
                                buttons: {
                                  OK: function(){
                                     $("#category_image").val("");
                                    }
                                }
                            });
                   }
                   else
                   {
                       if(image_mb_size <= 4718592)
                          {
                            if(image_height == image_width)
                            {
                                  img_data = e.target.result;
                                  // img_data = img;
                                  html = '<img src="' + img_data + '" style="border-style:ridge;width:364px;height:364px;"/>';
                                  $("#preview-crop-image").html(html);
                                  $("#business_img_value").val(1);
                            }
                            else
                            {
                                $.confirm({
                                      title:'Alert',
                                      content: 'Please upload square image',
                                      buttons: {
                                        OK: function(){
                                          $("#category_image").val("");
                                          }
                                      }
                                  });
                            }
                          }
                          else
                          {
                            $.confirm({
                                      title:'Alert',
                                      content: 'Please upload image smaller than 4.5mb in size.',
                                      buttons: {
                                        OK: function(){
                                          $("#category_image").val("");
                                          }
                                      }
                                  });
                          }
                   }
                  };

                  i.src = e.target.result; 
                  
                },
                reader.readAsDataURL(this.files[0]);
                image_mb_size = this.files[0].size;
            });
            
            $('#btn-upload').on('click', function (ev) {
              if(document.getElementById("category_image").value == "") {
                var categoryimage = document.getElementById("category_image").value;
                              if(categoryimage == "")
                                      {
                                        document.getElementById("category_imageerror").innerHTML="Please Select Image";
                                      }
                                      else
                                      {
                                        document.getElementById("category_imageerror").innerHTML="";
                                      }
              }
              else
              {
                image_size = "original";
                resize.croppie('result', {
                   type: 'canvas',
                    size:image_size,

                    
                }).then(function (img) {
                  // img_data = img;
                   html = '<img src="' + img + '" style="border-style:ridge;width:364px;height:364px;"/>';
                            $("#preview-crop-image").html(html);
                            $("#business_img_value").val(1);
                });
              }
            });
        </script>
                             <div class="box-footer  notranslate">
                                    <input type="button" name="category_submit" style="margin-left: 5px;" class="btn btn-primary pull-right" value="Submit" id="category_submit" onclick="submit_image();"/>
                                   <!--  <button type="button" class="btn btn-default pull-right" onclick="backcategory()">Cancel</button> -->
                            </div>  
                           </div>
                         </form>
              </div>
            </div>
          </div>  
       
    </section>
</div>
<script type="text/javascript">
  function submit_image()
  {
    var data_img = $("#business_img_value").val();
    if(data_img == "")
    {
      document.getElementById("category_imageerror").innerHTML="Please Select Image";
      topFunction();
    }
    else
    { 
          $.ajax({
                        url: "../../View/business_image/croppie.php",
                        type: "POST",
                       //  cache: false,
                       //  contentType: false,
                       //  processData: false,
                       //  data:formData,
                       data: {"category_image":img_data},
                        success: function (data) {
                          console.log(data);
                         if(data == "not")
                         {
                              $.confirm({
                                title:'Alert',
                                content: 'something went wrong with image uploading, Please try again !!',
                                buttons: {
                                  OK: {
                                    }
                                }
                            });
                         }
                         else
                         {
                          $("#exists").show();
                         }
                          //   alert(data);
                            
                        }
                    });
        }
  }
</script>