<?php
require_once "connection.php";
$rs = "select * from home_header_web";
$str1 = mysqli_query($cn,$rs);

?>
<section class="content-header" id="app_div1"> 
  <h4>Home Header Image Section</h4>
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
                    <img src="<?= NO_IMAGE_PATH ?>" height="140px">
                    <?php
                  }
                  else
                  {
                    ?>
                    <img src="<?php echo IMAGE_SRC.$res['image1']; ?>?<?=rand(1,32000)?>"  height="140px">

                    <?php
                  }
                  ?>

                </td>
                <td><a href='javaScript:void(0);' onclick='edit_img("<?php echo $res['id']; ?>");'> <i class='fa fa-edit' style="margin-top: 30px;margin-left: 10px"></i></a></td>
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

         url : "website_editor/home_header_web.php",
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

  function back()
  {
    $.ajax({
      url : "website_editor/home_about_web_list.php",
      method:"post",
      success:function(res)
      {
        // alert('Done'); 
        gototop(); $(".content-wrapper").html(res);
      }
    });
  }
</script>