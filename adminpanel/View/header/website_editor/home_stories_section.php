<?php
require_once "connection.php";
$str = "select * from home_section";
$str1 = mysqli_query($cn,$str);
$row=mysqli_fetch_array($str1);
?>

<section class="content-header" id="app_div1"> 
  <h4>Update Home Stories Section</h4>
    <ol class="breadcrumb"></ol>
</section>

<section class="content">
  <div class="box" style="margin-top: -1px">
  	<form role="form" method="post" enctype="multipart/form-data" id="has1">
    <input type="hidden" name="hid" class="form-control" value="<?php echo $row['id']; ?>">
      <div class="box-body">
        <div class="form-group">
          <label for="category">Title</label>
          <input type="text" name="title" class="form-control" value="<?php echo $row['stories_section_text']; ?>">
        </div>

        <div class="form-group">
          <label for="category">Image</label>
          <input type="file" name="image1" class="form-control" value="<?php echo $row['stories_section_image']; ?>" id="cimg1">
        </div>

        <div class="row">
          <div class="col-md-6">
            <?php
             if($row['stories_section_image']=="")
             {
              ?>
                <img src="<?= NO_IMAGE_PATH ?>" width="100px" height="170px"  class="cimg1">
              <?php
             }
             else
             {
              ?>
                <img src="<?php echo IMAGE_SRC_PATH_NEW.$row['stories_section_image']; ?>?<?=rand(1,32000)?>" width="100%" class="cimg1">
              <?php
             }
            ?>
          </div>
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
  var fr = $("#has1")[0];
  var frdata = new FormData(fr);

  $.ajax({
      url : "website_editor/update_home_stories_section.php",
      data:frdata,
      method:"post",
      processData:false,
      contentType:false,
      success:function(res)
      {
        console.log(res);
        $.ajax({
          url : "website_editor/home_stories_section.php",
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
           }
       }
   }

$('#cimg1').change(function() {            
  var imagePath = $("#cimg1").val();           
  $(".cimg1").attr("src",URL.createObjectURL(event.target.files[0]));           
});

</script>
 <script>
</script>