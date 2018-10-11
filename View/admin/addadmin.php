<?php //include("View/header.php");
include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/header.php");
 //include("View/sidemenu.php");
include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/sidemenu.php");
 ?>
 
 <?php 
        include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/Controller/admin/admin_controller.php");
        $controller=new admin_controller();
        $controller->add_admin();       
        ?>

<script>
        $(document).ready(function(){
            $("#role").select2(); 
        });
    </script>

<!--Main Content -->
    <section class="content">
      <div class="row">
        <div class="col-md-10" style="float: left;"> <h2>Add/Edit Admin</h2></div>
        <div class="col-md-2">
                <br/>   
               <!-- <a href="http://localhost/doora/adminpanel/Controller/category/displaycategorycontroller.php" class="btn btn-default"><b><- Back</b></a>-->
             <button style="float: right;" onclick="window.location.href='/doora/adminpanel/Controller/admin/displayadminlist_controller.php'" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>

           <!-- <a href="/doora/adminpanel/View/category/addcategory.php" class="btn btn-primary">+ Add Category</a>-->
        </div>
      </div>      
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <br>
              <!-- box-header -->
              <div class="box-body">
                <form class="form-horizontal" name="addadmin" id="addadmin_form" role="form" action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm();">
                  <div class="form-group notranslate">
                                <label for="profile_image" class="col-sm-3 control-label">Profile Image<span class="show_required">*</span></label>
                                    <div class="col-sm-8">
                                        <input name="profile_image" type="file" id="profile_image" accept="image/*" onchange="ImagePreview();" style="margin-top: 6px;">
                                        <div id="AdminPicture" style="margin:10px 0 0 0" ></div><br>
                                        <span id="profile_imageerror" class="show_required"></span>                                           
                                   </div>
                             </div>   
                  <div class="form-group notranslate">
                                <label for="role" class="col-sm-3 control-label">Role<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <select id="role" name="role" class="form-control">
                                       <option value="0">Select Role</option>
                                       <option value="1">Admin</option>
                                       <option value="2">Sub Admin</option>
                                  </select>
                                  <span id="roleerror" class="show_required"></span>
                                </div> 
                            </div>
                          <div class="form-group notranslate">
                                <label for="user_name" class="col-sm-3 control-label">Username<span class="show_required">*</span></label>
                                <div class="col-sm-8">
                                    <input name="user_name" type="text" id="user_name" class="form-control"/>
                                    <span id="user_nameerror" class="show_required"></span>
                                </div>
                            </div>
                            <div class="form-group notranslate">
                                <label for="password" class="col-sm-3 control-label">Password<span class="show_required">*</span></label>
                                <div class="col-sm-8">
                                    <input name="password" type="text" id="password" class="form-control"/>
                                    <span id="passworderror" class="show_required"></span>  
                                </div>
                            </div>
                            <div class="form-group notranslate">
                                <label for="admin_name" class="col-sm-3 control-label">Admin Name<span class="show_required">*</span></label>
                                <div class="col-sm-8">
                                    <input name="admin_name" type="text" id="admin_name" class="form-control"/>
                                    <span id="admin_nameerror" class="show_required"></span>  
                                </div>
                            </div>
                            <div class="form-group notranslate">
                                <label for="email_address" class="col-sm-3 control-label">Email Address<span class="show_required">*</span></label>
                                <div class="col-sm-8">
                                    <input name="email_address" type="text" id="email_address" class="form-control"/>
                                    <span id="email_addresserror" class="show_required"></span>  
                                </div>
                            </div>
                            <div class="form-group notranslate">
                                <label for="phone_no" class="col-sm-3 control-label">Phone No.<span class="show_required">*</span></label>
                                <div class="col-sm-8">
                                    <input name="phone_no" type="text" id="phone_no" class="form-control"/>
                                    <span id="phone_noerror" class="show_required"></span>  
                                </div>
                            </div>                            
                             <div class="box-footer  notranslate">
                                    <input type="submit" name="admin_submit" style="margin-left: 5px;" value="Submit" class="btn btn-primary pull-right" id="subcategory_submit"/>
                                    <button type="button" class="btn btn-default pull-right" onclick="document.getElementById('addadmin_form').reset();window.location.href='/doora/adminpanel/Controller/admin/displayadminlist_controller.php'">Cancel</button>
                            </div> 
                           </div>
                         </form>
              </div>
            </div>
          </div>  
       
    </section>
