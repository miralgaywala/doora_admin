<?php //include("View/header.php");
// include "../../View/header/header.php";
//  include "../../View/header/sidemenu.php";

 ?>
 <script type="text/javascript">
   function ViewDeal()
      {
            $.ajax({
                 url:"../../Controller/deal/viewdeal_controller.php",
                 method:"POST",
                 success:function(data)
                 {
                                          $('#example2').dataTable().fnDestroy();
                                           $.ajax({
                                           url: '../../Controller/deal/alldatafilter.php?data=a1',
                                           type: 'POST',
                                           success: function(data) {
                                                   //console.log(data);
                                                   $("#result_data").empty();
                                                   $("#result_data").append(data);
                                                     $('#example2').dataTable({
                                                   
                                                    "destroy":true,
                                                });
                                                 }
                                          });
                      $('.content-wrapper').html(data);
                 }
              })
      }
 </script>
 
<!--Main Content -->
    <section class="content">
      <div class="row">
        <div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>View Deal Detail</h2></div>
        <div class="col-md-2">
                <br/>   
               <!-- <a href="http://localhost/sprookr/adminpanel/Controller/category/displaycategorycontroller.php" class="btn btn-default"><b><- Back</b></a>-->
               <button style="float: right;" onclick="ViewDeal()" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>
           <!-- <a href="/sprookr/adminpanel/View/category/addcategory.php" class="btn btn-primary">+ Add Category</a>-->
        </div>
      </div> 
        <div class="row">
        	<div class="col-xs-12">
        		<div class="box">            
        			<div class="box-body">
        				 <table style="font-size: 15px;" style="width: 100%;" class="table table-striped">
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
                else if(file_exists("../../../images/deal/".$data['deal_photo'])) {
                  $data['deal_photo'] = $data['deal_photo'];
                 }
                 else
                 {
                  $data['deal_photo']= "default.png";
                 }    
                 $html = nl2br($html);
                         $condition = nl2br($condition); 
               ?>
                  <tr>
                  <td style="width: 20%">Business Deal Id</td>
                  <td><?php echo $data['business_deal_id'];?></td>
                  </tr>
                   <tr>
                  <td style="width: 20%">Business User Id</td>
                  <td><?php echo $data['user_id'];?></td>
                  </tr>
                  <tr>
                 <td style="width: 20%">Business Name</td>
                  <td><?php echo $data['business_name'];?></td>
                  </tr>
                  <!-- <tr>
                 <td style="width: 20%">Franchise Id</td>
                  <td><?php echo $data['franchise_id'];?></td>
                  </tr> -->
                   <tr>
                  <td style="width: 20%">Franchise Address</td>
                  <td><?php echo $data['franchise_address'];?></td>
                  </tr>
                  <!-- <tr>
                 <td style="width: 20%">Offer Id</td>
                  <td><?php echo $data['offer_id'];?></td>
                  </tr> -->
					        <tr>
                 <td style="width: 20%">Offer Title</td>
                  <td><?php echo $data['offer_title'];?></td>
                  </tr>                  
                  <tr>
                 <td style="width: 20%">Deal Title</td>
                  <td><?php echo $html;?></td>
                  </tr>
                  <tr>
                 <td style="width: 20%">Promocode</td>
                  <td><?php echo $data['promocode'];?></td>
                  </tr>
                  <tr>
                  <td style="width: 20%">Terms and Condition</td>
                  <td><?php echo $condition;?></td>
                  </tr>
                  <tr>
                  <td style="width: 20%"> In Store</td>
                  <td><?php if($data['is_in_store'] == 0 ) 
                  {echo "No";
                }
                    else
                      {
                        echo "Yes";
                      }?></td>
                  </tr>
                  <tr>
                  <td style="width: 20%">Online</td>
                  <td><?php if($data['is_online'] == 0 ) 
                  {echo "No";
                }
                    else
                      {
                        echo "Yes";
                      }?></td>
                  </tr>
                  <tr>
                  <td style="width: 20%">Total In Store Reedem Quantity</td>
                  <td> <?php if($instore_rdm == 0) { echo "0";} else { foreach ($instore_rdm as $pur) { 
                  
                   ?><?php echo $pur['SUM(upd.quantity)']; }?><?php } ?></td>
                  </tr>
                	<tr>
                  <td style="width: 20%">Total In Store Purchased Quantity</td>
                  <td> <?php if($instore_pur == 0) { echo "0"; } else { foreach ($instore_pur as $pur) { 
                                    
                   ?><?php echo $pur['SUM(upd.quantity)']; }?><?php } ?></td>
                  </tr>
                  <tr>
                  <td style="width: 20%">Total Online Purchased Quantity</td>
                  <td> <?php if($instore_pur == 0) { echo "0";} else { foreach ($isonline_pur as $pur) { 
                                  
                   ?><?php echo $pur['SUM(upd.quantity)']; }?><?php } ?></td>
                  </tr>
                  <tr>
                  <td style="width: 20%">Total Reedem Quantity</td>
                  <td> <?php if($deal_rdm == 0){
                      echo "0";
                  } else {foreach ($deal_rdm as $rdm) { 
                                    
                   ?><?php echo $rdm['SUM(upd.quantity)'];?><?php } }?></td>
                  </tr>
                  <tr>
                  <td style="width: 20%">Total Purchased Quantity</td>
                  <td> <?php if($deal_purchased == 0) { echo "0"; } else { foreach ($deal_purchased as $pur) {
                                    
                   ?><?php echo $pur['SUM(upd.quantity)']; }?><?php } ?></td>
                  </tr>
                  
                  <tr>
                  <td style="width: 20%">Overall Quantity</td>
                  <td><?php if($data['overall_qty'] == 0 ) 
                  {echo "No Limit";
                }
                    else
                      {
                        echo $data['overall_qty'];
                      }?></td>
                  </tr>
                  <tr>
                 <td style="width: 20%">Per Person Quantity</td>
                  <td><?php if($data['per_person_qty'] == 0 ) 
                  {echo "No Limit";
                }
                    else
                      {
                        echo $data['per_person_qty'];
                      }?></td>
                  </tr>
                  <tr>
                  <td style="width: 20%">Deal Photo</td>
                  <td><a data-fancybox="gallery" <?php echo "href=../../../images/deal/".$data['deal_photo'];?>><img <?php echo "src=../../../images/deal/".$data['deal_photo'];?> id="DealPicture" style="object-fit:contain;"/></a></td>
                  </tr>
                   <?php if($data['deal_video'] == NULL)
                    {
                      
                    }
                    else
                    	{?>
                  <tr>	
                 <td style="width: 20%">Deal Video</td>                   
                  <td><video width="200" height="200" style="border-style: groove; margin-top: 10px;" autoplay controls>
  					<source <?php echo "src=../../../video/deal/".$data['deal_video'];?> type="video/mp4">
					</video></td> <?php } ?>
				
                  </tr>
               
                  <tr>
                 <td style="width: 20%">Deal Start time</td>
                  <td><script type="text/javascript">
                      var dateFormat = 'DD-MM-YYYY HH:mm:ss';
                      var testDateUtc = moment.utc('<?php echo $data["deal_start_time"] ?>');
                      //alert(testDateUtc);
                      var localDate = testDateUtc.local();
                      // console.log(localDate.format(dateFormat));
                      document.getElementById("demo3").innerHTML = localDate.format(dateFormat);
                    </script>
                   <div id="demo3"></div></td>
                  </tr>
                  <tr>
                 <td style="width: 20%">Deal End time</td>
                  <td><script type="text/javascript">
                      var dateFormat = 'DD-MM-YYYY HH:mm:ss';
                      var testDateUtc = moment.utc('<?php echo $data["deal_end_time"] ?>');
                      //alert(testDateUtc);
                      var localDate = testDateUtc.local();
                      // console.log(localDate.format(dateFormat));
                      document.getElementById("demo4").innerHTML = localDate.format(dateFormat);
                    </script>
                   <div id="demo4"></div></td>
                  </tr>                 
                  <!-- <tr>
                 <td style="width: 20%">Tag Id</td>
                  <td> <?php if($deal_tag == NULL) {echo "No";} else{ $count=count($deal_tag); $i=1; foreach ($deal_tag as $tag) {                   
                   ?><?php echo $tag['tag_id']; if($i<$count) { echo "  ,"; } $i=$i+1;?>&nbsp;&nbsp;<?php } }?></td>
                  </tr> -->
                  <tr>
                  <td style="width: 20%">Tag</td>
                  <td> 
                    <?php if($deal_tag == NULL) {echo "No";} else{ $count=count($deal_tag); $i=1; foreach ($deal_tag as $tag) {
                      ?><?php echo $tag['tag']; if($i<$count) { echo "  ,"; } $i=$i+1;  ?>&nbsp;&nbsp;
                    <?php } }?>
                     
                   </td>
                  </tr>
                  <!-- <tr>
                 <td style="width: 20%">Sub Catgeory Id</td>
                 <td> <?php if($deal_cat == NULL) {echo "No";} else{ $count=count($deal_cat); $i=1; foreach ($deal_cat as $cat) {                   
                   ?><?php echo $cat['sub_category_id']; if($i<$count) { echo " ,"; } $i=$i+1; ?>&nbsp;&nbsp;<?php } }?></td>
                  </tr> -->
                  <tr>
                 <td style="width: 20%">Sub Category Name</td>
                 <td> <?php if($deal_cat == NULL) {echo "No";} else{ $count=count($deal_cat); $i=1; foreach ($deal_cat as $cat) {                  
                   ?><?php echo $cat['sub_category_name']; if($i<$count) { echo " ,"; } $i=$i+1;?>&nbsp;&nbsp;<?php } }?></td>
                  </tr>
                  <!-- <tr>
                  <td style="width: 20%">Category Id</td>
                  <td> <?php if($deal_category == NULL) {echo "No";} else{ $count=count($deal_category); $i=1; foreach ($deal_category as $category) {                    
                   ?><?php echo $category['category_id']; if($i<$count) { echo " ,"; } $i=$i+1;?>&nbsp;&nbsp;<?php } }?></td>
                  </tr> -->
                  <tr>
                  <td style="width: 20%">Category Name</td>
                 <td> <?php if($deal_category == NULL) {echo "No";} else{ $count=count($deal_category); $i=1; foreach ($deal_category as $category) {                    
                   ?><?php echo $category['category_name']; if($i<$count) { echo " ,"; } $i=$i+1;?>&nbsp;&nbsp;<?php } }?></td>
                  </tr>
                  
                  <tr>
                   <td style="width: 20%">Created Date</td>
                  <td>
                    <script type="text/javascript">
                      var dateFormat = 'DD-MM-YYYY HH:mm:ss';
                      var testDateUtc = moment.utc('<?php echo $data["created_at"] ?>');
                      //alert(testDateUtc);
                      var localDate = testDateUtc.local();
                      // console.log(localDate.format(dateFormat));
                      document.getElementById("demo1").innerHTML = localDate.format(dateFormat);
                    </script>
                   <div id="demo1"></div></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Updated Date</td>
                  <td><script type="text/javascript">
                      var dateFormat = 'DD-MM-YYYY HH:mm:ss';
                      var testDateUtc = moment.utc('<?php echo $data["updated_at"] ?>');
                      //alert(testDateUtc);
                      var localDate = testDateUtc.local();
                      // console.log(localDate.format(dateFormat));
                      document.getElementById("demo2").innerHTML = localDate.format(dateFormat);
                    </script>
                   <div id="demo2"></div></td>
                  </tr>
                <?php } ?>
                </table>
        			</div>
        		</div>
        	</div>	
       
    </section>
</div>

 <?php 
//include "../../View/header/footer.php";?> 