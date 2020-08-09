<?php
require_once "connection.php";
$rs = "select * from home_doora_dollars_web";
$str1 = mysqli_query($cn,$rs);

?>
<section class="content-header" id="app_div2"> 
  <h4>Home Doora Dollars Section</h4>
    <ol class="breadcrumb"></ol>
</section>

<section class="content">
  <div class="box" style="margin-top: -1px" id="tblist1">
    <table class="table table-bordered">
      <thead>
        <th>Image</th>
        <th>Action</th>
      </thead>
      <tbody>
        <?php
          while ($res=mysqli_fetch_array($str1))
          {
            ?>
              <tr>
                <td>
                  <?php
                    if($res['image1']=="")
                    {
                      ?>
                        <img src="<?= NO_IMAGE_PATH ?>" width="120px" height="180px">
                      <?php
                    }
                    else
                    {
                      ?>
                        <img src="<?php echo IMAGE_SRC_PATH_NEW.$res['image1']; ?>?<?=rand(1,32000)?>" width="120px" height="180px">
                      <?php
                    }
                  ?>
                </td>
                <td><a href='javaScript:void(0);' onclick='edit_dd("<?php echo $res['id']; ?>");'> <i class='fa fa-edit' style="margin-top: 30px;margin-left: 10px"></i></a></td>
              </tr>
            <?php
          }
        ?>
      </tbody>
    </table>
  </div>
  <div id="editfrm1"></div>
</section>
<script type="text/javascript">
function edit_dd(eid)
  {
    $.ajax({

         url : "website_editor/home_doora_dollars_web.php",
          method:"post",
          data:{eid:eid},
          success:function(res)
          {
            $("#editfrm1").html(res);
            $("#tblist1").hide();
            $('#app_div2').hide();
          }
    });
  }

 
</script> 