
        <script type="text/javascript">
           function backoffer()
            {
         
            $.ajax({
                 url:"../../Controller/offer_type/displayoffercontroller.php",
                 method:"POST",
                 success:function(data)
                 {
                       $('.content-wrapper').html(data);
                      
                 }
            })
      }
      function listoffer(id)
      {
            hash_id = id;
            $.ajax({
                 url:"../../Controller/offer_type/displayoffercontroller.php",
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      $(hash_id).show();
                 }
              })
      }
      function existsoffer(data)
      {
         hash_id = data;
            $.ajax({
                   url:"../../View/offer_type/addoffer.php",
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
        <div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Add/Edit Offer Title</h2></div>
        <div class="col-md-2">
                <br/>   
               <!-- <a href="http://localhost/sprookr/adminpanel/Controller/category/displaycategorycontroller.php" class="btn btn-default"><b><- Back</b></a>-->
               <button style="float: right;" onclick="backoffer()" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>
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
                <form class="form-horizontal" name="addoffer" id="addoffer" role="form" action="" method="post" enctype="multipart/form-data" >
                 

                            <div class="form-group notranslate">
                                <label for="offer_title" class="col-sm-3 control-label">Offer Title<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <input name="offer_title" type="text" id="offer_title" class="form-control"/>
                                    <span id="offer_error" class="show_required"></span>
                                </div>
                            </div>
                           
                             </div>                               
                             <div class="box-footer  notranslate">
                                    <input type="submit" name="tag_submit" style="margin-left: 5px;" value="Submit" class="btn btn-primary pull-right" id="tag_submit" onclick="return validateForm();"/>
                                    <button class="btn btn-default pull-right" onclick="backoffer()">Cancel</button>
                            </div>  
                           </div>
                         </form>
              </div>
            </div>              
    </section>
</div>

  <?php //include "../../View/header/footer.php";?>
 <script type="text/javascript">
                  
                      function validateForm() {
                                    var offer_title = document.getElementById("offer_title").value;
                                    var count=0;
                                    
                                    if (offer_title.trim() == "") {
                                        document.getElementById('offer_error').innerHTML="Please Enter Offer Title";
                                        count++;
                                      }
                                      else
                                      {
                                        document.getElementById('offer_error').innerHTML="";
                                      }
                                    
                                  if(count>0)
                                   {
                                    return false;
                                   }
                                   else
                                   {
                                  
                                      var count_id = "add";
                          // window.location.href='../../Controller/tag/tag_controller.php?id='+bla+'&count_id=';
                                    $.ajax({
                                         url:"../../Controller/offer_type/offer_controller.php",
                                         method:"POST",
                                         data : {count_id:count_id,offer_title:offer_title},
                                         success:function(data)
                                         {
                                          if(data == "#add")
                                          {
                                              listoffer(data);
                                            }
                                            else
                                            {
                                              existsoffer(data);
                                            }
                                         }
                                      })
                                   }
                                  }
</script> 

 