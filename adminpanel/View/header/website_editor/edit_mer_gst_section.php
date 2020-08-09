<?php
require_once "connection.php";
$str2 = "select * from merchant_gst_section where id=".$_POST['eid'];
$str1 = mysqli_query($cn,$str2);
$res=mysqli_fetch_array($str1);
?>

<section class="content-header" id="app_div1"> 
  <h4>Update Merchant GST Section</h4>
    <ol class="breadcrumb">
      <button class="btn btn-primary" onclick="back();" style="margin-left: 150px;">Back</i></button>
    </ol>
</section>

<section class="content">
  <div class="box" style="margin-top: -1px">
    <form role="form" method="post" enctype="multipart/form-data" id="mer_gst_frm">
      <div class="box-body">
        <div class="form-group">
          <label for="category">Image</label>
          <input type="file" class="form-control" name="image" value="<?php echo $res['image']; ?>" id="cimg">
          <input type="hidden" class="form-control" name="mgid" value="<?php echo $res['id']; ?>">
        </div>
      
        <div class="row">
          <div class="col-md-6">
            <?php
            if($res['image']=="")
            {
              ?>
                <img src="<?= NO_IMAGE_PATH ?>" width="100px" height="100px"  class="cimg">
              <?php
            }
            else
            {
              ?>
                <img src="<?php echo IMAGE_SRC.$res['image']; ?>?<?=rand(1,32000)?>" width="100px"  class="cimg">
              <?php
            }
            ?>
          </div>
        </div>

        <div class="form-group">
          <label for="category">Title1</label>
          <input type="text" name="title1" value="<?php echo $res['title1']; ?>" class="form-control">
        </div>

        <div class="form-group">
          <label for="category">Title2</label>
          <input type="text" name="title2" value="<?php echo $res['title2']; ?>" class="form-control">
        </div>

        <div class="form-group">
          <label for="category">Title3</label>
          
          <input type="text" name="title3" value="<?php echo $res['title3']; ?>" class="form-control">
        </div>
        

        <div class="box-footer">
          <button type="button"  class="btn btn-primary" onclick="update_mer_gst();">Submit</button>
          <input name="reset" type="reset" style="margin-left: 10px" value="Reset" onclick="resetForm('mer_gst_frm'); return false;" class="btn btn-default" />
        </div>
      </form>
  </div>
</section>
<script type="text/javascript">
  $('#cimg').change(function() {            
    var imagePath = $("#cimg").val();           
    $(".cimg").attr("src",URL.createObjectURL(event.target.files[0]));           
    });

function update_mer_gst()
{  
  var fr = $("#mer_gst_frm")[0];
  var frdata = new FormData(fr);  
  $.ajax({
      url : "website_editor/update_mer_gst_section.php",
      data:frdata,
      method:"post",
      processData:false,
      contentType:false,
      success:function(res)
      {
          // console.log(res);
          $.ajax({
           url : "website_editor/merchant_gst_section.php",
            method:"post",
            success:function(res)
            {
              alert('Done'); 
              // gototop(); $(".content-wrapper").html(res);
              mer_gst_sec();
              
            }

          });
      }
  });
}

function back()
{
 $.ajax({
         url : "website_editor/merchant_gst_section.php",
          method:"post",
          success:function(res)
          {
            // alert('Done'); 
            // gototop(); $(".content-wrapper").html(res);
            mer_gst_sec();
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
</script>