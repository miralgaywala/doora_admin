<?php
require_once "connection.php";
$rs = "select * from doora_doollars_about_web";
$str1 = mysqli_query($cn,$rs);
$res=mysqli_fetch_array($str1);
?>
<section class="content-header" id="app_div1"> 
  <h4>Doora Doollars About Section</h4>
    <ol class="breadcrumb"></ol>
</section>

<section class="content">
  <div class="box" style="margin-top: -1px" id="tblist">
    <table class="table table-bordered">
      <thead>
        <th>Image1</th>
        <th>Action</th>
      </thead>
      <tbody>
        <tr>
          <td><?php
              if(!empty($res['image1']))
              {
                ?>
                <img src="<?php echo IMAGE_SRC_PATH_NEW.$res['image1']; ?>?<?=rand(1,32000)?>"  height="140px">
                
                <?php
              }
              else
              {
                ?>
                <img src="<?= NO_IMAGE_PATH ?>" height="140px">
                <?php
              }
              ?>
          </td>
          <td><a href='javaScript:void(0);' onclick='edit_dda("<?php echo $res['id']; ?>");'> <i class='fa fa-edit' style="margin-top: 30px;margin-left: 10px"></i></a></td>
        </tr>
      </tbody>
    </table>
  </div>
  <div id="editfrm"></div>
</section>
<script type="text/javascript">
  function edit_dda(eid)
  {
    $.ajax({

         url : "website_editor/doora_doollars_about_web.php",
          method:"post",
          data:{eid,eid},
          success:function(res)
          {
            $("#editfrm").html(res);
            $("#tblist").hide();
            $('#app_div1').hide();
          }
    });
  }
</script>