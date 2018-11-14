<?php include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/header.php");
 include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/sidemenu.php");
 ?>
<section class="content">
   
    	<div class="row">
    		<div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Support List</h2></div>
    		<div class="col-md-2">
                <br/>   
    		</div>
    	</div> 
        <?php 
            if($msg==0)
            {
               $msg='<div class="alert alert-info alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Support request has been open successfully
                </div>';
                echo $msg;
          }
          else if($msg==2)
          {
                $msg='<div class="alert alert-info alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Support request has been closed successfully
                </div>';
                echo $msg;           
          }
         else if($msg==3)
          {
                $msg='<div class="alert alert-info alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Support request has been deleted successfully
                </div>';
                echo $msg;           
          }
           ?>
        <div class="row">
        	<div class="col-xs-12">
        	
        		<div class="box">
        				<div class="box-body">
        				<table id="example1" class="table table-bordered table-hover">
			                <thead>
			                <tr>
			                  <th style="text-align:center;" width="5%">#</th>
			                  <th style="text-align:center;" width="5%">Support id</th>
                        <th style="text-align:center;" width="5%">User Name</th>
			                  <th style="text-align:center;">Message</th>
			                  <th style="text-align:center;" width="10%">Action</th>
			                </tr>
							 </thead>
                <?php
                $i=0;
                foreach ($display_support as $key => $data) 
                {   
                  $str   = ''.$data[2].'';
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
                                <td style="text-align:center;"><?php echo $data[0]; ?></td>
                                <td style="text-align:center;"><?php echo $data[7]; ?></td>
                                <td style="text-align:center;"><?php echo $html; ?></td>
                                <td style="text-align:center;">
                          
                                    <div >
                      
                                        <a onclick="javascript: return confirm('Do you really want to delete this support request?');" <?php echo "href=/doora/adminpanel/Controller/support/deletesupport_controller.php?id=".$data[0];?>  title="Delete" >
                                        <i class="fa fa-trash-o fa-fw"></i>
                                        </a>
                                        <a <?php echo "href=/doora/adminpanel/Controller/support/displaysupport_controller.php?id=".$data[0];?> title="View all detail">
                                          <i class="fa fa-eye"></i>
                                        </a>
                                        <br>
                                        <a <?php $value=$data[3]; if($value == 1 ){ ?>
                                        onclick="javascript: return confirm('Do you really want to close this support request?');"
                                      <?php } else{ ?>
                                        onclick="javascript: return confirm('Do you really want to open this support request?');"
                                      <?php }?> <?php  $value=$data[3]; if($value == 1 ){ ?> style="color: red;" <?php } else {?> style="color: green;"<?php }?>
                                      <?php echo "href=/doora/adminpanel/Controller/support/isopen_controller.php?id=".$data[0]."&value=".$data[3];?>><?php $value=$data[3]; if($value == 1 ){
                                        echo "Open";
                                      }
                                      else
                                      {
                                        echo "Close"; 
                                      } ?></a>
                                    </div>
                                </td>
                                 </tr>
                           <?php  } ?>
                  </table>
        			</div>
        		</div>
        	</div>	
       </div>
    </section>
</div>
 <?php include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/footer.php");?>  