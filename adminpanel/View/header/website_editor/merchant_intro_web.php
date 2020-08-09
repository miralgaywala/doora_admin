
<?php
require_once "connection.php";
$str = "select * from merchant_intro_web";
$str1 = mysqli_query($cn,$str);
$row=mysqli_fetch_array($str1);
?>

<section class="content-header" id="app_div1"> 
  <h4>Update Merchant Introduction</h4>
    <ol class="breadcrumb">
    </ol>
</section>

<section class="content">
  <div class="box" style="margin-top: -1px">
    <form role="form" method="post" enctype="multipart/form-data" id="m_frm">
      <div class="box-body">
        <div class="form-group">
          <label for="category">Title1</label>
          <!-- <textarea id="m_editor1" name="m_title1" rows="10" cols="80"><?php echo $row['title1']; ?></textarea> -->
          <input type="text" name="m_title1" value="<?php echo $row['title1']; ?>" class="form-control">

        </div>

        <div class="form-group">
          <label for="category">Title2</label>
          <input type="text" name="m_title2" value="<?php echo $row['title2']; ?>" class="form-control">
          <!-- <textarea id="m_editor2" name="m_title2" rows="10" cols="80"><?php echo $row['title2']; ?></textarea> -->
        </div>

        <div class="form-group">
          <label for="category">Description</label>
          <textarea id="m_editor3" name="m_desc1" rows="10" cols="80"><?php echo $row['description']; ?></textarea>
        </div>

        <div class="form-group">
          <label for="category">Button Text</label>
          <input type="text" name="m_btn_text" value="<?php echo $row['button_text']; ?>" class="form-control">
        </div>


        <div class="form-group">
          <label for="category">Button Icon</label>
          <input type="text" name="m_btn_ic" value="<?php echo $row['button_icon']; ?>" class="form-control">
          <input type="hidden" class="form-control" name="mid" value="<?php echo $row['id']; ?>">
        </div>

        <div class="row">
          <div class="col-md-6">
            <i class="<?php echo $row['button_icon']; ?>" aria-hidden="true" style="display: inline-block;font-style: normal;font-variant: normal;text-rendering: auto;font-size: 70px;color: white;background-color: #fb8a8a;padding:10px;border-radius: 10%" height="80px" ></i>
          </div>
          
        </div>

        <div class="box-footer">
          <button type="button"  class="btn btn-primary" onclick="update_web();">Submit</button>
          <!-- <button class="btn btn-default" type="reset" style="margin-left:10px">Reset</button> -->
          <input name="reset" type="reset" style="margin-left: 10px" value="Reset" onclick="resetForm('m_frm'); return false;" class="btn btn-default" />

        </div>
      </form>
  </div>
</section>
<script type="text/javascript">

function update_web()
{
  // var title1 = CKEDITOR.instances.m_editor1.getData();
  // var title2 = CKEDITOR.instances.m_editor2.getData();
  var desc = CKEDITOR.instances.m_editor3.getData();
  

  var fr = $("#m_frm")[0];
  var frdata = new FormData(fr);
  // frdata.append('m_title1', title1);
  // frdata.append('m_title2', title2);
  frdata.append('m_desc1', desc);

  $.ajax({
      url : "website_editor/update_merchant_intro.php",
      data:frdata,
      method:"post",
      processData:false,
      contentType:false,
      success:function(res)
      {
        console.log(res);
        $.ajax({
          url : "website_editor/merchant_intro_web.php",
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
               // CKEDITOR.instances.m_editor1.setData('');
               // CKEDITOR.instances.m_editor2.setData('');
               CKEDITOR.instances.m_editor3.setData('');
           }
       }
   }
</script> 
 <script>
// CKEDITOR.replace( 'm_editor1' );
// CKEDITOR.replace( 'm_editor2' );
CKEDITOR.replace( 'm_editor3' );
</script>