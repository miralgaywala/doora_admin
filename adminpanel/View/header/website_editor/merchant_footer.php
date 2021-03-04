<?php
require_once "connection.php";
$str = "select * from merchant_section";
$str1 = mysqli_query($cn,$str);
$row=mysqli_fetch_array($str1);
?>

<section class="content-header" id="app_div1"> 
  <h4>Update Merchant Footer</h4>
    <ol class="breadcrumb"></ol>
</section>

<section class="content">
  <div class="box" style="margin-top: -1px">
  	<form role="form" method="post" enctype="multipart/form-data" id="has1">
    <input type="hidden" name="hid" class="form-control" value="<?php echo $row['id']; ?>">
      <div class="box-body">
        <div class="form-group">
          <label for="category">Button Text</label>
          <input type="text" name="btnname" class="form-control" value="<?php echo $row['footer_button_text']; ?>">
        </div>

        <div class="form-group">
          <label for="category">Button Icon</label>
          <input type="text" class="form-control" name="btn_icon" value="<?php echo $row['footer_button_icon']; ?>">
        </div>

        <div class="row">
          <div class="col-md-6">
            <i class="<?php echo $row['footer_button_icon'] ?>" aria-hidden="true" style="display: inline-block;font-style: normal;font-variant: normal;text-rendering: auto;font-size: 70px;color: white;background-color: #fb8a8a;padding:10px;border-radius: 10%" height="80px" ></i>
          </div>
        </div><br>

        <div class="form-group">
          <label for="category">Icon1</label>
          <input type="text" class="form-control" name="icon1" value="<?php echo $row['footer_icon1']; ?>">
        </div>

        <div class="row">
          <div class="col-md-6">
            <i class="<?php echo $row['footer_icon1'] ?>" aria-hidden="true" style="display: inline-block;font-style: normal;font-variant: normal;text-rendering: auto;font-size: 70px;color: white;background-color: #fb8a8a;padding:10px;border-radius: 10%" height="80px" ></i>
          </div>
        </div><br>
        <div class="form-group">
          <label for="category">Icon2</label>
          <input type="text" class="form-control" name="icon2" value="<?php echo $row['footer_icon2']; ?>">
        </div>

        <div class="row">
          <div class="col-md-6">
            <i class="<?php echo $row['footer_icon2'] ?>" aria-hidden="true" style="display: inline-block;font-style: normal;font-variant: normal;text-rendering: auto;font-size: 70px;color: white;background-color: #fb8a8a;padding:10px;border-radius: 10%" height="80px" ></i>
          </div>
        </div><br>
        <div class="form-group">
          <label for="category">Icon3</label>
          <input type="text" class="form-control" name="icon3" value="<?php echo $row['footer_icon3']; ?>">
        </div>

        <div class="row">
          <div class="col-md-6">
            <i class="<?php echo $row['footer_icon3'] ?>" aria-hidden="true" style="display: inline-block;font-style: normal;font-variant: normal;text-rendering: auto;font-size: 70px;color: white;background-color: #fb8a8a;padding:10px;border-radius: 10%" height="80px" ></i>
          </div>
        </div><br>
      
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
      url : "website_editor/update_merchant_footer.php",
      data:frdata,
      method:"post",
      processData:false,
      contentType:false,
      success:function(res)
      {
        console.log(res);
        $.ajax({
          url : "website_editor/merchant_footer.php",
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

</script>
 <script>
</script>