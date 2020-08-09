<?php
require_once "connection.php";
$rs = "select * from merchant_doora_do_web";
$str1 = mysqli_query($cn,$rs);

?>
<section class="content-header" id="app_div1"> 
  <h4>Merchant What Can Doora Do Section</h4>
    <ol class="breadcrumb"></ol>
</section>

<section class="content">
  <div class="box" style="margin-top: -1px" id="tblist">
    <table class="table table-bordered">
      <thead>
        <th style="text-align:center;">Image1</th>
        <th style="text-align:center;">Image2</th>
        <th style="text-align:center;">Image3</th>
        <th style="text-align:center;">Image4</th>
        <th style="text-align:center;">Image5</th>
        <th style="text-align:center;">Image6</th>
        <th style="text-align:center;">Action</th>
      </thead>
      <tbody>
        <?php
        while($res=mysqli_fetch_array($str1))
        {
          ?>
            <tr>
                <td align="center">
                <?php
                  if($res['image1']=="")
                  {
                    ?>
                    <img src="<?= NO_IMAGE_PATH ?>"  height="100px">
                    <?php
                  }
                  else
                  {
                    ?>
                    <img src="<?php echo IMAGE_SRC_PATH_NEW.$res['image1']; ?>?<?=rand(1,32000)?>"  height="100px">
                    <?php
                  }
                ?>
                </td>
                <td align="center">
                <?php
                  if($res['image2']=="")
                  {
                    ?>
                    <img src="<?= NO_IMAGE_PATH ?>"  height="100px">
                    <?php
                  }
                  else
                  {
                    ?>
                    <img src="<?php echo IMAGE_SRC_PATH_NEW.$res['image2']; ?>?<?=rand(1,32000)?>"  height="100px">
                    <?php
                  }
                ?>
                </td>
                <td align="center">
                  <?php
                  if($res['image3']=="")
                  {
                    ?>
                    <img src="<?= NO_IMAGE_PATH ?>"  height="100px">
                    <?php
                  }
                  else
                  {
                    ?>
                    <img src="<?php echo IMAGE_SRC_PATH_NEW.$res['image3']; ?>?<?=rand(1,32000)?>"  height="100px">
                    <?php
                  }
                ?>
                </td>
                 <td align="center">
                  <?php
                    if($res['image4']=="")
                    {
                      ?>
                      <img src="<?= NO_IMAGE_PATH ?>"  height="100px">
                      <?php
                    }
                    else
                    {
                      ?>
                      <img src="<?php echo IMAGE_SRC_PATH_NEW.$res['image4']; ?>?<?=rand(1,32000)?>" height="100px">
                      <?php
                    }
                  ?>
                 </td>
                <td align="center">
                    <?php
                      if($res['image5']=="")
                      {
                        ?>
                        <img src="<?= NO_IMAGE_PATH ?>"  height="100px">
                        <?php
                      }
                      else
                      {
                        ?>
                        <img src="<?php echo IMAGE_SRC_PATH_NEW.$res['image5']; ?>?<?=rand(1,32000)?>"  height="100px">
                        <?php
                      }
                    ?>
                </td>
                <td align="center">
                  <?php
                      if($res['image6']=="")
                      {
                        ?>
                        <img src="<?= NO_IMAGE_PATH ?>"  height="100px">
                        <?php
                      }
                      else
                      {
                        ?>
                        <img src="<?php echo IMAGE_SRC_PATH_NEW.$res['image6']; ?>?<?=rand(1,32000)?>"  height="100px">
                        <?php
                      }
                    ?>

                </td>
                <td align="center"><a href='javaScript:void(0);' onclick='edit_img("<?php echo $res['id']; ?>");'> <i class='fa fa-edit' style="margin-top: 35px"></i></a></td>
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
  function edit_img(eid)
  {
    $.ajax({

         url : "website_editor/merchant_doora_do_web.php",
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