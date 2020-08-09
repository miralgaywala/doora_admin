<?php
require_once "connection.php";
$rs = "select * from home_customer_web";
$str1 = mysqli_query($cn,$rs);
$res=mysqli_fetch_array($str1);
?>
<section class="content-header" id="app_div1"> 
  <h4>Home's Customer Section</h4>
    <ol class="breadcrumb"></ol>
</section>

<section class="content">
  <div class="box" style="margin-top: -1px" id="tblist">
    <table class="table table-bordered">
      <thead>
        <th>Image</th>
        <th>Action</th>
      </thead>
      <tbody>
        <tr>
          <td>
            <?Php
               if($res['image1']=="")
              {
                ?>
                  <img src="<?= NO_IMAGE_PATH ?>" width="135px" height="180px"  class="cimg">
                <?php
              }
              else
              {
                ?>
                  <img src="<?php echo IMAGE_SRC.$res['image1']; ?>?<?=rand(1,32000)?>" width="135px" height="180px">  
                <?php
              }
            ?>

          </td>

          <td><a href='javaScript:void(0);' onclick='edit_client("<?php echo $res['id']; ?>");'> <i class='fa fa-edit' style="margin-top: 30px;margin-left: 10px"></i></a></td>
        </tr>
      </tbody>
    </table>
  </div>
  <div id="editfrm"></div>
</section>
<script type="text/javascript">
  function edit_client(eid)
  {
    $.ajax({

         url : "website_editor/home_customer_web.php",
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