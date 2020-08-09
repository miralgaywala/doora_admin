<?php
require_once "connection.php";
$rs = "select * from merchant_gst_section";
$str1 = mysqli_query($cn,$rs);
// $res=mysqli_fetch_array($str1);
?>
<section class="content-header" id="app_div1"> 
  <h4>Merchant GST Section</h4>
    <ol class="breadcrumb"></ol>
</section>

<section class="content">
  <div class="box" style="margin-top: -1px" id="tblist">
    <table class="table table-bordered">
      <thead>
        <th style="text-align:center;">Image</th>
        <th style="text-align:center;">Action</th>
      </thead>
      <tbody>
        <?php
        while ($res = mysqli_fetch_array($str1))
        {
         ?>
         <tr>
          <td align="center">
           <?php
           if($res['image']=="")
           {
            ?>
            <img src="<?= NO_IMAGE_PATH ?>" width="100px" height="100px">
            <?php
           }
           else
           {
            ?>
            <img src="<?php echo IMAGE_SRC_PATH_NEW.$res['image']; ?>?<?=rand(1,32000)?>" width="100px">
            <?php
           }
           ?>
          </td>
          <td align="center"><a href='javaScript:void(0);' onclick='edit_mer("<?php echo $res['id']; ?>");'> <i class='fa fa-edit' style="margin-top: 30px;margin-left: 10px"></i></a></td>
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
  function edit_mer(eid)
  {
    $.ajax({

         url : "website_editor/edit_mer_gst_section.php",
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
