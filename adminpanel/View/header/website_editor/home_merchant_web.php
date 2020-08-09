<?php
require_once "connection.php";
$str2 = "select * from home_merchant_web where id=".$_POST['eid'];
$str1 = mysqli_query($cn,$str2);
$res=mysqli_fetch_array($str1);
?>

<section class="content-header" id="app_div1"> 
  <h4>Update Home Merchant Section</h4>
    <ol class="breadcrumb">
      <button class="btn btn-primary" onclick="back();" style="margin-left: 150px;">Back</i></button>
    </ol>
</section>

<section class="content">
  <div class="box" style="margin-top: -1px">
    <form role="form" method="post" enctype="multipart/form-data" id="mer_frm">
      <div class="box-body">
        <div class="form-group">
          <label for="category">Title</label>
          <!-- <textarea id="editor1" name="title2" rows="10" cols="80"><?php echo $res['title']; ?></textarea> -->
          <input type="text" name="title2" value="<?php echo $res['title']; ?>" class="form-control">
        </div>

        <div class="form-group">
          <label for="category">Description</label>
          <textarea id="editor2" name="desc2" rows="10" cols="80"><?php echo $res['description']; ?></textarea>
        </div>

        <div class="form-group">
          <label for="category">Button Text</label>
          
          <input type="text" name="btn_text1" value="<?php echo $res['button_text']; ?>" class="form-control">
        </div>

        <div class="form-group">
          <label for="category">Image</label>
          <input type="file" class="form-control" name="image_2" value="<?php echo $res['image1']; ?>" id="cimg">
          <input type="hidden" class="form-control" name="mid" value="<?php echo $res['id']; ?>">
        </div>
      
        <div class="row">
          <div class="col-md-6">
            <?php
            if($res['image1']=="")
            {
              ?>
                <img src="<?= NO_IMAGE_PATH ?>" width="130px" height="174px"  class="cimg">
              <?php
            }
            else
            {
              ?>
                <img src="<?php echo IMAGE_SRC.$res['image1']; ?>?<?=rand(1,32000)?>" width="130px" height="174px"  class="cimg">
              <?php
            }
            ?>
          </div>
        </div>

        <div class="box-footer">
          <button type="button"  class="btn btn-primary" onclick="update_mer();">Submit</button>
          <input name="reset" type="reset" style="margin-left: 10px" value="Reset" onclick="resetForm('mer_frm'); return false;" class="btn btn-default" />
        </div>
      </form>
  </div>
</section>
<script type="text/javascript">
  $('#cimg').change(function() {            
    var imagePath = $("#cimg").val();           
    $(".cimg").attr("src",URL.createObjectURL(event.target.files[0]));           
    });

function update_mer()
{
  // var title = CKEDITOR.instances.editor1.getData();
  var desc = CKEDITOR.instances.editor2.getData();
  
  var fr = $("#mer_frm")[0];
  var frdata = new FormData(fr);
  // frdata.append('title2', title);
  frdata.append('desc2', desc);
  
  $.ajax({
      url : "website_editor/update_home_merchant.php",
      data:frdata,
      method:"post",
      processData:false,
      contentType:false,
      success:function(res)
      {
        console.log(res);
        $.ajax({
         url : "website_editor/home_merchant_web_list.php",
          method:"post",
          success:function(res)
          {
            alert('Done'); gototop(); $(".content-wrapper").html(res);
          }
    });
      }
  });
}

function back()
{
 $.ajax({
         url : "website_editor/home_merchant_web_list.php",
          method:"post",
          success:function(res)
          {
            // alert('Done'); 
            gototop(); $(".content-wrapper").html(res);
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
               // CKEDITOR.instances.editor1.setData('');
               CKEDITOR.instances.editor2.setData('');
              
           }
       }
   }
</script> 
 <script>
// CKEDITOR.replace( 'editor1' );
CKEDITOR.replace( 'editor2' );

</script>