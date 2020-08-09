<link href="../../../css/intlTelInput.css" rel="stylesheet" media="screen">
<script src="../../../js/intlTelInput.js"></script>
<script>
  $( document ).ready(function() {
              $("#phone").intlTelInput();
              });
</script>
<style type="text/css">
  .intl-tel-input .flag-dropdown
  {

    left: 15px;
    top: 1px;
    height: 30px;

  }
  .intl-tel-input
  {
    width: 100%;
    padding: 0px;
    height: 100%;
  }
</style>
<script type="text/javascript">
  function backbusiness()
      {
              
            $.ajax({
                 url:"../../Controller/business/displaybusinesslist_controller.php",
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      
                 }
              })
      }
</script>
<section class="content">
      <div class="row">
        <div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Edit Business User Detail</h2></div>
        <div class="col-md-2">
                <br/>   
               <!-- <a href="http://localhost/sprookr/adminpanel/Controller/category/displaycategorycontroller.php" class="btn btn-default"><b><- Back</b></a>-->
               <button style="float: right;" onclick="backbusiness()" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>
           <!-- <a href="/sprookr/adminpanel/View/category/addcategory.php" class="btn btn-primary">+ Add Category</a>-->
        </div>
      </div>   
      <div class="alert alert-info alert-dismissible" id="exists" style="display: none;">
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    Offer has been alredy exists
                 </div>   
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <br>
              <!-- box-header -->
              <div class="box-body">
               <!--  <?php echo "<pre>"; print_r($result); echo "</pre>"; ?> -->
                <?php foreach ($result as $key => $data) {
 
                ?>
                <form class="form-horizontal" name="editbusiness" id="editbusiness" role="form" action="" method="post" enctype="multipart/form-data" >
                 <!--  <?php echo "<pre>"; print_r($result); echo "</pre>"; ?> -->
                            <div class="form-group notranslate">
                                <label for="profile_image" class="col-sm-3 control-label">Profile Image<span class="show_required">*</span></label>
                                    <div class="col-sm-8">
                                      <?php $time = date("H:i:s"); ?>
                                        <input name="profile_image" type="file" id="profile_image" accept="image/*" onchange="ImagePreview();" style="margin-top: 6px;">
                                        <?php $image = "../../../images/profile/".$data['photo']."?time=".$time; ?>
                                        <div id="AdminPicture" style="background-image:url('<?php echo $image; ?>');margin:10px 0 0 0;" ></div><br>
                                        <span id="profile_imageerror" class="show_required"></span>    
                                        <input type="hidden" name="profile_pic" id="profile_pic" value="<?php echo $data['photo']; ?>">                                      
                                   </div>
                             </div>  
                             <input type="hidden" name="user_id" id="user_id" value="<?php echo $data['user_id']; ?>">
                            <div class="form-group notranslate">
                                <label for="company_name" class="col-sm-3 control-label">Company Name<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <input name="company_name" type="text" id="company_name" class="form-control" value="<?php echo $data['business_name']; ?>" />
                                    <span id="company_name_error" class="show_required"></span>
                                </div>
                            </div>

                            <div class="form-group notranslate">
                                <label for="contact_number" class="col-sm-3 control-label">Contact Number<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <input name="contact_number" type="tel" id="phone" class="form-control" style="padding-left: 60px;" value="<?php echo $data['mobile_no']; ?>" />
                                    <span id="contact_number_error" class="show_required"></span>
                                </div>
                            </div>
                            <div class="form-group notranslate">
                                <label for="website_url" class="col-sm-3 control-label">Website Url<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <input name="website_url" type="text" id="website_url" class="form-control" value="<?php echo $data['website_url']; ?>" />
                                    <span id="website_url_error" class="show_required"></span>
                                </div>
                            </div>
                            <!-- <div class="form-group notranslate">
                                <label for="address" class="col-sm-3 control-label">Address<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <input name="address" type="text" id="address" class="form-control" value="<?php echo $data['address']; ?>" />
                                    <span id="address_error" class="show_required"></span>
                                </div>
                            </div> -->
                           <div class="form-group notranslate">
                                <label for="super_market" class="col-sm-3 control-label">Is super store?</label>
                                    <div class="col-sm-8" style="padding-top: 6px">
                                        <input name="super_market" type="checkbox" id="super_market"  <?php if($data['is_super_market'] == 1) echo 'checked="checked"';?> /><br>
                                        <span id="super_market_error" class="show_required"></span> 
                                    </div>
                                   
                             </div>  
                             <div class="form-group notranslate">
                                <label for="pet_friedly" class="col-sm-3 control-label">Is pet friendly?</label>
                                    <div class="col-sm-8" style="padding-top: 6px">
                                        <input name="pet_friedly" type="checkbox" id="pet_friedly"  <?php if($data['is_pet_friendly'] == 1) echo 'checked="checked"';?>/><br>
                                        <span id="pet_friedly_error" class="show_required"></span> 
                                    </div>
                                   
                             </div>  
                            <!--  <input type="hidden" name="lattitude" id="lattitude" value="<?php echo $data['latitude']; ?>">

                                    <input type="hidden" name="longitude" id="longitude" value="<?php echo $data['longitude']; ?>"> -->
                             </div>
                             <?php } ?>                               
                             <div class="box-footer  notranslate">
                                    <input type="button" name="business_submit" style="margin-left: 5px;" value="Submit" class="btn btn-primary pull-right" id="business_submit" onclick="validateForm()"/>
                                    <button class="btn btn-default pull-right" onclick="backbusiness()">Cancel</button>
                            </div>  
                           </div>
                         </form>
              </div>
            </div>              
    </section>
