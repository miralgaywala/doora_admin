
<?php
require_once "connection.php";
$qy = "select * from merchant_doora_do_web where id=".$_POST['eid'];
$str1 = mysqli_query($cn,$qy);
$res=mysqli_fetch_array($str1);
?>

<section class="content-header" id="app_div1"> 
  <h4>Update Merchant What Can Doora Do Section</h4>
    <ol class="breadcrumb">
      <button class="btn btn-primary" onclick="back();" style="margin-left: 150px;">Back</i></button>
    </ol>
</section>

<section class="content">
  <div class="box" style="margin-top: -1px">
    <form role="form" method="post" enctype="multipart/form-data" id="what_d_frm">
      <div class="box-body">
       <div class="form-group">
          <label for="category">Image1</label>
          <input type="file" name="img1" value="<?php echo $res['image1']; ?>" class="form-control" id="cimg">
        </div>

        <div class="row">
          <div class="col-md-6">
            <?php
              if($res['image1']=="")
              {
                ?>
                  <img src="<?= NO_IMAGE_PATH ?>"  height="100px" class="cimg" >
                <?php
              }
              else
              {
                ?>
                <img src="<?php echo IMAGE_SRC_PATH_NEW.$res['image1']; ?>?<?=rand(1,32000)?>"  height="100px" class="cimg" >
                <?php
              }
            ?>
          </div>
        </div><br>

        <div class="form-group">
          <label for="category">Image1 Description</label>
          <textarea id="m_editor_1" name="i1_desc" rows="10" cols="80"><?php echo $res['image1_desc']; ?></textarea>
        </div>

        <div class="form-group">
          <label for="category">Image2</label>
          <input type="file" name="img2" value="<?php echo $res['image2']; ?>" class="form-control" id="cimg1">
        </div>

        <div class="row">
          <div class="col-md-6">
            <?php
              if($res['image2']=="")
              {
                ?>
                  <img src="<?= NO_IMAGE_PATH ?>"  height="100px" class="cimg1" >
                <?php
              }
              else
              {
                ?>
                <img src="<?php echo IMAGE_SRC_PATH_NEW.$res['image2']; ?>?<?=rand(1,32000)?>"  height="100px" class="cimg1" >
                <?php
              }
            ?>
          </div>
        </div><br>

        <div class="form-group">
          <label for="category">Image2 Description</label>
          <textarea id="m_editor_2" name="i2_desc" rows="10" cols="80"><?php echo $res['image2_desc']; ?></textarea>
        </div>

        <div class="form-group">
          <label for="category">Image3</label>
          <input type="file" name="img3" value="<?php echo $res['image3']; ?>" class="form-control" id="cimg2">
        </div>

        <div class="row">
          <div class="col-md-6">
            <?php
              if($res['image3']=="")
              {
                ?>
                  <img src="<?= NO_IMAGE_PATH ?>"  height="100px" class="cimg2" >
                <?php
              }
              else
              {
                ?>
                <img src="<?php echo IMAGE_SRC_PATH_NEW.$res['image3']; ?>?<?=rand(1,32000)?>"  height="100px" class="cimg2">
                <?php
              }
            ?>
          </div>
        </div><br>

        <div class="form-group">
          <label for="category">Image3 Description</label>
          <textarea id="m_editor_3" name="i3_desc" rows="10" cols="80"><?php echo $res['image3_desc']; ?></textarea>
        </div>

        <div class="form-group">
          <label for="category">Image4</label>
          <input type="file" name="img4" value="<?php echo $res['image4']; ?>" class="form-control" id="cimg3">
        </div>

        <div class="row">
          <div class="col-md-6">
             <?php
              if($res['image4']=="")
              {
                ?>
                  <img src="<?= NO_IMAGE_PATH ?>"  height="100px" class="cimg3" >
                <?php
              }
              else
              {
                ?>
                <img src="<?php echo IMAGE_SRC_PATH_NEW.$res['image4']; ?>?<?=rand(1,32000)?>"  height="100px" class="cimg3" >
                <?php
              }
            ?>
          </div>
        </div><br>

        <div class="form-group">
          <label for="category">Image4 Description</label>
          <textarea id="m_editor_4" name="i5_desc" rows="10" cols="80"><?php echo $res['image4_desc']; ?></textarea>
        </div>


        <div class="form-group">
          <label for="category">Image5</label>
          <input type="file" name="img5" value="<?php echo $res['image5']; ?>" class="form-control" id="cimg4">
        </div>

        <div class="row">
          <div class="col-md-6">
             <?php
              if($res['image5']=="")
              {
                ?>
                  <img src="<?= NO_IMAGE_PATH ?>"  height="100px" class="cimg4" >
                <?php
              }
              else
              {
                ?>
                <img src="<?php echo IMAGE_SRC_PATH_NEW.$res['image5']; ?>?<?=rand(1,32000)?>"  height="100px" class="cimg4">
                <?php
              }
            ?>
          </div>
        </div><br>

        <div class="form-group">
          <label for="category">Image5 Description</label>
          <textarea id="m_editor_5" name="i5_desc" rows="10" cols="80"><?php echo $res['image5_desc']; ?></textarea>
        </div>


         <div class="form-group">
          <label for="category">Image6</label>
          <input type="file" name="img6" value="<?php echo $res['image6']; ?>" class="form-control" id="cimg5">
        </div>

        <div class="row">
          <div class="col-md-6">
             <?php
              if($res['image6']=="")
              {
                ?>
                  <img src="<?= NO_IMAGE_PATH ?>"  height="100px" class="cimg5" >
                <?php
              }
              else
              {
                ?>
                <img src="<?php echo IMAGE_SRC_PATH_NEW.$res['image6']; ?>?<?=rand(1,32000)?>"  height="100px" class="cimg5">
                <?php
              }
            ?>
          </div>
        </div><br>

        <div class="form-group">
          <label for="category">Image5 Description</label>
          <textarea id="m_editor_6" name="i6_desc" rows="10" cols="80"><?php echo $res['image6_desc']; ?></textarea>
          <input type="hidden" name="did" value="<?php echo $res['id']; ?>">
        </div>

        <div class="box-footer">
          <button type="button"  class="btn btn-primary" onclick="update_do();">Submit</button>
           <input name="reset" type="reset" style="margin-left: 10px" value="Reset" onclick="resetForm('what_d_frm'); return false;" class="btn btn-default" />

        </div>
      </div>
      </form>
  </div>
