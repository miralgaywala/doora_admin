<?php
require_once "connection.php";
$str = "select * from home_customer_web where id=".$_POST['eid'];
$str1 = mysqli_query($cn,$str);
$row=mysqli_fetch_array($str1);

?>

<section class="content-header" id="app_div1"> 
  <h4>Update Home's Customer Section</h4>
    <ol class="breadcrumb">
      <button class="btn btn-primary" onclick="back();" style="margin-left: 150px;">Back</i></button>
    </ol>
</section>

<section class="content">
  <div class="box" style="margin-top: -1px">
    <form role="form" method="post" enctype="multipart/form-data" id="cust_frm">
      <div class="box-body">
        <div class="form-group">
          <label for="category">Title</label>
          <input type="text" name="title1" value="<?php echo $row['title']; ?>" class="form-control">
          <!-- <textarea id="editor1" name="title1" rows="10" cols="80"><?php echo $row['title']; ?></textarea> -->
        </div>

        <div class="form-group">
          <label for="category">Description</label>
          <textarea id="editor2" name="desc1" rows="10" cols="80"><?php echo $row['description']; ?></textarea>
        </div>

        <div class="form-group">
          <label for="category">Button Text</label>
          <input type="text" name="btn_text" value="<?php echo $row['button_text']; ?>" class="form-control">
        </div>


        <div class="form-group">
          <label for="category">Image</label>
          <input type="file" class="form-control" name="image_1" value="<?php echo $row['image1']; ?>" id="cimg">
          <input type="hidden" class="form-control" name="hiddenid" value="<?php echo $row['id']; ?>">
        </div>
  
        <div>
          <?php
            if($row['image1']=="")
            {
              ?>
                <img src="<?= NO_IMAGE_PATH ?>" width="135px" height="180px"  class="cimg">
              <?php
            }
            else
            {
              ?>
                <img src="<?php echo IMAGE_SRC.$row['image1']; ?>?<?=rand(1,32000)?>" width="135px" height="180px"  class="cimg">
              <?php
            }
          ?>
        </div>
      
        <div class="box-footer">
          <button type="button"  class="btn btn-primary" onclick="update_dd_web();">Submit</button>
          <input name="reset" type="reset" style="margin-left: 10px" value="Reset" onclick="resetForm('cust_frm'); return false;" class="btn btn-default" />
        </div>
      </form>
  </div>
</section>
<script type="text/javascript">
  $('#cimg').change(function() {            
    var imagePath = $("#cimg").val();           
    $(".cimg").attr("src",URL.createObjectURL(event.target.files[0]));     
    });

function update_dd_web()
{
  // var title = CKEDITOR.instances.editor1.getData();
  var desc = CKEDITOR.instances.editor2.getData();
  

  var fr = $("#cust_frm")[0];
  var frdata = new FormData(fr);
  // frdata.append('title1', title);
  frdata.append('desc1', desc);

  $.ajax({
      url : "website_editor/update_home_customer_web.php",
      data:frdata,
      method:"post",
      processData:false,
      contentType:false,
      success:function(res)
      {
        console.log(res);
        $.ajax({
          url : "website_editor/home_customer_web_list.php",
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
         url : "website_editor/home_customer_web_list.php",
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