<?php
require_once "connection.php";
$str = "select * from merchant_section";
$str1 = mysqli_query($cn,$str);
$row=mysqli_fetch_array($str1);
?>

<section class="content-header" id="app_div1"> 
  <h4>Update Merchant Noapp Section</h4>
    <ol class="breadcrumb"></ol>
</section>

<section class="content">
  <div class="box" style="margin-top: -1px">
  	<form role="form" method="post" enctype="multipart/form-data" id="has1">
    <input type="hidden" name="hid" class="form-control" value="<?php echo $row['id']; ?>">
      <div class="box-body">
        <div class="form-group">
          <label for="category">Title</label>
          <input type="text" name="title" class="form-control" value="<?php echo $row['noapp_section_title']; ?>">
        </div>

        <div class="form-group">
          <label for="category">Image</label>
          <input type="file" name="image1" class="form-control" value="<?php echo $row['noapp_section_image']; ?>" id="cimg1">
        </div>

        <div class="row">
          <div class="col-md-6">
            <?php
             if($row['noapp_section_image']=="")
             {
              ?>
                <img src="<?= NO_IMAGE_PATH ?>" width="100px" height="170px"  class="cimg1">
              <?php
             }
             else
             {
              ?>
                <img src="<?php echo IMAGE_SRC_PATH_NEW.$row['noapp_section_image']; ?>?<?=rand(1,32000)?>" width="60%"  class="cimg1">
              <?php
             }
            ?>
          </div>
        </div>

        <div class="form-group">
          <label for="category">Checkbox Image</label>
          <input type="file" name="chkImage" class="form-control" value="<?php echo $row['noapp_section_checkbox_image']; ?>" id="cimg">
        </div>

        <div class="row">
          <div class="col-md-6">
            <?php
             if($row['noapp_section_checkbox_image']=="")
             {
              ?>
                <img src="<?= NO_IMAGE_PATH ?>" width="100px" height="170px"  class="cimg">
              <?php
             }
             else
             {
              ?>
                <img src="<?php echo IMAGE_SRC_PATH_NEW.$row['noapp_section_checkbox_image']; ?>?<?=rand(1,32000)?>" width="20%"  class="cimg">
              <?php
             }
            ?>
          </div>
        </div>

        <div class="form-group">
          <label for="category">Subtitle1</label>
          <input type="text" name="subtitle1" class="form-control" value="<?php echo $row['noapp_section_subtitle1']; ?>">
        </div>

        <div class="form-group">
          <label for="category">Description1</label>
          <textarea id="editor1" name="desc1" rows="10" cols="80"><?php echo $row['noapp_section_desc1']; ?></textarea>
        </div>

        <div class="form-group">
          <label for="category">Subtitle2</label>
          <input type="text" name="subtitle2" class="form-control" value="<?php echo $row['noapp_section_subtitle2']; ?>">
        </div>

        <div class="form-group">
          <label for="category">Description2</label>
          <textarea id="editor2" name="desc2" rows="10" cols="80"><?php echo $row['noapp_section_desc2']; ?></textarea>
        </div>

        <div class="form-group">
          <label for="category">Subtitle3</label>
          <input type="text" name="subtitle3" class="form-control" value="<?php echo $row['noapp_section_subtitle3']; ?>">
        </div>

        <div class="form-group">
          <label for="category">Description3</label>
          <textarea id="editor3" name="desc3" rows="10" cols="80"><?php echo $row['noapp_section_desc3']; ?></textarea>
        </div>

        <div class="form-group">
          <label for="category">Subtitle4</label>
          <input type="text" name="subtitle4" class="form-control" value="<?php echo $row['noapp_section_subtitle4']; ?>">
        </div>

        <div class="form-group">
          <label for="category">Description4</label>
          <textarea id="editor4" name="desc4" rows="10" cols="80"><?php echo $row['noapp_section_desc4']; ?></textarea>
        </div>

      
        <div class="box-footer">
          <button type="button"  class="btn btn-primary" onclick="update();">Submit</button>
        <input name="reset" type="reset" style="margin-left: 10px" value="Reset" onclick="resetForm('has1'); return false;" class="btn btn-default" />

        </div>
      </form>
  </div>
</section>
<script>

function update()
{
  var desc1 = CKEDITOR.instances.editor1.getData();
  var desc2 = CKEDITOR.instances.editor2.getData();
  var desc3 = CKEDITOR.instances.editor3.getData();
  var desc4 = CKEDITOR.instances.editor4.getData();

  var fr = $("#has1")[0];
  var frdata = new FormData(fr);
  frdata.append('desc1', desc1);
  frdata.append('desc2', desc2);
  frdata.append('desc3', desc3);
  frdata.append('desc4', desc4);

  $.ajax({
      url : "website_editor/update_merchant_noapp_section.php",
      data:frdata,
      method:"post",
      processData:false,
      contentType:false,
      success:function(res)
      {
        console.log(res);
        $.ajax({
          url : "website_editor/merchant_noapp_section.php",
          method:"post",
          success:function(res)
          {
            alert('Done'); gototop(); $(".content-wrapper").html(res);
          }
        });
      }
  });
}

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
               CKEDITOR.instances.editor1.setData('');
               CKEDITOR.instances.editor2.setData('');
               CKEDITOR.instances.editor3.setData('');
               CKEDITOR.instances.editor4.setData('');
           }
       }
   }

$('#cimg1').change(function() {            
  var imagePath = $("#cimg1").val();           
  $(".cimg1").attr("src",URL.createObjectURL(event.target.files[0]));           
});
$('#cimg').change(function() {            
  var imagePath = $("#cimg").val();           
  $(".cimg").attr("src",URL.createObjectURL(event.target.files[0]));           
});

</script>
 <script>
 CKEDITOR.replace( 'editor1' );
CKEDITOR.replace( 'editor2' );
CKEDITOR.replace( 'editor3' );
CKEDITOR.replace( 'editor4' );
</script>