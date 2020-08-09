<script type="text/javascript">
  $(document).ready(function() {
   $('#example2').DataTable( {
    });
} );
  function listsupport(data)
      {
            hash_id = data;
            $.ajax({
                 url:"../../Controller/support/viewsupport_controller.php",
                 method:"POST",
                 success:function(data)
                 {
                     
                      $('.content-wrapper').html(data);
                      $(hash_id).show();
                 }
              })
      }
      function viewsupport(id)
      {
            $.ajax({
                 url:"../../Controller/support/displaysupport_controller.php?id="+id,
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                        
                 }
              })
      }

    //    $(document).ready(function(){
    //   $('#active').change(function(){
    //       loadactivefilter()
    //   })
    // })
      function loadactivefilter(){
       // console.log($('#year').val());
        var radio=$("input[name='optradio']:checked").val();
       
        $.ajax({
       url: '../../Controller/support/active_filter.php',
       data : {radio:radio},
       type: 'POST',
       success: function(data) {
        //console.log(data);
               $('.content-wrapper').html(data);
           }

      });
        
}



</script> 
<?php
if($_POST['radio'])
{
 $checked = $_POST['radio'];
 // echo "$checked";
 //echo "hi";
}
else
{
 $checked = "";
}
?>
<section class="content">
   
    	<div class="row">
    		<div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Support List</h2></div>
    		<div class="col-md-2">
                <br/>   
    		</div>
    	</div> 
                <div class="alert alert-info alert-dismissible" style="display: none;" id="open">
                <a href="#" class="close" data-dismiss="alert" aria-label="close" >&times;</a>
                Support request has been close successfully
                </div>
                <div class="alert alert-info alert-dismissible" style="display: none;" id="close">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Support request has been open successfully
                </div>
                <div class="alert alert-info alert-dismissible"  style="display: none;" id="delete">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Support request has been deleted successfully
                </div>
        <div class="row">
        	<div class="col-xs-12">
        	
        		<div class="box">
        				<div class="box-body">
                  <div class="row">
              <div class="col-sm-4"></div>

                  <label class="radio-inline col-sm-2" style="margin-top: 25px;">
                        <input type="radio" name="optradio" id="active" checked value="all" onclick="loadactivefilter()" <?php if("all" == $checked) {?> checked <?php }?>>All
                  </label>
                          <label class="radio-inline col-sm-2" style="margin-top: 25px;">
                        <input type="radio" name="optradio" id="active" value="open" onclick="loadactivefilter()" <?php if("open" == $checked) {?> checked <?php }?>>Open
                  </label>
                <label class="radio-inline col-sm-2" style="margin-top: 25px;">
                        <input type="radio" name="optradio" id="active" value="close" onclick="loadactivefilter()" <?php if("close" == $checked) {?> checked <?php }?>>Close
                  </label>
                
                  </div>  
                  <hr>
        				<table id="example2" class="table table-bordered table-hover">
			                <thead>
			                <tr>
			                  <th style="text-align:center;" width="5%">#</th>
			                  <th style="text-align:center;" width="10%">Support Id</th>
                        <th style="text-align:center;" width="10%">User Name</th>
			                  <th style="text-align:center;">Message</th>
                         <th style="text-align:center;">Status</th>
			                  <th style="text-align:center;" width="10%">Action</th>
			                </tr>
							 </thead>
               <tbody id="result">
                <?php
                $i=0;
                foreach ($support_filter as $key => $data) 
                {   
                  $str   = ''.$data['message'].'';
    $regex = '/\\\u([dD][89abAB][\da-fA-F]{2})\\\u([dD][c-fC-F][\da-fA-F]{2})
          |\\\u([\da-fA-F]{4})/sx';
    $html= preg_replace_callback($regex, function($matches) {

        if (isset($matches[3])) {
            $cp = hexdec($matches[3]);
        } else {
            $lead  = hexdec($matches[1]);
            $trail = hexdec($matches[2]);

            // http://unicode.org/faq/utf_bom.html#utf16-4
            $cp = ($lead << 10) + $trail + 0x10000 - (0xD800 << 10) - 0xDC00;
        }

        // https://tools.ietf.org/html/rfc3629#section-3
        // Characters between U+D800 and U+DFFF are not allowed in UTF-8
        if ($cp > 0xD7FF && 0xE000 > $cp) {
            $cp = 0xFFFD;
        }

        // https://github.com/php/php-src/blob/php-5.6.4/ext/standard/html.c#L471
        // php_utf32_utf8(unsigned char *buf, unsigned k)

        if ($cp < 0x80) {
            return chr($cp);
        } else if ($cp < 0xA0) {
            return chr(0xC0 | $cp >> 6) . chr(0x80 | $cp & 0x3F);
        }

        return html_entity_decode('&#' . $cp . ';');
    }, $str);

                  ?> <tr>
                                <td style="text-align:center;"><?php echo $i=$i+1;?></td>
                                <td style="text-align:center;"><?php echo $data['support_id']; ?></td>
                                <td style="text-align:center;"><?php echo $data['name']; ?></td>
                                <td style="text-align:center;"><?php echo $html; ?></td>
                                <td style="text-align:center;"><?php $value=$data['is_open']; if($value == 1 ){
                                        echo "Open";
                                      }
                                      else
                                      {
                                        echo "Close"; 
                                      } ?> </td>
                                <td style="text-align:center;">
                          
                                    <div >
                                        <a onclick="JSconfirm(<?php echo $data['support_id']; ?>)"  <?php //echo "href=../../Controller/support/deletesupport_controller.php?id=".$data['support_id'];?>  title="Delete" style="cursor: pointer;">
                                        <i class="fa fa-trash-o fa-fw"></i>
                                        </a>
                                        <a onclick="viewsupport(<?php echo $data['support_id']; ?>)"<?php //echo "href=../../Controller/support/displaysupport_controller.php?id=".$data['support_id'];?> title="View all detail" style="cursor: pointer;">
                                          <i class="fa fa-eye"></i>
                                        </a>
                                        <br>
                                        <a style="cursor: pointer;" 
                                        <?php $value=$data['is_open']; if($value == 0 ){ ?>
                                        onclick="Jsclosealrt(<?php echo $value; ?>,<?php echo $data['support_id']; ?>)"
                                        <?php } else{ ?>
                                        onclick="Jsopenalrt(<?php echo $value; ?>,<?php echo $data['support_id']; ?>)"
                                      <?php }?> <?php  $value=$data['is_open']; if($value == 0 ){ ?>  
                                      <?php } else {?> <?php }?>
                                      >
                                      <?php $value=$data['is_open']; if($value == 0 ){
                                        echo "Open Request";
                                      }
                                      else
                                      {
                                        echo "Close Request"; 
                                      } ?>
                                        
                                      </a>
                                    </div>
                                </td>
                                 </tr>
                           <?php  } ?>
                           </tbody>
                  </table>
        			</div>
        		</div>
        	</div>	
       </div>
    </section>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script type="text/javascript">
