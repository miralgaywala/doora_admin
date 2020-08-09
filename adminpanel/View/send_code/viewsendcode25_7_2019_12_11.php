
    <section class="content">
      <div class="row">
        <div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Send Verification Email</h2></div>
        <div class="col-md-2">
                <br/>   
               <!-- <a href="http://localhost/sprookr/adminpanel/Controller/category/displaycategorycontroller.php" class="btn btn-default"><b><- Back</b></a>-->
               <!-- <button style="float: right;" onclick="backtag()" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button> -->
           <!-- <a href="/sprookr/adminpanel/View/category/addcategory.php" class="btn btn-primary">+ Add Category</a>-->
        </div>
      </div> 
      <script type="text/javascript">
        function sendcode_email(value)
      {
               $.ajax({
                       url:"../../View/send_code/viewsendcode.php",
                       method:"POST",
                       success:function(data)
                       {
                            $('.content-wrapper').html(data);
                             $(value).show();
                       }
                    })
      }
      </script>  
      <div class="alert alert-info alert-dismissible" id="not" style="display: none;">
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  This email is not exists
                 </div> 
                  <div class="alert alert-info alert-dismissible" id="send" style="display: none;">
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                 Email has been send successfully
                 </div>  
                 <div class="alert alert-info alert-dismissible" id="notsend" style="display: none;">
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                 Email is not delivered, please try again
                 </div> 
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <br>
              <!-- box-header -->
              <div class="box-body">
                <form class="form-horizontal" name="sendcode" id="sendcode" role="form" action="" method="post" enctype="multipart/form-data" >
                 

                            <div class="form-group notranslate">
                                <label for="tag_name" class="col-sm-3 control-label">Email Id<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <input type="email" name="email_name" id="email_name" class="form-control"/>
                                    <span id="email_nameerror" class="show_required"></span><br>
                                </div>
                            </div>
                           
                             </div>                               
                             <div class="box-footer  notranslate">
                                    <input type="button" name="sendcode_submit" style="margin-left: 5px;" value="Submit" class="btn btn-primary pull-right" id="sendcode_submit" onclick="return validateemail();"/>
                                   
                            </div>  
                           </div>
                         </form>
              </div>
            </div>              
    </section>
</div>

  <?php //include "../../View/header/footer.php";?>
 <script type="text/javascript">
                  
                      function validateemail() {
                                    var email_name = document.getElementById("email_name").value;
                                    var count=0;
                                    var reg = /^(([A-Za-z0-9]+_+)|([A-Za-z0-9]+\-+)|([A-Za-z0-9]+\.+)|([A-Za-z0-9]+\++))*[A-Za-z0-9]+@((\w+\-+)|(\w+\.))*\w{1,63}\.[a-zA-Z]{2,6}$/;
                                    if (email_name.trim() == "") {
                                        document.getElementById('email_nameerror').innerHTML="Please Enter Email Address";
                                        count++;
                                      }
                                      else
                                      {
                                          if(reg.test(email_name))
                                              {
                                                document.getElementById('email_nameerror').innerHTML="";
                                              }
                                              else
                                              {
                                                document.getElementById('email_nameerror').innerHTML="Please Enter Proper Email Address";
                                                count++;
                                              } 
                                      }
                                    
                                  if(count>0)
                                   {
                                    return false;
                                   }
                                   else
                                   {
                                      var count_id = "add";
                                      $.ajax({
                                           url:"../../Controller/send_code/sendcode_controller.php",
                                           method:"POST",
                                           data : {count_id:count_id,email_name:email_name},
                                           success:function(data)
                                           {
                                            console.log(data);
                                            sendcode_email(data);
                                           }
                                        })
                                   }
                                  }
</script> 

