<?php
require_once "connection.php";
$qy = "select * from merchant_about_web where id=".$_POST['eid'];
$str1 = mysqli_query($cn,$qy);
$res=mysqli_fetch_array($str1);
?> 

<section class="content-header" id="app_div1"> 
  <h4>Update Merchant About Section</h4>
    <ol class="breadcrumb">
      <button class="btn btn-primary" onclick="back();" style="margin-left: 150px;">Back</i></button>
    </ol>
</section>

<section class="content">
  <div class="box" style="margin-top: -1px">
    <form role="form" method="post" enctype="multipart/form-data" id="mer_web_frm">
      <div class="box-body">

        <div class="form-group">
          <label for="category">Image1</label>
          <input type="file" name="mer_im_1" value="<?php echo $res['image1']; ?>" class="form-control" id="m_cimg">
        </div>

         <div class="row">
          <div class="col-md-6">
          <?php
          if($res['image1']=="")
          {
            ?>
            <img src="<?= NO_IMAGE_PATH ?>"  class="m_cimg" width="100px" height="170px">
            <?php
          }
          else
          {
            ?>
            <img src="<?php echo IMAGE_SRC.$res['image1']; ?>?<?=rand(1,32000)?>"  class="m_cimg" width="100px" height="170px">
            <?php
          }
          ?>
          </div>
        </div><br>


        <div class="form-group">
          <label for="category">Image1 Title</label>
          <input type="text" name="m_title1" value="<?php echo $res['image1_title']; ?>" class="form-control">
          <!-- <textarea id="m_editor_1" name="m_image1_title" rows="10" cols="80"><?php echo $res['image1_title']; ?></textarea> -->
        </div>

        <div class="form-group">
          <label for="category">Image1 Description</label>
          <textarea id="m_editor_2" name="m_image1_desc" rows="10" cols="80"><?php echo $res['image1_desc']; ?></textarea>
        </div>

        <div class="form-group">
          <label for="category">Image2</label>
          <input type="file" name="mer_im_2" value="<?php echo $res['image2']; ?>" class="form-control" id="m_cimg1">
        </div>

         <div class="row">
          <div class="col-md-6">
            
          <?php
          if($res['image2']=="")
          {
            ?>
            <img src="<?= NO_IMAGE_PATH ?>"  class="m_cimg1" width="100px" height="170px">
            <?php
          }
          else
          {
            ?>
            <img src="<?php echo IMAGE_SRC.$res['image2']; ?>?<?=rand(1,32000)?>"  class="m_cimg1" width="100px" height="170px">
            <?php
          }
          ?>
          </div>
        </div><br>


        <div class="form-group">
          <label for="category">Image2 Title</label>
          <input type="text" name="m_title2" value="<?php echo $res['image2_title']; ?>" class="form-control">
          <!-- <textarea id="m_editor_3" name="m_image2_title" rows="10" cols="80"><?php echo $res['image2_title']; ?></textarea> -->
        </div>

        <div class="form-group">
          <label for="category">Image2 Description</label>
          <textarea id="m_editor_4" name="m_image2_desc" rows="10" cols="80"><?php echo $res['image2_desc']; ?></textarea>
        </div>

         <div class="form-group">
          <label for="category">Image3</label>
          <input type="file" name="mer_im_3" value="<?php echo $res['image3']; ?>" class="form-control" id="m_cimg2">

        </div>

         <div class="row">
          <div class="col-md-6">
           
          <?php
          if($res['image3']=="")
          {
            ?>
            <img src="<?= NO_IMAGE_PATH ?>"  class="m_cimg2" width="100px" height="170px">
            <?php
          }
          else
          {
            ?>
             <img src="<?php echo IMAGE_SRC.$res['image3']; ?>?<?=rand(1,32000)?>"  class="m_cimg2" width="100px" height="170px">
            <?php
          }
          ?>
          </div>
        </div><br>


        <div class="form-group">
          <label for="category">Image3 Title</label>
          <input type="text" name="m_title3" value="<?php echo $res['image3_title']; ?>" class="form-control">
          <!-- <textarea id="m_editor_5" name="m_image3_title" rows="10" cols="80"><?php echo $res['image3_title']; ?></textarea> -->
        </div>

        <div class="form-group">
          <label for="category">Image3 Description</label>
          <textarea id="m_editor_6" name="m_image3_desc" rows="10" cols="80"><?php echo $res['image3_desc']; ?></textarea>
          <input type="hidden" name="mid" value="<?php echo $res['id']; ?>">
        </div>
        
       
        <div class="box-footer">
          <button type="button"  class="btn btn-primary" onclick="update_mer_web();">Submit</button>
          <input name="reset" type="reset" style="margin-left: 10px" value="Reset" onclick="resetForm('mer_web_frm'); return false;" class="btn btn-default" />
        </div>
      </form>
  </div>
