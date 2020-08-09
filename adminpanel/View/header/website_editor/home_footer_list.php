<?php
require_once "connection.php";
$rs = "select * from home_footer_web";
$str1 = mysqli_query($cn,$rs);
?>
<section class="content-header" id="app_div1"> 
  <h4>Home About Image Section</h4>
    <ol class="breadcrumb"></ol>
</section>

<section class="content">
  <div class="box" style="margin-top: -1px" id="tblist">
    <table class="table table-bordered">
      <thead>
        <th style="text-align:center;">Image1</th>
        <th style="text-align:center;">Image2</th>
        <th style="text-align:center;">Image3</th>
        <th style="text-align:center;">Action</th>
      </thead>
      <tbody>
        <?php
          while ($res=mysqli_fetch_array($str1))
          {
            ?>
               <tr>
                  <td align="center">
                    <?php
                      if($res['mail_button_icon']=="")
                      {
                        ?>
                          <img src="<?= NO_IMAGE_PATH ?>"  height="100px">
                        <?php
                      }
                      else
                      {
                        ?>
                          <img src="<?php echo IMAGE_SRC_PATH_NEW.$res['mail_button_icon']; ?>?<?=rand(1,32000)?>" style='border-radius: 8%; padding: 10px; background-color: #f45e5e'  height="100px">
                        <?php
                      }
                    ?>
                  </td>
                  <td align="center">
                     <?php
                      if($res['fb_button_icon']=="")
                      {
                        ?>
                          <img src="<?= NO_IMAGE_PATH ?>"  height="100px">
                        <?php
                      }
                      else
                      {
                        ?>
                          <img src="<?php echo IMAGE_SRC_PATH_NEW.$res['fb_button_icon']; ?>?<?=rand(1,32000)?>" style='border-radius: 8%; padding: 10px; background-color: #f45e5e'  height="100px">
                        <?php
                      }
                    ?>
                  </td>
                  <td align="center">
                     <?php
                      if($res['insta_button_icon']=="")
                      {
                        ?>
                          <img src="<?= NO_IMAGE_PATH ?>"  height="100px">
                        <?php
                      }
                      else
                      {
                        ?>
                         <img src="<?php echo IMAGE_SRC_PATH_NEW.$res['insta_button_icon']; ?>?<?=rand(1,32000)?>" style='border-radius: 8%; padding: 10px;   background-color: #f45e5e'  height="100px">
                        <?php
                      }
                    ?>

                  </td>
                  <td align="center"><a href='javaScript:void(0);' onclick='edit_ft("<?php echo $res['id']; ?>");'> <i class='fa fa-edit' style="margin-top: 30px"></i></a></td>
                </tr>
            <?php
          }
        ?>
      </tbody>
    </table>
  </div>
  <div id="editfrm"></div>
</section>
<script type="text/javascript">
  function edit_ft(eid)
  {
    $.ajax({

         url : "website_editor/home_footer_web.php",
          method:"post",
          data:{eid:eid},
          success:function(res)
          {
            $("#editfrm").html(res);
            $("#tblist").hide();
            $('#app_div1').hide();
          }
    });
  }
</script>