
        <script type="text/javascript">
           function backtag()
            {
         
            $.ajax({
                 url:"../../Controller/tag/displaytagcontroller.php",
                 method:"POST",
                 success:function(data)
                 {
                       $('.content-wrapper').html(data);
                      
                 }
            })
      }
      function listtag(id)
      {
            hash_id = id;
            $.ajax({
                 url:"../../Controller/tag/displaytagcontroller.php",
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
<?php foreach ($edit_tag as $key => $data) {
  # code...
 ?>
    <section class="content">
      <div class="row">
        <div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Add/Edit Tag</h2></div>
        <div class="col-md-2">
                <br/>   
               <!-- <a href="http://localhost/sprookr/adminpanel/Controller/category/displaycategorycontroller.php" class="btn btn-default"><b><- Back</b></a>-->
               <button style="float: right;" onclick="backtag()" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>
           <!-- <a href="/sprookr/adminpanel/View/category/addcategory.php" class="btn btn-primary">+ Add Category</a>-->
        </div>
      </div>   
      <div class="alert alert-info alert-dismissible" id="exists" style="display: none;">
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    Tag has been alredy Exists
                 </div>   
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <br>
              <!-- box-header -->
              <div class="box-body">
                <form class="form-horizontal" name="addtag" id="addtag" role="form" action="" method="post" enctype="multipart/form-data" >
                 

                            <div class="form-group notranslate">
                                <label for="tag_name" class="col-sm-3 control-label">Tag<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                  <input type="hidden" name="tag_id" value="<?php echo $data['tag_id'];?>" id="tag_id">
                                    <input name="tag_name" type="text" id="tag_name" class="form-control" value="<?php echo $data['tag']; ?>" />
                                    <span id="tag_nameerror" class="show_required"></span>
                                </div>
                            </div>
                           
                             </div>                               
                             <div class="box-footer  notranslate">
                                    <input type="submit" name="tag_submit" style="margin-left: 5px;" value="Submit" class="btn btn-primary pull-right" id="tag_submit" onclick="return validateForm();"/>
                                    <button class="btn btn-default pull-right" onclick="backtag()">Cancel</button>
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
                                    var tag = document.getElementById("tag_name").value;
                                    var tag_id = document.getElementById("tag_id").value;
                                  
                                    var count=0;
                                    
                                    if (tag.trim() == "") {
                                        document.getElementById('tag_nameerror').innerHTML="Please Enter Tag Name";
                                        count++;
                                      }
                                      else
                                      {
                                        document.getElementById('tag_nameerror').innerHTML="";
                                      }
                                    
                                  if(count>0)
                                   {
                                    return false;
                                   }
                                   else
                                   {
                                      var count_id = "edit";
                       
                                      $.ajax({
                                           url:"../../Controller/tag/tag_controller.php",
                                           method:"POST",
                                           data : {count_id:count_id,tag:tag,tag_id:tag_id},
                                           success:function(data)
                                           {
                                         
                                            if(data == "#edit")
                                            {
                                                listtag(data);
                                              }
                                              else
                                              {
                                                
                                                existsedittag(tag_id,data);
                                              }
                                           }
                                        })
                                   }
                                  }
</script> 

