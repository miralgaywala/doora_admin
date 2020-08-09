<?php
require_once "connection.php";
$rs = "select * from home_about_web";
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
        <th style="text-align: center">Image1</th>
        <th style="text-align: center;">Image2</th>
        <th style="text-align: center;">Image3</th>
        <th style="text-align: center;">Action</th>
      </thead>
      <tbody>
        <?php
          while ($res=mysqli_fetch_array($str1))
          {
            ?>
              <tr align="center">
                <td>
                    <?php
                       if($res['image1']=="")
                       {
                        ?>
                          <img src="<?= NO_IMAGE_PATH ?>" width="100px" height="100px">
                        <?php
                       }
                       else
                       {
                        ?>
                           <img src="<?php echo IMAGE_SRC.$res['image1']; ?>?<?=rand(1,32000)?>" width="100px" height="180px">
                        <?php
                       }
                    ?>
                </td>
                <td>
                   <?php
                       if($res['image2']=="")
                       {
                        ?>
                          <img src="<?= NO_IMAGE_PATH ?>" width="100px" height="100px">
                        <?php
                       }
                       else
                       {
                        ?>
                          <img src="<?php echo IMAGE_SRC.$res['image2']; ?>?<?=rand(1,32000)?>" width="100px" height="180px">
                        <?php
                       }
                      ?>
                </td>
                <td>
                     <?php
                     if($res['image3']=="")
                     {
                      ?>
                        <img src="<?= NO_IMAGE_PATH ?>" width="100px" height="100px">
                      <?php
                     }
                     else
                     {
                      ?>
                        <img src="<?php echo IMAGE_SRC.$res['image3']; ?>?<?=rand(1,32000)?>" width="100px" height="180px">
                      <?php
                     }
                    ?>
                </td>
                <td><a href='javaScript:void(0);' onclick='edit_img("<?php echo $res['id']; ?>");'> <i class='fa fa-edit' style="margin-left: 10px;margin-top: 30px"></i></a></td>
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

         url : "website_editor/home_about_web.php",
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