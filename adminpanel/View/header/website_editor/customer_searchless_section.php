<?php
require_once "connection.php";
$str = "select * from customer_section";
$str1 = mysqli_query($cn,$str);
$row=mysqli_fetch_array($str1);
?>

<section class="content-header" id="app_div1"> 
  <h4>Update Customer Searchless Section</h4>
    <ol class="breadcrumb"></ol>
</section>

<section class="content">
  <div class="box" style="margin-top: -1px">
  	<form role="form" method="post" enctype="multipart/form-data" id="has1">
    <input type="hidden" name="hid" class="form-control" value="<?php echo $row['id']; ?>">
      <div class="box-body">
        <div class="form-group">
          <label for="category">Title</label>
          <input type="text" name="title" class="form-control" value="<?php echo $row['searchless_section_title']; ?>">
        </div>

        <div class="form-group">
          <label for="category">Description</label>
          <textarea id="editor2" name="desc" rows="10" cols="80"><?php echo $row['searchless_section_description']; ?></textarea>
        </div>

        <div class="form-group">
          <label for="category">Button Text</label>
          <input type="text" name="btnname" class="form-control" value="<?php echo $row['searchless_section_button_text']; ?>">
        </div>

        <div class="form-group">
          <label for="category">Button Icon</label>
          <input type="text" class="form-control" name="btn_icon" value="<?php echo $row['searchless_section_button_icon']; ?>">
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
  var desc = CKEDITOR.instances.editor2.getData();

  var fr = $("#has1")[0];
  var frdata = new FormData(fr);
  frdata.append('desc', desc);

  $.ajax({
      url : "website_editor/update_customer_searchless_section.php",
      data:frdata,
      method:"post",
      processData:false,
      contentType:false,
      success:function(res)
      {
        console.log(res);
        $.ajax({
          url : "website_editor/customer_searchless_section.php",
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
               CKEDITOR.instances.editor2.setData('');
           }
       }
   }

</script>
 <script>
CKEDITOR.replace( 'editor2' );
</script>