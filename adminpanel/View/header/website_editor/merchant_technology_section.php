<?php
require_once "connection.php";
$str = "select * from merchant_section";
$str1 = mysqli_query($cn,$str);
$row=mysqli_fetch_array($str1);
?>

<section class="content-header" id="app_div1"> 
  <h4>Update Merchant Technology Section</h4>
    <ol class="breadcrumb"></ol>
</section>

<section class="content">
  <div class="box" style="margin-top: -1px">
  	<form role="form" method="post" enctype="multipart/form-data" id="has1">
    <input type="hidden" name="hid" class="form-control" value="<?php echo $row['id']; ?>">
      <div class="box-body">
        <div class="form-group">
          <label for="category">Title</label>
          <input type="text" name="title" class="form-control" value="<?php echo $row['technology_section_title']; ?>">
        </div>

        <div class="form-group">
          <label for="category">Image1</label>
          <input type="file" name="image1" class="form-control" value="<?php echo $row['technology_section_image1']; ?>" id="cimg1">
        </div>

        <div class="row">
          <div class="col-md-6">
            <?php
             if($row['technology_section_image1']=="")
             {
              ?>
                <img src="<?= NO_IMAGE_PATH ?>" width="100px" height="170px"  class="cimg1">
              <?php
             }
             else
             {
              ?>
                <img src="<?php echo IMAGE_SRC_PATH_NEW.$row['technology_section_image1']; ?>?<?=rand(1,32000)?>" width="100px" height="170px"  class="cimg1">
              <?php
             }
            ?>
          </div>
        </div>

        <div class="form-group">
          <label for="category">Description1</label>
          <textarea id="editor1" name="desc1" rows="10" cols="80"><?php echo $row['technology_section_desc1']; ?></textarea>
        </div>

        <div class="form-group">
          <label for="category">Image2</label>
          <input type="file" name="image2" class="form-control" value="<?php echo $row['technology_section_image2']; ?>" id="cimg2">
        </div>

        <div class="row">
          <div class="col-md-6">
            <?php
             if($row['technology_section_image2']=="")
             {
              ?>
                <img src="<?= NO_IMAGE_PATH ?>" width="100px" height="170px"  class="cimg2">
              <?php
             }
             else
             {
              ?>
                <img src="<?php echo IMAGE_SRC_PATH_NEW.$row['technology_section_image2']; ?>?<?=rand(1,32000)?>" width="100px" height="170px"  class="cimg2">
              <?php
             }
            ?>
          </div>
        </div>

        <div class="form-group">
          <label for="category">Description2</label>
          <textarea id="editor2" name="desc2" rows="10" cols="80"><?php echo $row['technology_section_desc2']; ?></textarea>
        </div>

        <div class="form-group">
          <label for="category">Image3</label>
          <input type="file" name="image3" class="form-control" value="<?php echo $row['technology_section_image3']; ?>" id="cimg3">
        </div>

        <div class="row">
          <div class="col-md-6">
            <?php
             if($row['technology_section_image3']=="")
             {
              ?>
                <img src="<?= NO_IMAGE_PATH ?>" width="100px" height="170px"  class="cimg3">
              <?php
             }
             else
             {
              ?>
                <img src="<?php echo IMAGE_SRC_PATH_NEW.$row['technology_section_image3']; ?>?<?=rand(1,32000)?>" width="100px" height="170px"  class="cimg3">
              <?php
             }
            ?>
          </div>
        </div>

        <div class="form-group">
          <label for="category">Description3</label>
          <textarea id="editor3" name="desc3" rows="10" cols="80"><?php echo $row['technology_section_desc3']; ?></textarea>
        </div>

        <div class="form-group">
          <label for="category">Image4</label>
          <input type="file" name="image4" class="form-control" value="<?php echo $row['technology_section_image4']; ?>" id="cimg4">
        </div>

        <div class="row">
          <div class="col-md-6">
            <?php
             if($row['technology_section_image4']=="")
             {
              ?>
                <img src="<?= NO_IMAGE_PATH ?>" width="100px" height="170px"  class="cimg4">
              <?php
             }
             else
             {
              ?>
                <img src="<?php echo IMAGE_SRC_PATH_NEW.$row['technology_section_image4']; ?>?<?=rand(1,32000)?>" width="100px" height="170px"  class="cimg4">
              <?php
             }
            ?>
          </div>
        </div>

        <div class="form-group">
          <label for="category">Description4</label>
          <textarea id="editor4" name="desc4" rows="10" cols="80"><?php echo $row['technology_section_desc4']; ?></textarea>
        </div>

        <div class="form-group">
          <label for="category">Image5</label>
          <input type="file" name="image5" class="form-control" value="<?php echo $row['technology_section_image5']; ?>" id="cimg5">
        </div>

        <div class="row">
          <div class="col-md-6">
            <?php
             if($row['technology_section_image5']=="")
             {
              ?>
                <img src="<?= NO_IMAGE_PATH ?>" width="100px" height="170px"  class="cimg5">
              <?php
             }
             else
             {
              ?>
                <img src="<?php echo IMAGE_SRC_PATH_NEW.$row['technology_section_image5']; ?>?<?=rand(1,32000)?>" width="100px" height="170px"  class="cimg5">
              <?php
             }
            ?>
          </div>
        </div>

        <div class="form-group">
          <label for="category">Description5</label>
          <textarea id="editor5" name="desc5" rows="10" cols="80"><?php echo $row['technology_section_desc5']; ?></textarea>
        </div>

        <div class="form-group">
          <label for="category">Image6</label>
          <input type="file" name="image6" class="form-control" value="<?php echo $row['technology_section_image6']; ?>" id="cimg6">
        </div>

        <div class="row">
          <div class="col-md-6">
            <?php
             if($row['technology_section_image6']=="")
             {
              ?>
                <img src="<?= NO_IMAGE_PATH ?>" width="100px" height="170px"  class="cimg6">
              <?php
             }
             else
             {
              ?>
                <img src="<?php echo IMAGE_SRC_PATH_NEW.$row['technology_section_image6']; ?>?<?=rand(1,32000)?>" width="100px" height="170px"  class="cimg6">
              <?php
             }
            ?>
          </div>
        </div>

        <div class="form-group">
          <label for="category">Description6</label>
          <textarea id="editor6" name="desc6" rows="10" cols="80"><?php echo $row['technology_section_desc6']; ?></textarea>
        </div>

        <div class="form-group">
          <label for="category">Button Text</label>
          <input type="text" name="btnname" class="form-control" value="<?php echo $row['technology_section_button_text']; ?>">
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
  var desc5 = CKEDITOR.instances.editor5.getData();
  var desc6 = CKEDITOR.instances.editor6.getData();

  var fr = $("#has1")[0];
  var frdata = new FormData(fr);
  frdata.append('desc1', desc1);
  frdata.append('desc2', desc2);
  frdata.append('desc3', desc3);
  frdata.append('desc4', desc3);
  frdata.append('desc5', desc3);
  frdata.append('desc6', desc3);

  $.ajax({
      url : "website_editor/update_merchant_technology_section.php",
      data:frdata,
      method:"post",
      processData:false,
      contentType:false,
      success:function(res)
      {
        console.log(res);
        $.ajax({
          url : "website_editor/merchant_technology_section.php",
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
               CKEDITOR.instances.editor5.setData('');
               CKEDITOR.instances.editor6.setData('');
           }
       }
   }

$('#cimg1').change(function() {            
  var imagePath = $("#cimg1").val();           
  $(".cimg1").attr("src",URL.createObjectURL(event.target.files[0]));           
});
$('#cimg2').change(function() {            
  var imagePath = $("#cimg2").val();           
  $(".cimg2").attr("src",URL.createObjectURL(event.target.files[0]));           
});
$('#cimg3').change(function() {            
  var imagePath = $("#cimg3").val();           
  $(".cimg3").attr("src",URL.createObjectURL(event.target.files[0]));           
});
$('#cimg4').change(function() {            
  var imagePath = $("#cimg4").val();           
  $(".cimg4").attr("src",URL.createObjectURL(event.target.files[0]));           
});
$('#cimg5').change(function() {            
  var imagePath = $("#cimg5").val();           
  $(".cimg5").attr("src",URL.createObjectURL(event.target.files[0]));           
});
$('#cimg6').change(function() {            
  var imagePath = $("#cimg6").val();           
  $(".cimg6").attr("src",URL.createObjectURL(event.target.files[0]));           
});

</script>
 <script>
CKEDITOR.replace( 'editor1' );
CKEDITOR.replace( 'editor2' );
CKEDITOR.replace( 'editor3' );
CKEDITOR.replace( 'editor4' );
CKEDITOR.replace( 'editor5' );
CKEDITOR.replace( 'editor6' );
</script>