
        <script type="text/javascript">
           function backdoora_dollor_terms()
            {
         
            $.ajax({
                url:"../../Controller/doora_dollor_terms/displaydoora_dollor_terms.php",
                 method:"POST",
                 success:function(data)
                 {
                       $('.content-wrapper').html(data);
                      
                 }
            })
      }
      function listdoora_dollor_terms(id)
      {
            hash_id = id;
            $.ajax({
                 url:"../../Controller/doora_dollor_terms/displaydoora_dollor_terms.php",
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      $(hash_id).show();
                 }
              })
      }
      function existsedittag(tag_id,data)
      {
         hash_id = data;
            $.ajax({
                 url:"../../Controller/tag/edittag_controller.php?id="+tag_id,
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
<?php foreach ($detail_doora_dollor_terms as $key => $data) {
 ?>
    <section class="content">
      <div class="row">
        <div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Add/Edit Dora Dollor terms</h2></div>
        <div class="col-md-2">
                <br/>   
               <!-- <a href="http://localhost/sprookr/adminpanel/Controller/category/displaycategorycontroller.php" class="btn btn-default"><b><- Back</b></a>-->
               <button style="float: right;" onclick="backdoora_dollor_terms()" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>
           <!-- <a href="/sprookr/adminpanel/View/category/addcategory.php" class="btn btn-primary">+ Add Category</a>-->
        </div>
      </div>   
      <div class="alert alert-info alert-dismissible" id="exists" style="display: none;">
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    Doora dollor terms has been alredy Exists
                 </div>   
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <br>
              <!-- box-header -->
              <div class="box-body">
                <form class="form-horizontal" name="addtag" id="addtag" role="form" action="" method="post" enctype="multipart/form-data" >
                 

                            <div class="form-group notranslate">
                                <label for="doora_dollor_terms_title" class="col-sm-3 control-label">Title<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                  <input type="hidden" name="doora_dollor_terms_id" value="<?php echo $data['id'];?>" id="doora_dollor_terms_id">
                                    <input name="doora_dollor_terms_title" type="text" id="doora_dollor_terms_title" class="form-control" value="<?php echo $data['title']; ?>" />
                                    <span id="doora_dollor_terms_titleerror" class="show_required"></span>
                                </div>
                            </div>
                            <div class="form-group notranslate">
                                <label for="doora_dollor_terms_desc" class="col-sm-3 control-label">Description<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <textarea name="doora_dollor_terms_desc" type="text" id="doora_dollor_terms_desc" class="form-control"><?php echo $data['doora_dollar_tearms_desc']; ?></textarea>
                                    <span id="doora_dollor_terms_descerror" class="show_required"></span>
                                </div>
                            </div>

                           
                             </div>                               
                             <div class="box-footer  notranslate">
                                    <input type="submit" name="tag_submit" style="margin-left: 5px;" value="Submit" class="btn btn-primary pull-right" id="tag_submit" onclick="return validateForm();"/>
                                    <button class="btn btn-default pull-right" onclick="backdoora_dollor_terms()">Cancel</button>
                            </div>  
                           </div>
                         </form>
              </div>
            <?php } ?>
            </div>              
    </section>
</div>

  <?php //include "../../View/header/footer.php";?>
 <script type="text/javascript">
                  
                      function validateForm() {
                                    var doora_dollor_terms_title = document.getElementById("doora_dollor_terms_title").value;
                                    var doora_dollor_terms_desc = document.getElementById("doora_dollor_terms_desc").value;
                                    var doora_dollor_terms_id = document.getElementById("doora_dollor_terms_id").value;
                                  
                                    var count=0;
                                    
                                    if (doora_dollor_terms_title.trim() == "") {
                                        document.getElementById('doora_dollor_terms_titleerror').innerHTML="Please Enter Title";
                                        count++;
                                      }
                                      else
                                      {
                                        document.getElementById('doora_dollor_terms_titleerror').innerHTML="";
                                      }
                                      if (doora_dollor_terms_desc.trim() == "") {
                                        document.getElementById('doora_dollor_terms_descerror').innerHTML="Please Enter Description";
                                        count++;
                                      }
                                      else
                                      {
                                        document.getElementById('doora_dollor_terms_descerror').innerHTML="";
                                      }
                                    
                                  if(count>0)
                                   {
                                    return false;
                                   }
                                   else
                                   {
                                      var count_id = "edit";
                       
                                      $.ajax({
                                           url:"../../Controller/doora_dollor_terms/doora_dollor_terms_controller.php",
                                           method:"POST",
                                           data : {count_id:count_id,doora_dollor_terms_title:doora_dollor_terms_title,doora_dollor_terms_desc:doora_dollor_terms_desc,doora_dollor_terms_id:doora_dollor_terms_id},
                                           success:function(data)
                                           {
                                          console.log(data);
                                            if(data == "#edit")
                                            {
                                                listdoora_dollor_terms(data);
                                              }
                                              else
                                              {
                                                
                                              }
                                           }
                                        })
                                   }
                                  }
</script> 

