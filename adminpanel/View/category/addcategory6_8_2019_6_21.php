<script type="text/javascript">
   function backcategory()
      {
              
        $.ajax({
                 url:"../../Controller/category/displaycategorycontroller.php",
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      
                 }
              })
      }
      function existcategory(data)
      {
         hash_id = data;
            $.ajax({
                  url:"../../View/category/addcategory.php",
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      $(hash_id).show();
                      
                 }
              })
      } 
      function listcategory(id)
      {
            hash_id = id;
            $.ajax({
                url:"../../Controller/category/displaycategorycontroller.php",
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      $(hash_id).show();
                 }
              })
      } 
 </script>
    <section class="content">
      <div class="row">
        <div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Add/Edit Category</h2></div>
        <div class="col-md-2">
                <br/>   
               <button style="float: right;" onclick="backcategory()" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>
        </div>
      </div> 
       <div class="alert alert-info alert-dismissible" id="exists" style="display: none;">
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                   Catgeory has been alredy exists
                 </div>    
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <br>
              <div class="box-body">
                <form class="form-horizontal" name="addcategory" id="addcategory_form" role="form" action="" method="post" enctype="multipart/form-data" >
                  <div class="form-group notranslate">
                                <label for="category_name" class="col-sm-3 control-label">Category Name<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <input name="category_name" type="text" id="category_name" class="form-control"/>
                                    <span id="category_nameerror" class="show_required"></span><br>
                                </div>
                            </div>
                            <div class="form-group notranslate">
                                <label for="category_image" class="col-sm-3 control-label">Category Image<span class="show_required">*</span></label>
                                    <div class="col-sm-8">
                                        <input name="category_image" type="file" id="category_image" accept="image/*" style="margin-top: 10px;" />
                                        <span id="category_imageerror" class="show_required"></span><br>
                                          <input type="hidden" name="imagename" id="imagename">
                                          <br>
                                       <input type="button" id="btn-upload" class="btn btn-success" value="Upload Image" name="btn-upload">
                                      </div> 
                                        <div class="col-md-2" style="margin-top: 10px;"> </div>
                                      <div class="col-md-5" style="margin-top: 10px;">
                                        <div id="preview-crop-image" style="width:402px;height:172px;border-style: groove;border-width: thin;"></div>
                                     
                                      </div>  
                                       <div class="col-md-2" style="margin-top: 10px;"> 
                                          <div id="upload-demo" style="width:396px;height:402px;border-style: groove;border-width: thin;"></div>
                                      </div>                     
                               
                           </div> 
        <script type="text/javascript">
            var resize = $('#upload-demo').croppie({
                enableExif: true,
                enableOrientation: true, 
                enforceBoundary:true,
                viewport: { 
                     width: 394,
                    height: 170,
                    type: 'square' 
                },
                boundary: {
                     width: 394,
                    height: 400,
                },

            });
            
            $('#category_image').on('change', function () { 
                var reader = new FileReader();
                reader.onload = function (e) {
                    resize.croppie('bind',{
                        url: e.target.result,
                        zoom: 0
                    }).then(function(){
                         resize.croppie('setZoom', 1);
                        console.log('Complete');
                    });
                },
                reader.readAsDataURL(this.files[0]);
            });
            
            $('#btn-upload').on('click', function (ev) {
              if(document.getElementById("category_image").value == "") {
                var categoryimage = document.getElementById("category_image").value;
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
                    size:{
                      height:510,
                      width:1182
                    },

                    
                }).then(function (img) {
                  // var base64ImageContent = img.replace(/^data:image\/(png|jpg);base64,/, "");
                  // var blob = base64ToBlob(base64ImageContent, 'image/png');                
                  // var formData = new FormData();
                  // formData.append('picture', blob);
                    $.ajax({
                        url: "../../View/category/croppie.php",
                        type: "POST",
                       //  cache: false,
                       //  contentType: false,
                       //  processData: false,
                       //  data:formData,
                       data: {"category_image":img},
                        success: function (data) {
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
                          html = '<img src="' + img + '" style="border-style:ridge;width:400px;height:170px;"/>';
                            $('#imagename').val(data);
                            $("#preview-crop-image").html(html);
                         }
                          //   alert(data);
                            
                        }
                    });
                });
              }
            });
            // function base64ToBlob(base64, mime) 
            //   {
            //       mime = mime || '';
            //       var sliceSize = 1024;
            //       var byteChars = window.atob(base64);
            //       var byteArrays = [];

            //       for (var offset = 0, len = byteChars.length; offset < len; offset += sliceSize) {
            //           var slice = byteChars.slice(offset, offset + sliceSize);

            //           var byteNumbers = new Array(slice.length);
            //           for (var i = 0; i < slice.length; i++) {
            //               byteNumbers[i] = slice.charCodeAt(i);
            //           }

            //           var byteArray = new Uint8Array(byteNumbers);

            //           byteArrays.push(byteArray);
            //       }

            //       return new Blob(byteArrays, {type: mime});
            //   }
        </script>
                                                                                       
                             <div class="form-group notranslate">
                                <label for="is_super_market" class="col-sm-3 control-label">Is Super Market</label>
                                    <div class="col-sm-8" style="padding-top: 6px">
                                        <input name="is_super_market" type="checkbox" id="is_super_market" onclick="return validate();"/><br>
                                        <input name="is_super_market1" type="hidden" id="is_super_market1" value="0" />
                                        <span id="issuper_market_error" class="show_required"></span> 
                                    </div>
                                   
                             </div>  

                             <div class="box-footer  notranslate">
                                    <input type="button" name="category_submit" style="margin-left: 5px;" class="btn btn-primary pull-right" value="Submit" id="category_submit" onclick="return validateForm();"/>
                                    <button type="button" class="btn btn-default pull-right" onclick="backcategory()">Cancel</button>
                            </div>  
                           </div>
                         </form>
              </div>
            </div>
          </div>  
       
    </section>
