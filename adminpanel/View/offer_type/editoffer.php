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
      function existseditoffer(offer_id,data)
      {
         hash_id = data;
            $.ajax({
                url:"../../Controller/offer_type/editoffer_controller.php?id="+offer_id,
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      $(hash_id).show();
                      
                 }
              })
      }
        </script>
<?php foreach ($edit_offer as $key => $data) {

 ?>
    <section class="content">
      <div class="row">
        <div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Add/Edit offer Title</h2></div>
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
                                    <input type="hidden" name="offer_id" value="<?php echo $data['offer_id'];?>" id="offer_id"/>
                                    <input name="offer_title" type="text" id="offer_title" class="form-control" value="<?php echo $data['offer_title']; ?>" />
                                    <span id="offer_error" class="show_required"></span><br>
                                </div>
                            </div> 
                            <?php } ?>         
                           
                             </div>                               
                              <div class="box-footer  notranslate">
                                    <input type="submit" name="offer_submit" style="margin-left: 5px;" class="btn btn-primary pull-right" value="Submit" id="tag_submit" onclick="return validateForm();"/>
                                    <input type="button" class="btn btn-default pull-right" onclick="backoffer()" value="Cancel"></button>
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
                                    var offer = document.getElementById("offer_title").value;
                                    var offer_id = document.getElementById("offer_id").value;
                                    var count=0;
                                    if (offer.trim() == "") {
                                      //alert(categoryname);
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
                                   var count_id = "edit";
                       
                                      $.ajax({
                                           url:"../../Controller/offer_type/offer_controller.php",
                                           method:"POST",
                                           data : {count_id:count_id,offer:offer,offer_id:offer_id},
                                           success:function(data)
                                           {
                                             
                                            if(data == "#edit")
                                            {
                                                listoffer(data);
                                              }
                                              else
                                              {
                                                existseditoffer(offer_id,data);
                                              }
                                           }
                                        })
                                   }
                                  }
</script> 