function Jsopenalrt(value,id){
  $.confirm({
    title:'Close Request',
    content: 'Are you sure you want to close this support request ?',
    buttons: {
      Yes: {
            btnClass: 'btn-red any-other-class', 
          action: function(){
            var count_id = "request";
            $.ajax({
                 url:"../../Controller/support/support_controller.php",
                 method:"POST",
                 data : {count_id:count_id,value:value,id:id},
                 success:function(data)
                 {
                   listsupport(data);
                 }
              })
            //window.location.href='../../Controller/support/isopen_controller.php?id='+id+'&value='+value;
          }
        },
        No: {
            btnClass: 'btn-blue'
            
        }
    }
});
}
function Jsclosealrt(value,id){
  $.confirm({
    title:'Open Request',
    content: 'Are you sure you want to Open this support request ?',
    buttons: {
      Yes: {
            btnClass: 'btn-red any-other-class', 
          action: function(){
            //window.location.href='../../Controller/support/isopen_controller.php?id='+id+'&value='+value;
            var count_id = "request";
            $.ajax({
                 url:"../../Controller/support/support_controller.php",
                 method:"POST",
                 data : {count_id:count_id,value:value,id:id},
                 success:function(data)
                 {

                      listsupport(data);
                 }
              })
          }
        },
        No: {
            btnClass: 'btn-blue'
        }
    }
});
}
function JSconfirm(id){
  $.confirm({
    title:'Delete',
    content: 'Are you sure you want to delete this support request ?',
    buttons: {
      Yes: {
            btnClass: 'btn-red any-other-class', 
          action: function(){
            var count_id = "delete";
            $.ajax({
                 url:"../../Controller/support/support_controller.php",
                 method:"POST",
                 data : {count_id:count_id,id:id},
                 success:function(data)
                 {
                  
                      listsupport(data);
                 }
              })
          }
        },
        No: {
            btnClass: 'btn-blue'
            
        }
    }
});
}
</script>

<?php 
//include "../../View/header/footer.php";?> 