</div>

 <script type="text/javascript">
                      function validateForm() {
                                    var categoryname = document.getElementById("category_name").value;
                                    var categoryimage = document.getElementById("category_image").value;
                                    var imagename = document.getElementById("imagename").value;
                                    var is_super_market = document.getElementById("is_super_market1").value;
                                 
                                    var count=0;
                                    if (categoryname.trim() == "") {
                                        document.getElementById('category_nameerror').innerHTML="Please Enter Category Name";
                                        count++;
                                      }
                                      else
                                      {
                                        document.getElementById('category_nameerror').innerHTML="";
                                      }
                                    if(categoryimage == "")
                                      {
                                        document.getElementById("category_imageerror").innerHTML="Please Select Image";
                                       count++;
                                      }
                                      else
                                      {
                                        document.getElementById("category_imageerror").innerHTML="";
                                      }
                                     if(imagename == "")
                                    {
                                      document.getElementById("category_imageerror").innerHTML="Please Select Image";
                                        count++;
                                    }
                                    else
                                    {
                                      document.getElementById("category_imageerror").innerHTML="";
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
                                        url: '../../Controller/category/category_controller.php',
                                        data: {count_id:count_id,categoryname:categoryname,imagename:imagename,is_super_market:is_super_market},
                                        success: function (data) {
                                       
                                         if(data == "#add")
                                          {
                                              listcategory(data);
                                            }
                                            else
                                            {
                                              existcategory(data);
                                            }
                                     }
                                      });
                                   }  
                                  }
                                  
         function validate() {
            if (document.getElementById('is_super_market').checked) {
                  if(confirm("are you sure you want to checked it?") == true )
                  {
                    $.ajax({
                              type: 'post',
                              url: '../../View/category/issuper.php',
                              data: {
                                is_super_market:name
                              },
                              success: function (data1) {

                               //$('#issuper_market_error').html(data1);
                               document.getElementById("is_super_market1").value = "1";
                                 $('#issuper_market_error').html(data1);

                              }
                            });
                        }          
                  else
                  {
                    return false;
                  }

            }
            else
            {
              $.ajax({
                              type: 'post',
                              url: '../../View/category/issuper.php',
                              data: {
                                is_super_market:name
                              },
                              success: function (data1) {
                                 document.getElementById("is_super_market1").value = "0";
                                    $('#issuper_market_error').hide();
                              }
                            });
            } 
        }  
        
</script>
 