
<?php
require_once "connection.php";
$qy = "select * from home_footer_web where id=".$_POST['eid'];
$str1 = mysqli_query($cn,$qy);
$res=mysqli_fetch_array($str1);
?>

<section class="content-header" id="app_div1"> 
  <h4>Update Home Footer Section</h4>
    <ol class="breadcrumb">
      <button class="btn btn-primary" onclick="back();" style="margin-left: 150px;">Back</i></button>
    </ol>
</section>

<section class="content">
  <div class="box" style="margin-top: -1px">
    <form role="form" method="post" enctype="multipart/form-data" id="ft_frm">
      <div class="box-body">
        <div class="form-group">
          <label for="category">Doora Button Text</label>
          <input type="text" name="doora_btn" value="<?php echo $res['doora_btn_text']; ?>" class="form-control">
        </div>

        <div class="form-group">
          <label for="category">Doora Button Icon</label>
          <input type="text" name="d_btn_icon" value="<?php echo $res['doora_btn_icon']; ?>" class="form-control">
        </div>

        <div class="row">
          <div class="col-md-6">
            <i class="<?php echo $res['doora_btn_icon']; ?>" aria-hidden="true" style="display: inline-block;font-style: normal;font-variant: normal;text-rendering: auto;font-size: 70px;color: white;background-color: #fb8a8a;padding:10px;border-radius: 10%" height="80px" ></i>
          </div></div><br>

        <div class="form-group">
          <label for="category">Mail Button Icon</label>
          
          <input type="file" name="m_btn_icon" value="<?php echo $res['mail_button_icon']; ?>" class="form-control" id="cimg">
        </div>

        <div class="row">
          <div class="col-md-6">
          <?php
            if($res['mail_button_icon']=="")
            {
              ?>
                <img src="<?= NO_IMAGE_PATH ?>"  height="100px" class="cimg" style='border-radius: 8%; padding: 10px; background-color: #f45e5e'>
              <?php
            }
            else
            {
              ?>
              <img src="<?php echo IMAGE_SRC.$res['mail_button_icon']; ?>?<?=rand(1,32000)?>"  height="100px" class="cimg" style='border-radius: 8%; padding: 10px; background-color: #f45e5e'>
              <?php
            }
          ?>
          </div>
        </div><br>

        <div class="form-group">
          <label for="category">Mail Button Redirection Url</label>
          <input type="text" name="m_btn_r_url" value="<?php echo $res['mail_btn_redirection_url']; ?>" class="form-control">
        </div>

        <div class="form-group">
          <label for="category">Facebook Button Icon</label>
          <input type="file" name="fb_btn_icon" value="<?php echo $res['fb_button_icon']; ?>" class="form-control" id="cimg1">
        </div>

         <div class="row">
          <div class="col-md-6">
            
             <?php
            if($res['fb_button_icon']=="")
            {
              ?>
                <img src="<?= NO_IMAGE_PATH ?>"  height="100px" class="cimg1" style='border-radius: 8%; padding: 10px; background-color: #f45e5e'>
              <?php
            }
            else
            {
              ?>
                <img src="<?php echo IMAGE_SRC.$res['fb_button_icon']; ?>?<?=rand(1,32000)?>"  height="100px" class="cimg1" style='border-radius: 8%; padding: 10px; background-color: #f45e5e'>
              <?php
            }
          ?>
          
          </div>
        </div><br>

        <div class="form-group">
          <label for="category">Facebook Redirection Url</label>
          <input type="text" name="fb_btn_r_url" value="<?php echo $res['fb_redirection_url']; ?>" class="form-control">
        </div>

        <div class="form-group">
          <label for="category">Instagram Button Icon</label>
          
          <input type="file" name="i_btn_icon" value="<?php echo $res['insta_button_icon']; ?>" class="form-control" id="cimg2">
        </div>

        <div class="row">
          <div class="col-md-6">
            <?php
            if($res['insta_button_icon']=="")
            {
              ?>
                <img src="Upload/noimg.png"  height="100px" class="cimg2" style='border-radius: 8%; padding: 10px; background-color: #f45e5e'>
              <?php
            }
            else
            {
              ?>
                <img src="<?php echo IMAGE_SRC.$res['insta_button_icon']; ?>"  height="100px" class="cimg2" style='border-radius: 8%; padding: 10px; background-color: #f45e5e'>
              <?php
            }
          ?>
        
          </div>
        </div><br>

        <div class="form-group">
          <label for="category">Instagram Redirection Url</label>
          <input type="text" name="i_btn_r_url" value="<?php echo $res['insta_redirection_url']; ?>" class="form-control">
        </div>

        <div class="form-group">
          <label for="category">Privacy Policy Link</label>
          <input type="text" name="pp_link" value="<?php echo $res['privacy_policy_link']; ?>" class="form-control">
        </div>
      
        <div class="form-group">
          <label for="category">Terms and Condition title</label>
          <input type="text" name="t_link" value="<?php echo $res['terms_link']; ?>" class="form-control">
        </div>

        <div class="form-group">
          <label for="category">Copyright Text</label>
          <textarea id="editor1" name="cr_text" rows="10" cols="80"><?php echo $res['copyright_text']; ?></textarea>
          
          <input type="hidden" name="fid" value="<?php echo $res['id']; ?>" class="form-control">
        </div>

        <div class="box-footer">
          <button type="button"  class="btn btn-primary" onclick="update_ft();">Submit</button>
          <input name="reset" type="reset" style="margin-left: 10px" value="Reset" onclick="resetForm('ft_frm'); return false;" class="btn btn-default" />
        </div>
      </form>
  </div>
</section>
<script type="text/javascript">
function update_ft()
{
  var fr = $("#ft_frm")[0];
  var frmdt = new FormData(fr);
  var cr_text = CKEDITOR.instances.editor1.getData();
  frmdt.append('cr_text', cr_text);

  $.ajax({
        url : "website_editor/update_home_footer.php",
        method:"post",
        data : frmdt,
        processData:false,
        contentType:false,
        success:function(res)
        {
          console.log(res);
            $.ajax({
                url : "website_editor/home_footer_list.php",
                method:"post",
                success:function(res)
                {
                    alert('Done'); gototop(); $(".content-wrapper").html(res);
                }

            });
        }

  });
}

CKEDITOR.replace( 'editor1' );

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
      url : "website_editor/home_footer_list.php",
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
               CKEDITOR.instances.editor1.setData('');
               
              
           }
       }
   }

</script> 