</div>
<script type="text/javascript">
  function listbusiness(data)
      {
            hash_id = data;
            $.ajax({
                 url:"../../Controller/business/displaybusinesslist_controller.php",
                 method:"POST",
                 data:"",
                 cache:false,
                 success:function(data)
                 {
                     
                      $('.content-wrapper').html(data);
                      $(hash_id).show();
                 },
              })
      }
   function ImagePreview() { 
             var PreviewIMG = document.getElementById('AdminPicture'); 
             var UploadFile    =  document.getElementById('profile_image').files[0]; 
             $("#profile_pic").val(UploadFile.name);
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
 
 <script type="text/javascript">
    

            $(document).on('keyup', "#address", function(e) {

              var input = document.getElementById(this.id);

              var autocomplete = new google.maps.places.Autocomplete(input);

              $(".pac-container").show();

              $(".pac-container").css('z-index', '200000');

              google.maps.event.addListener(autocomplete, 'place_changed', function() {

                  var place = autocomplete.getPlace();

                  var latitude = place.geometry.location.lat();

                  var longitude = place.geometry.location.lng();

                    $('#lattitude').val(latitude);

                    $('#longitude').val(longitude);

              });

          });
            function validateForm() {
                                    var profile_pic = document.getElementById("profile_pic").value;
                                    var company_name = document.getElementById("company_name").value;
                                    var contact_number = document.getElementById("phone").value;
                                    var website_url = document.getElementById("website_url").value;
                                    // var address = document.getElementById("address").value;
                                    // var lat = document.getElementById('lattitude').value;
                                    // var log = document.getElementById('longitude').value;
                                      var form = $('#editbusiness')[0]; // You need to use standard javascript object here
                                      var formData = new FormData(form);
                                     var user_id = document.getElementById('user_id').value;
                                     var super_market = 0;
                                      var pet_friendly = 0;
                                    var count=0;
                                    if ($('#super_market').is(":checked"))

                                    {

                                      super_market = 1;

                                    }

                                     if ($('#pet_friedly').is(":checked"))

                                    {

                                      pet_friendly = 1;

                                    }

                                    if (company_name.trim() == "") {
                                        document.getElementById('company_name_error').innerHTML="Please Enter Company Name";
                                        count++;
                                      }
                                      else
                                      {
                                        document.getElementById('company_name_error').innerHTML="";
                                      }
                                      if (contact_number.trim() == "") {
                                        document.getElementById('contact_number_error').innerHTML="Please Enter Contact Number";
                                        count++;
                                      }
                                      else
                                      {
                                        document.getElementById('contact_number_error').innerHTML="";
                                      }
                                      if (website_url.trim() == "") {
                                        document.getElementById('website_url').innerHTML="Please Enter Website Url";
                                        count++;
                                      }
                                      else
                                      {
                                        document.getElementById('website_url').innerHTML="";
                                      }
                                      // if (address.trim() == "") {
                                      //   document.getElementById('address_error').innerHTML="Please Enter Address";
                                      //   count++;
                                      // }
                                      // else
                                      // {
                                      //   document.getElementById('address_error').innerHTML="";
                                      // }
                                    
                                  if(count>0)
                                   {
                                    return false;
                                   }
                                   else
                                   {
                                      var count_id = "edit_business";
                                      formData.append('count_id',count_id);
                                      formData.append('profile_pic',profile_pic);
                                      formData.append('company_name',company_name);
                                      formData.append('contact_number',contact_number);
                                      formData.append('website_url',website_url);
                                      // formData.append('address',address);
                                      // formData.append('lat',lat);
                                      // formData.append('log',log);
                                      formData.append('user_id',user_id);
                                      formData.append('super_market',super_market);
                                      formData.append('pet_friendly',pet_friendly);
                                      $.ajax({
                                           url:"../../Controller/business/business_controller.php",
                                           data:formData, 
                                           processData: false,
                                            contentType: false,
                                            method: 'post',
                                           success:function(data)
                                           {
                                            if(data == "#update")
                                            {

                                                listbusiness(data);
                                              }
                                              else
                                              {
                                                
                                                listbusiness(data);
                                              }
                                           }
                                        })
                                   }
                                  }
 </script>