</section>
<script type="text/javascript">
  $('#m_cimg').change(function() {            
    var imagePath = $("#m_cimg").val();           
    $(".m_cimg").attr("src",URL.createObjectURL(event.target.files[0]));        
    });

  $('#m_cimg1').change(function() {            
    var imagePath = $("#m_cimg1").val();           
    $(".m_cimg1").attr("src",URL.createObjectURL(event.target.files[0]));                     
    });

  $('#m_cimg2').change(function() {            
    var imagePath = $("#m_cimg2").val();           
    $(".m_cimg2").attr("src",URL.createObjectURL(event.target.files[0]));                     
    });

  function back()
  {
     $.ajax({
        url : "website_editor/merchant_about_web_list.php",
        method:"post",
        success:function(res)
        {
          alert('Done'); gototop(); $(".content-wrapper").html(res); 
        }
    });
  }

  // CKEDITOR.replace('m_editor_1');
  CKEDITOR.replace('m_editor_2');
  // CKEDITOR.replace('m_editor_3');
  CKEDITOR.replace('m_editor_4');
  // CKEDITOR.replace('m_editor_5');
  CKEDITOR.replace('m_editor_6');
  
  function resetForm(myFormId)
   {
       var myForm = document.getElementById(myFormId);

       for (var i = 0; i < myForm.elements.length; i++)
       {
           if ('submit' != myForm.elements[i].type && 'reset' != myForm.elements[i].type)
           {
               myForm.elements[i].checked = false;
               myForm.elements[i].value = '';
               myForm.elements[i].selectedIndex = 0;
               // CKEDITOR.instances.m_editor_1.setData('');
               CKEDITOR.instances.m_editor_2.setData('');
              // CKEDITOR.instances.m_editor_3.setData('');
              CKEDITOR.instances.m_editor_4.setData('');
              // CKEDITOR.instances.m_editor_5.setData('');
              CKEDITOR.instances.m_editor_6.setData('');
              
           }
       }
   }

  function update_mer_web()
  {
    var frd1 = $("#mer_web_frm")[0];
    var frdt1 = new FormData(frd1);
    // var m_title1 = CKEDITOR.instances.m_editor_1.getData();
    var m_desc1 = CKEDITOR.instances.m_editor_2.getData();
    // var m_title2 = CKEDITOR.instances.m_editor_3.getData();
    var m_desc2 = CKEDITOR.instances.m_editor_4.getData();
    // var m_title3 = CKEDITOR.instances.m_editor_5.getData();
    var m_desc3 = CKEDITOR.instances.m_editor_6.getData();

    // frdt1.append('m_title1', m_title1);
    frdt1.append('m_desc1', m_desc1);
    // frdt1.append('m_title2', m_title2);
    frdt1.append('m_desc2', m_desc2);
    // frdt1.append('m_title3', m_title3);
    frdt1.append('m_desc3', m_desc3);

    $.ajax({
            url : "website_editor/update_merchant_about_web.php",
            method:"post",
            data:frdt1,
            processData:false,
            contentType:false,
            success:function(res)
            {
              console.log(res);
              $.ajax({
                  url : "website_editor/merchant_about_web_list.php",
                  method:"post",
                  success:function(res)
                  {
                    alert('Done'); gototop(); $(".content-wrapper").html(res); 
                  }
              });
            }
    });

  }

</script>