</section>
<script type="text/javascript">
function update_do()
{
  var fr = $("#what_d_frm")[0];
  var frdt1 = new FormData(fr);
  var m_desc1 = CKEDITOR.instances.m_editor_1.getData();
  var m_desc2 = CKEDITOR.instances.m_editor_2.getData();
  var m_desc3 = CKEDITOR.instances.m_editor_3.getData();
  var m_desc4 = CKEDITOR.instances.m_editor_4.getData();
  var m_desc5 = CKEDITOR.instances.m_editor_5.getData();
  var m_desc6 = CKEDITOR.instances.m_editor_6.getData();

    frdt1.append('m_desc1', m_desc1);
    frdt1.append('m_desc2', m_desc2);
    frdt1.append('m_desc3', m_desc3);
    frdt1.append('m_desc4', m_desc4);
    frdt1.append('m_desc5', m_desc5);
    frdt1.append('m_desc6', m_desc6);

  $.ajax({
        url : "website_editor/update_mer_doora_do.php",
        method:"post",
        data : frdt1,
        processData:false,
        contentType:false,
        success:function(res)
        {
          console.log(res);
            $.ajax({
                url : "website_editor/merchant_doora_do_web_list.php",
                success:function(res)
                {
                   alert('Done'); gototop(); $(".content-wrapper").html(res); 
                }
          });
        }

  });
}

  CKEDITOR.replace('m_editor_1');
  CKEDITOR.replace('m_editor_2');
  CKEDITOR.replace('m_editor_3');
  CKEDITOR.replace('m_editor_4');
  CKEDITOR.replace('m_editor_5');
  CKEDITOR.replace('m_editor_6');

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
               CKEDITOR.instances.m_editor_1.setData('');
               CKEDITOR.instances.m_editor_2.setData('');
              CKEDITOR.instances.m_editor_3.setData('');
              CKEDITOR.instances.m_editor_4.setData('');
              CKEDITOR.instances.m_editor_5.setData('');
              CKEDITOR.instances.m_editor_6.setData('');
              
           }
       }
   }

 $('#cimg').change(function() {            
    var imagePath = $("#cimg").val();           
    $(".cimg").attr("src",URL.createObjectURL(event.target.files[0]));            
     // alert(URL.createObjectURL(event.target.files[0]));            
    });

 $('#cimg1').change(function() {            
    var imagePath = $("#cimg").val();           
    $(".cimg1").attr("src",URL.createObjectURL(event.target.files[0]));            
     // alert(URL.createObjectURL(event.target.files[0]));            
    });

 $('#cimg2').change(function() {            
    var imagePath = $("#cimg").val();           
    $(".cimg2").attr("src",URL.createObjectURL(event.target.files[0]));            
     // alert(URL.createObjectURL(event.target.files[0]));            
    });

 $('#cimg3').change(function() {            
    var imagePath = $("#cimg3").val();           
    $(".cimg3").attr("src",URL.createObjectURL(event.target.files[0]));            
     // alert(URL.createObjectURL(event.target.files[0]));            
    });

 $('#cimg4').change(function() {            
    var imagePath = $("#cimg4").val();           
    $(".cimg4").attr("src",URL.createObjectURL(event.target.files[0]));            
     // alert(URL.createObjectURL(event.target.files[0]));            
    });

  $('#cimg5').change(function() {            
    var imagePath = $("#cimg5").val();           
    $(".cimg5").attr("src",URL.createObjectURL(event.target.files[0]));            
     // alert(URL.createObjectURL(event.target.files[0]));            
    });

 function back()
  {
    $.ajax({
                url : "website_editor/merchant_doora_do_web_list.php",
                success:function(res)
                {
                   // alert('Done'); 
                   gototop(); $(".content-wrapper").html(res); 
                }
          });
  }

</script> 
