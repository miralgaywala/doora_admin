
<?php
require_once "connection.php";
$qy = "select * from customer_about_web where id=".$_POST['eid'];
$str1 = mysqli_query($cn,$qy);
$res=mysqli_fetch_array($str1);
?>

<section class="content-header" id="app_div1"> 
  <h4>Update Customer About Section</h4>
    <ol class="breadcrumb">
      <button class="btn btn-primary" onclick="back();" style="margin-left: 150px;">Back</i></button>
    </ol>
</section>

<section class="content">
  <div class="box" style="margin-top: -1px">
    <form role="form" method="post" enctype="multipart/form-data" id="cust_frm1">
      <div class="box-body">

        <div class="form-group">
          <label for="category">Image1</label>
          <input type="file" name="im_1" value="<?php echo $res['image1']; ?>" class="form-control" id="cimg">
        </div>

         <div class="row">
          <div class="col-md-6">
          <?php
           if($res['image1']=="")
           {
            ?>
              <img src="<?= NO_IMAGE_PATH ?>"  class="cimg" width="100px" height="170px">
            <?php
           }
           else
           {
            ?>
              <img src="<?php echo IMAGE_SRC.$res['image1']; ?>?<?=rand(1,32000)?>"  class="cimg" width="100px" height="170px">
            <?php
           }
          ?>
          </div>
        </div><br>


        <div class="form-group">
          <label for="category">Image1 Title</label>
          <!-- <textarea id="editor_1" name="image1_title" rows="10" cols="80"><?php echo $res['image1_title']; ?></textarea> -->
          <input type="text" name="title_1" value="<?php echo $res['image1_title']; ?>" class="form-control">
        </div>

        <div class="form-group">
          <label for="category">Image1 Description</label>
          <textarea id="editor_2" name="image1_desc" rows="10" cols="80"><?php echo $res['image1_desc']; ?></textarea>
        </div>

        <div class="form-group">
          <label for="category">Image2</label>
          <input type="file" name="im_2" value="<?php echo $res['image2']; ?>" class="form-control" id="cimg1">
        </div>

         <div class="row">
          <div class="col-md-6">
          <?php
           if($res['image2']=="")
           {
            ?>
              <img src="<?= NO_IMAGE_PATH ?>"  class="cimg1" width="100px" height="170px">
            <?php
           }
           else
           {
            ?>
              <img src="<?php echo IMAGE_SRC.$res['image2']; ?>?<?=rand(1,32000)?>"   class="cimg1" width="100px" height="170px">
            <?php
           }
          ?>
          </div>
        </div><br>


        <div class="form-group">
          <label for="category">Image2 Title</label>
          <input type="text" name="title_2" value="<?php echo $res['image2_title']; ?>" class="form-control">
          <!-- <textarea id="editor_3" name="image2_title" rows="10" cols="80"><?php echo $res['image2_title']; ?></textarea> -->
        </div>

        <div class="form-group">
          <label for="category">Image2 Description</label>
          <textarea id="editor_4" name="image2_desc" rows="10" cols="80"><?php echo $res['image2_desc']; ?></textarea>
        </div>

        <div class="form-group">
          <label for="category">Image3</label>
          <input type="file" name="im_3" value="<?php echo $res['image3']; ?>" class="form-control" id="cimg2" >
        </div>

         <div class="row">
          <div class="col-md-6">
            
            <?php
           if($res['image3']=="")
           {
            ?>
              <img src="<?= NO_IMAGE_PATH ?>"  class="cimg2" width="100px" height="170px">
            <?php
           }
           else
           {
            ?>
              <img src="<?php echo IMAGE_SRC.$res['image3']; ?>?<?=rand(1,32000)?>" width="100px" height="170px" class="cimg2">
            <?php
           }
          ?>
          </div>
        </div><br>


        <div class="form-group">
          <label for="category">Image3 Title</label>
          <input type="text" name="title_3" value="<?php echo $res['image3_title']; ?>" class="form-control">
          <!-- <textarea id="editor_5" name="image3_title" rows="10" cols="80"><?php echo $res['image3_title']; ?></textarea> -->
        </div>

        <div class="form-group">
          <label for="category">Image3 Description</label>
          <textarea id="editor_6" name="image3_desc" rows="10" cols="80"><?php echo $res['image3_desc']; ?></textarea>
          <input type="hidden" name="custid" value="<?php echo $res['id']; ?>">
        </div>

       
        <div class="box-footer">
          <button type="button"  class="btn btn-primary" onclick="update_cust();">Submit</button>
          <input name="reset" type="reset" style="margin-left: 10px" value="Reset" onclick="resetForm('cust_frm1'); return false;" class="btn btn-default" />
        </div>
      </form>
  </div>
</section>
<script type="text/javascript">
function update_cust()
{
  var fr = $("#cust_frm1")[0];
  var frmdt = new FormData(fr);
  // var title1 = CKEDITOR.instances.editor_1.getData();
  var desc1 = CKEDITOR.instances.editor_2.getData();
  // var title2 = CKEDITOR.instances.editor_3.getData();
  var desc2 = CKEDITOR.instances.editor_4.getData();
  // var title3 = CKEDITOR.instances.editor_5.getData();
  var desc3 = CKEDITOR.instances.editor_6.getData();
  // frmdt.append('title_1', title1);
  frmdt.append('desc_1', desc1);
  // frmdt.append('title_2', title2);
  frmdt.append('desc_2', desc2);
  // frmdt.append('title_3', title3);
  frmdt.append('desc_3', desc3);

  $.ajax({
        url : "website_editor/update_customer_about.php",
        method:"post",
        data : frmdt,
        processData:false,
        contentType:false,
        success:function(res)
        {
          console.log(res);
            $.ajax({
                url : "website_editor/customer_about_web_list.php",
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
            
    });

 $('#cimg1').change(function() {            
    var imagePath = $("#cimg").val();           
    $(".cimg1").attr("src",URL.createObjectURL(event.target.files[0]));            
       
    });

 $('#cimg2').change(function() {            
    var imagePath = $("#cimg").val();           
    $(".cimg2").attr("src",URL.createObjectURL(event.target.files[0]));            
            
    });

 function back()
  {
    $.ajax({
      url : "website_editor/customer_about_web_list.php",
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
               // CKEDITOR.instances.editor_1.setData('');
               CKEDITOR.instances.editor_2.setData('');
              // CKEDITOR.instances.editor_3.setData('');
              CKEDITOR.instances.editor_4.setData('');
              // CKEDITOR.instances.editor_5.setData('');
              CKEDITOR.instances.editor_6.setData('');
              
           }
       }
   }

// CKEDITOR.replace( 'editor_1' );
CKEDITOR.replace( 'editor_2' );
// CKEDITOR.replace( 'editor_3' );
CKEDITOR.replace( 'editor_4' );
// CKEDITOR.replace( 'editor_5' );
CKEDITOR.replace( 'editor_6' );
</script> 
