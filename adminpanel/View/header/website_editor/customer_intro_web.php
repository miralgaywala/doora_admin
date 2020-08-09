<?php
require_once "connection.php";
$str = "select * from customer_intro_web";
$str1 = mysqli_query($cn,$str);
$row=mysqli_fetch_array($str1);

?> 

<section class="content-header" id="app_div1"> 
  <h4>Update Customer Introduction</h4>
    <ol class="breadcrumb">
      <!-- <button class="btn btn-primary" onclick="back();" style="margin-left: 150px;">Back</i></button> -->
    </ol>
</section>

<section class="content">
  <div class="box" style="margin-top: -1px">
    <form role="form" method="post" enctype="multipart/form-data" id="c_frm">
      <div class="box-body">
        <div class="form-group">
          <label for="category">Title1</label>
          <input type="text" name="title1" value="<?php echo $row['title_1']; ?>" class="form-control">
          <!-- <textarea id="editor1" name="title1" rows="10" cols="80"><?php echo $row['title_1']; ?></textarea> -->
        </div>

        <div class="form-group">
          <label for="category">Title2</label>
          <input type="text" name="title2" value="<?php echo $row['title_2']; ?>" class="form-control">
          <!-- <textarea id="editor2" name="title2" rows="10" cols="80"><?php echo $row['title_2']; ?></textarea> -->
        </div>

        <div class="form-group">
          <label for="category">Description</label>
          <textarea id="editor3" name="desc1" rows="10" cols="80"><?php echo $row['description']; ?></textarea>
        </div>

        <div class="form-group">
          <label for="category">Button Text</label>
          <input type="text" name="btn_text" value="<?php echo $row['button_text']; ?>" class="form-control">
        </div>


        <div class="form-group">
          <label for="category">Button Icon</label>
          <input type="text" name="btn_ic" value="<?php echo $row['button_icon']; ?>" class="form-control">
          <input type="hidden" class="form-control" name="hiddenid" value="<?php echo $row['id']; ?>">
        </div>
          
        <div class="row">
          <div class="col-md-6">
            <i class="<?php echo $row['button_icon']; ?>" aria-hidden="true" style="display: inline-block;font-style: normal;font-variant: normal;text-rendering: auto;font-size: 70px;color: white;background-color: #fb8a8a;padding:10px;border-radius: 10%" height="80px" ></i>
          </div>
        </div><br>

        <div class="box-footer">
          <button type="button"  class="btn btn-primary" onclick="update_web();">Submit</button>
          <input name="reset" type="reset" style="margin-left: 10px" value="Reset" onclick="resetForm('c_frm'); return false;" class="btn btn-default" />
        </div>
      </form>
  </div>
</section>
<script type="text/javascript">

function update_web()
{
  // var title1 = CKEDITOR.instances.editor1.getData();
  // var title2 = CKEDITOR.instances.editor2.getData();
  var desc = CKEDITOR.instances.editor3.getData();
  

  var fr = $("#c_frm")[0];
  var frdata = new FormData(fr);
  // frdata.append('title1', title1);
  // frdata.append('title2', title2);
  frdata.append('desc1', desc);

  $.ajax({
      url : "website_editor/update_customer_intro.php",
      data:frdata,
      method:"post",
      processData:false,
      contentType:false,
      success:function(res)
      {
        console.log(res);
        $.ajax({
          url : "website_editor/customer_intro_web.php",
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
               // CKEDITOR.instances.editor1.setData('');
               // CKEDITOR.instances.editor2.setData('');
              CKEDITOR.instances.editor3.setData('');
              
           }
       }
   }

</script> 
 <script>
// CKEDITOR.replace( 'editor1' );
// CKEDITOR.replace( 'editor2' );
CKEDITOR.replace( 'editor3' );
</script>