</div>

 <?php //include("View/footer.php");
 include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/footer.php");?> 
 <script type="text/javascript">
         function ImagePreview() { 
             var PreviewIMG = document.getElementById('AdminPicture'); 
             var UploadFile    =  document.getElementById('profile_image').files[0]; 
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
             function validateForm() {
                                    var role = document.getElementById("role").value;
                                    var username = document.getElementById("user_name").value;
                                    var password = document.getElementById("password").value;
                                    var admin_name = document.getElementById("admin_name").value;
                                    var email_address = document.getElementById("email_address").value;
                                    var phone_no = document.getElementById("phone_no").value;
                                    var profile_image = document.getElementById("profile_image").value;
                                    var count=0;
                                    if(role == "0")
                                    {
                                      document.getElementById('roleerror').innerHTML="Please Select Role";
                                       count++;
                                    }
                                    else
                                      {
                                        document.getElementById('roleerror').innerHTML="";
                                      }
                                    if (username.trim() == "") {
                                        document.getElementById('user_nameerror').innerHTML="Please Enter User Name";
                                        count++;
                                      }
                                      else
                                      {
                                        document.getElementById('user_nameerror').innerHTML="";
                                      }
                                      if (password.trim() == "") {
                                        document.getElementById('passworderror').innerHTML="Please Enter Password";
                                        count++;
                                      }
                                      else
                                      {
                                        document.getElementById('passworderror').innerHTML="";
                                      }
                                      if (admin_name.trim() == "") {
                                        document.getElementById('admin_nameerror').innerHTML="Please Enter Admin Name";
                                        count++;
                                      }
                                      else
                                      {
                                        document.getElementById('admin_nameerror').innerHTML="";
                                      }
                                      if (email_address.trim() == "") {
                                        document.getElementById('email_addresserror').innerHTML="Please Enter Email Address";
                                        count++;
                                      }
                                      else
                                      {
                                        document.getElementById('email_addresserror').innerHTML="";
                                      }
                                      if (phone_no.trim() == "") {
                                        document.getElementById('phone_noerror').innerHTML="Please Enter Phone Number";
                                        count++;
                                      }
                                      else
                                      {
                                        document.getElementById('phone_noerror').innerHTML="";
                                      }
                                    if(profile_image == "")
                                      {
                                        document.getElementById("profile_imageerror").innerHTML="Please Select Image";
                                       count++;
                                      }
                                      else
                                      {
                                        document.getElementById("profile_imageerror").innerHTML="";
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
                            if(isset($_POST['admin_submit']) && !empty($_POST['admin_submit'])){
                                  $role =$_POST['role'];
                                  $user_name = $_POST['user_name'];
                                  $password=$_POST['password'];
                                  $admin_name=$_POST['admin_name'];
                                  $email_address = $_POST['email_address'];
                                  $phone_no=$_POST['phone_no'];
                                  $imagename = $_FILES['profile_image']['name'];
                                  $source = $_FILES['profile_image']['tmp_name'];
                                  
                                  $target = $_SERVER['DOCUMENT_ROOT']."/doora/images/profile/" . $imagename; 
                                 
                                  move_uploaded_file($source, $target);
                                  $imagepath = $imagename;
                                 
                                  $path="/doora/images/profile_image/" . $imagepath; 
                                  $save = $_SERVER['DOCUMENT_ROOT'].$path;//This is the new file you saving
                                  $_FILES['profile_image']= $imagepath;

                                  $file = $_SERVER['DOCUMENT_ROOT']."/doora/images/profile/" . $imagepath; //$_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/images/". $imagepath; //This is the original file
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
                       
 