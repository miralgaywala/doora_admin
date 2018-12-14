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
                    $str   = ''.$data['deal_title'].'';
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

    $str   = ''.$data['terms_and_condition'].'';
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
    if($data['deal_photo'] == NULL)
                 {
                  $data['deal_photo'] = "default.png";
                 }
                else if(file_exists($_SERVER['DOCUMENT_ROOT']."/doora/images/deal/".$data['deal_photo'])) {
                  $data['deal_photo'] = $data['deal_photo'];
                 }
                 else
                 {
                  $data['deal_photo']= "default.png";
                 }     
               ?>
                  <tr>
                    <td>Business Deal Id</td>
                  <td><?php echo $data['business_deal_id'];?></td>
                  </tr>
                   <tr>
                    <td>Business User Id</td>
                  <td><?php echo $data['user_id'];?></td>
                  </tr>
                  <tr>
                    <td>Business Name</td>
                  <td><?php echo $data['business_name'];?></td>
                  </tr>
                  <tr>
                  <td>Franchise Id</td>
                  <td><?php echo $data['franchise_id'];?></td>
                  </tr>
                   <tr>
                    <td>Franchise Address</td>
                  <td><?php echo $data['franchise_address'];?></td>
                  </tr>
                  <tr>
                  <td>Offer Id</td>
                  <td><?php echo $data['offer_id'];?></td>
                  </tr>
					        <tr>
                  <td>Offer Title</td>
                  <td><?php echo $data['offer_title'];?></td>
                  </tr>                  
                  <tr>
                  <td>Deal Title</td>
                  <td><?php echo $html;?></td>
                  </tr>
                  <tr>
                    <td>rgb r</td>
                  <td><?php echo $data['rgb_r'];?></td>
                  </tr>
                  <tr>
                    <td>rgb g</td>
                  <td><?php echo $data['rgb_g'];?></td>
                  </tr>
                  <tr>
                    <td>rgb b</td>
                  <td><?php echo $data['rgb_b'];?></td>
                  </tr>
                  <tr>
                    <td>Promocode</td>
                  <td><?php echo $data['promocode'];?></td>
                  </tr>
                  <tr>
                    <td>Is In Store</td>
                  <td><?php if($data['is_in_store'] == 0 ) 
                  {echo "No";
                }
                    else
                      {
                        echo "Yes";
                      }?></td>
                  </tr>
                  <tr>
                    <td>Is Online</td>
                  <td><?php if($data['is_online'] == 0 ) 
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
                   ?><?php echo $pur['SUM(upd.quantity)']; ?><?php } ?></td>
                  </tr>
                	<tr>
                    <td>Total In Store Purchased Quantity</td>
                  <td> <?php foreach ($instore_pur as $pur) {                   
                   ?><?php echo $pur['SUM(upd.quantity)'];?><?php } ?></td>
                  </tr>
                  <tr>
                    <td>Total Online Purchased Quantity</td>
                  <td> <?php foreach ($isonline_pur as $pur) {                   
                   ?><?php echo $pur['SUM(upd.quantity)'];?><?php } ?></td>
                  </tr>
                  <tr>
                    <td>Total Reedem Quantity</td>
                  <td> <?php foreach ($deal_rdm as $rdm) {                   
                   ?><?php echo $rdm['SUM(upd.quantity)'];?><?php } ?></td>
                  </tr>
                  <tr>
                    <td>Total Purchased Quantity</td>
                  <td> <?php foreach ($deal_purchased as $pur) {                   
                   ?><?php echo $pur['SUM(upd.quantity)'];?><?php } ?></td>
                  </tr>
                  <tr>
                    <td>Terms and Condition</td>
                  <td><?php echo $condition;?></td>
                  </tr>
                  <tr>
                    <td>Overall Quantity</td>
                  <td><?php if($data['overall_qty'] == 0 ) 
                  {echo "No Limit";
                }
                    else
                      {
                        echo $data['overall_qty'];
                      }?></td>
                  </tr>
                  <tr>
                    <td>Per Person Quantity</td>
                  <td><?php if($data['per_person_qty'] == 0 ) 
                  {echo "No Limit";
                }
                    else
                      {
                        echo $data['per_person_qty'];
                      }?></td>
                  </tr>
                  <tr>
                    <td>Deal Photo</td>
                  <td><img <?php echo "src=/doora/images/deal/".$data['deal_photo'];?> id="DealPicture"/></td>
                  </tr>
                   <?php if($data['deal_video'] == NULL)
                    {
                      
                    }
                    else
                    	{?>
                  <tr>	
                    <td>Deal Video</td>                   
                  <td><video width="200" height="200" style="border-style: groove; margin-top: 10px;" autoplay controls>
  					<source <?php echo "src=/doora/video/deal/".$data['deal_video'];?> type="video/mp4">
					</video></td> <?php } ?>
				
                  </tr>
               
                  <tr>
                    <td>Deal Start time</td>
                  <td><?php echo $data['deal_start_time'];?></td>
                  </tr>
                  <tr>
                    <td>Deal End time</td>
                  <td><?php echo $data['deal_end_time'];?></td>
                  </tr>                 
                  <tr>
                    <td>Tag Id</td>
                  <td> <?php foreach ($deal_tag as $tag) {                   
                   ?><?php echo $tag['tag_id'];?>,&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?></td>
                  </tr>
                  <tr>
                    <td>Tag</td>
                  <td> <?php foreach ($deal_tag as $tag) {                   
                   ?><?php echo $tag['tag'];?>,&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?></td>
                  </tr>
                  <tr>
                    <td>Sub Catgeory Id</td>
                 <td> <?php foreach ($deal_cat as $cat) {                   
                   ?><?php echo $cat['sub_category_id'];?>,&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?></td>
                  </tr>
                  <tr>
                    <td>Sub Category Name</td>
                 <td> <?php foreach ($deal_cat as $cat) {                  
                   ?><?php echo $cat['sub_category_name'];?>,&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?></td>
                  </tr>
                  <tr>
                    <td>Category Id</td>
                  <td> <?php foreach ($deal_category as $category) {                    
                   ?><?php echo $category['category_id'];?>,&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?></td>
                  </tr>
                  <tr>
                    <td>Category Name</td>
                 <td> <?php foreach ($deal_category as $category) {                    
                   ?><?php echo $category['category_name'];?>,&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?></td>
                  </tr>
                  <tr>
                    <td>Is Aspectfit</td>
                  <td><?php echo $data['is_aspectfit'];?></td>
                  </tr>
                  <tr>
                    <td>Created At</td>
                  <td><?php echo $data['created_at'];?></td>
                  </tr>
                  <tr>
                    <td>Upadted At</td>
                  <td><?php echo $data['updated_at'];?></td>
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