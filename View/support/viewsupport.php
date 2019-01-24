<?php 
include "../../View/header/header.php";
 include "../../View/header/sidemenu.php";
?> 
 
 
<!--Main Content -->
    <section class="content">
      <div class="row">
        <div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>View Support</h2></div>
        <div class="col-md-2">
                <br/>   
               <!-- <a href="http://localhost/sprookr/adminpanel/Controller/category/displaycategorycontroller.php" class="btn btn-default"><b><- Back</b></a>-->
               <button style="float: right;" onclick="window.location.href='../../Controller/support/viewsupport_controller.php'" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>
           <!-- <a href="/sprookr/adminpanel/View/category/addcategory.php" class="btn btn-primary">+ Add Category</a>-->
        </div>
      </div> 
        <div class="row">
        	<div class="col-xs-12">
        		<div class="box">            
        			<div class="box-body">
        			 <table style="font-size: 15px;" style="width: 100%;" class="table table-striped">
                  <?php
                   foreach ($display_support as $key => $data) 
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
               ?>
                  <tr>
                  <td style="width: 20%">Support Id </td>
                  <td><?php echo $data['support_id'];?></td>
                  </tr>
                  <tr>
                  <td style="width: 20%">User Id </td>
                  <td><?php echo $data['user_id'];?></td>
                  </tr>
                   <tr>
                  <td style="width: 20%">User Name </td>
                  <td><?php echo $data['name'];?></td>
                  </tr>
                  <tr>
                  <td style="width: 20%">Message </td>
                  <td><?php echo $html;?></td>
                  </tr>
                   <tr>
                  <td style="width: 20%">Is Deleted </td>
                  <td><?php if($data['is_deleted'] == 0)
                  {
                    echo "No";
                  }
                  else
                    {
                      echo "Yes";
                    }?></td>
                  </tr>
                  <tr>
                  <td style="width: 20%">Created Date </td>
                  <td><?php echo $data['created_at'];?></td>
                  </tr>
                  <tr>
                  <td style="width: 20%">Upadted Date</td>
                  <td><?php echo $data['updated_at'];?></td>
                  </tr>
                <?php } ?>
                </table>
        			</div>
        		</div>
        	</div>	
          <?php
           ?>
    </section>
</div>

 <?php 
include "../../View/header/footer.php";?> 
 
     
                       
 