<?php //include("View/header.php");
include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/header.php");
 //include("View/sidemenu.php");
include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/sidemenu.php");
 ?>
 
 
<!--Main Content -->
    <section class="content">
      <div class="row">
        <div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>View Deal Detail</h2></div>
        <div class="col-md-2">
                <br/>   
               <!-- <a href="http://localhost/doora/adminpanel/Controller/category/displaycategorycontroller.php" class="btn btn-default"><b><- Back</b></a>-->
               <button style="float: right;" onclick="window.location.href='/doora/adminpanel/Controller/deal/viewdeal_controller.php'" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>
           <!-- <a href="/doora/adminpanel/View/category/addcategory.php" class="btn btn-primary">+ Add Category</a>-->
        </div>
      </div> 
        <div class="row">
        	<div class="col-xs-12">
        		<div class="box">            
        			<div class="box-body">
        				<table width=100%" style="font-size: 15px;">
                  <?php
                   foreach ($display_dealdetail as $key => $data) 
                  {
                    $str   = ''.$data[3].'';
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

    $str   = ''.$data[10].'';
    $regex = '/\\\u([dD][89abAB][\da-fA-F]{2})\\\u([dD][c-fC-F][\da-fA-F]{2})
          |\\\u([\da-fA-F]{4})/sx';
    $condition= preg_replace_callback($regex, function($matches) {

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
    if($data[13] == NULL)
                 {
                  $data[13] = "default.png";
                 }
                else if(file_exists($_SERVER['DOCUMENT_ROOT']."/doora/images/deal/".$data[13])) {
                  $data[13] = $data[13];
                 }
                 else
                 {
                  $data[13]= "default.png";
                 }     
               ?>
                  <tr>
                    <td>Business Deal Id</td>
                  <td><?php echo $data[0];?></td>
                  </tr>
                   <tr>
                    <td>Business User Id</td>
                  <td><?php echo $data[21];?></td>
                  </tr>
                  <tr>
                    <td>Business Name</td>
                  <td><?php echo $data[23];?></td>
                  </tr>
                  <tr>
                  <td>Franchise Id</td>
                  <td><?php echo $data[1];?></td>
                  </tr>
                   <tr>
                    <td>Franchise Address</td>
                  <td><?php echo $data[20];?></td>
                  </tr>
                  <tr>
                  <td>Offer Id</td>
                  <td><?php echo $data[2];?></td>
                  </tr>
					<tr>
                  <td>Offer Title</td>
                  <td><?php echo $data[30];?></td>
                  </tr>                  
                  <tr>
                  <td>Deal Title</td>
                  <td><?php echo $html;?></td>
                  </tr>
                  <tr>
                    <td>rgb r</td>
                  <td><?php echo $data[4];?></td>
                  </tr>
                  <tr>
                    <td>rgb g</td>
                  <td><?php echo $data[5];?></td>
                  </tr>
                  <tr>
                    <td>rgb b</td>
                  <td><?php echo $data[6];?></td>
                  </tr>
                  <tr>
                    <td>Promocode</td>
                  <td><?php echo $data[7];?></td>
                  </tr>
                  <tr>
                    <td>Is In Store</td>
                  <td><?php if($data[8] == 0 ) 
                  {echo "No";
                }
                    else
                      {
                        echo "Yes";
                      }?></td>
                  </tr>
                  <tr>
                    <td>Is Online</td>
                  <td><?php if($data[9] == 0 ) 
                  {echo "No";
                }
                    else
                      {
                        echo "Yes";
                      }?></td>
                  </tr>
                  <tr>
                    <td>Total In Store Reedem Quantity</td>
                  <td> <?php  foreach ($instore_rdm as $pur) {               
                   ?><?php echo $pur[3]; ?><?php } ?></td>
                  </tr>
                	<tr>
                    <td>Total In Store Purchased Quantity</td>
                  <td> <?php foreach ($instore_pur as $pur) {                   
                   ?><?php echo $pur[3];?><?php } ?></td>
                  </tr>
                  <tr>
                    <td>Total Online Purchased Quantity</td>
                  <td> <?php foreach ($isonline_pur as $pur) {                   
                   ?><?php echo $pur[3];?><?php } ?></td>
                  </tr>
                  <tr>
                    <td>Total Reedem Quantity</td>
                  <td> <?php foreach ($deal_rdm as $rdm) {                   
                   ?><?php echo $rdm[3];?><?php } ?></td>
                  </tr>
                  <tr>
                    <td>Total Purchased Quantity</td>
                  <td> <?php foreach ($deal_purchased as $pur) {                   
                   ?><?php echo $pur[3];?><?php } ?></td>
                  </tr>
                  <tr>
                    <td>Terms and Condition</td>
                  <td><?php echo $condition;?></td>
                  </tr>
                  <tr>
                    <td>Overall Quantity</td>
                  <td><?php if($data[11] == 0 ) 
                  {echo "No Limit";
                }
                    else
                      {
                        echo $data[11];
                      }?></td>
                  </tr>
                  <tr>
                    <td>Per Person Quantity</td>
                  <td><?php if($data[12] == 0 ) 
                  {echo "No Limit";
                }
                    else
                      {
                        echo $data[12];
                      }?></td>
                  </tr>
                  <tr>
                    <td>Deal Photo</td>
                  <td><img <?php echo "src=/doora/images/deal/".$data[13];?> id="DealPicture"/></td>
                  </tr>
                   <?php if($data[14] == NULL)
                    {
                      
                    }
                    else
                    	{?>
                  <tr>	
                    <td>Deal Video</td>
                 
                   
                  <td><video width="200" height="200" style="border-style: groove; margin-top: 10px;" autoplay controls>
  					<source <?php echo "src=/doora/video/deal/".$data[14];?> type="video/mp4">
					</video></td> <?php } ?>
				
                  </tr>
               
                  <tr>
                    <td>Deal Start time</td>
                  <td><?php echo $data[15];?></td>
                  </tr>
                  <tr>
                    <td>Deal End time</td>
                  <td><?php echo $data[16];?></td>
                  </tr>                 
                  <tr>
                    <td>Tag Id</td>
                  <td> <?php foreach ($deal_tag as $tag) {                   
                   ?><?php echo $tag[0];?>,&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?></td>
                  </tr>
                  <tr>
                    <td>Tag</td>
                  <td> <?php foreach ($deal_tag as $tag) {                   
                   ?><?php echo $tag[1];?>,&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?></td>
                  </tr>
                  <tr>
                    <td>Sub Catgeory Id</td>
                 <td> <?php foreach ($deal_cat as $cat) {                   
                   ?><?php echo $cat[0];?>,&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?></td>
                  </tr>
                  <tr>
                    <td>Sub Category Name</td>
                 <td> <?php foreach ($deal_cat as $cat) {                  
                   ?><?php echo $cat[2];?>,&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?></td>
                  </tr>
                  <tr>
                    <td>Category Id</td>
                  <td> <?php foreach ($deal_category as $category) {                    
                   ?><?php echo $category[2];?>,&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?></td>
                  </tr>
                  <tr>
                    <td>Category Name</td>
                 <td> <?php foreach ($deal_category as $category) {                    
                   ?><?php echo $category[1];?>,&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?></td>
                  </tr>
                  <tr>
                    <td>Created At</td>
                  <td><?php echo $data[18];?></td>
                  </tr>
                  <tr>
                    <td>Upadted At</td>
                  <td><?php echo $data[19];?></td>
                  </tr>
                <?php } ?>
                </table>
        			</div>
        		</div>
        	</div>	
       
    </section>
</div>

 <?php //include("View/footer.php");
 include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/footer.php");?>  