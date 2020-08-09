<?php
require_once "connection.php";
$str = "select * from home_about_web where id=".$_POST['eid'];
$str1 = mysqli_query($cn,$str);
$row=mysqli_fetch_array($str1);

?>

<section class="content-header" id="app_div1"> 
  <h4>Update Home About Image Section</h4>
    <ol class="breadcrumb">
    <button class="btn btn-primary" onclick="back();" style="margin-left: 150px;">Back</i></button>
    </ol>
</section>

<section class="content">
   <div class="box" style="margin-top: -1px">
    <form role="form" method="post" enctype="multipart/form-data" id="homeaw">
      <div class="box-body">


        <div class="form-group">
          <label for="category">Image1</label>
          <input type="file" name="image1" class="form-control" value="<?php echo $row['image1']; ?>" id="cimg1">
        </div>

        <div class="row">
          <div class="col-md-6">
            <?php
             if($row['image1']=="")
             {
              ?>
                <img src="<?= NO_IMAGE_PATH ?>" width="100px" height="170px"  class="cimg1">
              <?php
             }
             else
             {
              ?>
                <img src="<?php echo IMAGE_SRC_PATH_NEW.$row['image1']; ?>?<?=rand(1,32000)?>" width="100px" height="170px"  class="cimg1">
              <?php
             }
            ?>
          </div>
        </div>

      
        <div class="form-group">
          <label for="category">Image2</label>
          <input type="file" name="image2" class="form-control" value="<?php echo $row['image2']; ?>" id="cimg2">
        </div>

        <div class="row">
          <div class="col-md-6">
            
            <?php
             if($row['image2']=="")
             {
              ?>
                <img src="<?= NO_IMAGE_PATH ?>" width="100px" height="170px"  class="cimg2">
              <?php
             }
             else
             {
              ?>
                <img src="<?php echo IMAGE_SRC.$row['image2']; ?>?<?=rand(1,32000)?>" width="100px" height="170px"  class="cimg2">
              <?php
             }
            ?>
          </div>
        </div>

        <div class="form-group">
          <label for="category">Image3</label>
          <input type="file" name="image3" class="form-control" value="<?php echo $row['image3']; ?>" id="cimg3">
          <input type="hidden" name="hid" class="form-control" value="<?php echo $row['id']; ?>">
        </div>

        <div class="row">
          <div class="col-md-6">
            
            <?php
             if($row['image3']=="")
             {
              ?>
                <img src="<?= NO_IMAGE_PATH ?>" width="100px"  height="170px"  class="cimg3">
              <?php
             }
             else
             {
              ?>
                <img src="<?php echo IMAGE_SRC.$row['image3']; ?>?<?=rand(1,32000)?>" width="100px" height="170px"  class="cimg3">
              <?php
             }
            ?>
          </div>
        </div>

        <div class="box-footer">
          <button type="button"  class="btn btn-primary" onclick="update_web();">Submit</button>
          <button class="btn btn-default" type="reset" style="margin-left:10px">Reset</button>
        </div>
      </form>
  </div>
</section>
<script type="text/javascript">
function update_web()
{
  var frm = $("#homeaw")[0];
  var frmdt = new FormData(frm);
  $.ajax({
    url : "website_editor/update_home_about_web.php",
    method:"post",
    data:frmdt,
    processData:false,
    contentType:false,
    success:function(res)
    {
      console.log(res);
          $.ajax({
            url : "website_editor/home_about_web_list.php",
            method:"post",
            success:function(res)
            {
              alert('Done'); gototop(); $(".content-wrapper").html(res);
            }
          });
    }
  });
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

function back()
  {
    $.ajax({
      url : "website_editor/home_about_web_list.php",
      method:"post",
      success:function(res)
      {
        // alert('Done'); 
        gototop(); $(".content-wrapper").html(res);
      }
    });
  }
</script>
