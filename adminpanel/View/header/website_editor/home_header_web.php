
<?php
require_once "connection.php";
$qy = "select * from home_header_web where id=".$_POST['eid'];
$str1 = mysqli_query($cn,$qy);
$res=mysqli_fetch_array($str1);
?>

<section class="content-header" id="app_div1"> 
  <h4>Update Home Header Image Section</h4>
    <ol class="breadcrumb">
      <button class="btn btn-primary" onclick="back();" style="margin-left: 150px;">Back</i></button>
    </ol>
</section>

<section class="content">
  <div class="box" style="margin-top: -1px">
    <form role="form" method="post" enctype="multipart/form-data" id="hd_frm">
      <div class="box-body">
  
        <div class="form-group">
          <label for="category">Image</label>
          <input type="file" name="img1" value="<?php echo $res['image1']; ?>" class="form-control" id="cimg">
        </div>

        <div class="row">
          <div class="col-md-6">
            <?php
            if($res['image1']=="")
            {
              ?>
              <img src="<?= NO_IMAGE_PATH ?>" height="120px" class="cimg">
              <?php
            }
            else
            {
              ?>
              <img src="<?php echo IMAGE_SRC.$res['image1']; ?>?<?=rand(1,32000)?>"  height="120px" class="cimg">

              <?php
            }
            ?>
            
            <input type="hidden" name="hid" value="<?php echo $res['id']; ?>">
          </div>
        </div><br>

        <div class="box-footer">
          <button type="button"  class="btn btn-primary" onclick="update_ft();">Submit</button>
          <button class="btn btn-default" type="reset" style="margin-left:10px">Reset</button>
        </div>
      </form>
  </div>
</section>
<script type="text/javascript">
function update_ft()
{
  var fr = $("#hd_frm")[0];
  var frmdt = new FormData(fr);

  $.ajax({
        url : "website_editor/update_home_header.php",
        method:"post",
        data : frmdt,
        processData:false,
        contentType:false,
        success:function(res)
        {
          console.log(res);
            $.ajax({
                url : "website_editor/home_header_web_list.php",
                method:"post",
                success:function(res)
                {
                    alert('Done'); gototop(); $(".content-wrapper").html(res);
                }

            });
        }

  });
}

 $('#cimg').change(function() {            
    var imagePath = $("#cimg").val();           
    $(".cimg").attr("src",URL.createObjectURL(event.target.files[0]));            
     // alert(URL.createObjectURL(event.target.files[0]));            
    });


 function back()
  {
    $.ajax({
      url : "website_editor/home_header_web_list.php",
      method:"post",
      success:function(res)
      {
        // alert('Done');
        gototop(); $(".content-wrapper").html(res);
      }
    });
  }

</script> 
