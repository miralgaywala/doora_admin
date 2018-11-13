<?php include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/header.php");
 include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/sidemenu.php");
 ?>
 <script>
        $(document).ready(function(){
          $("#business").select2(); 
           $("#branch").select2(); 
            $("#tag").select2(); 
             $("#category").select2(); 
              $("#sub_category").select2(); 
        });
    </script>
    <script> 
    $(document).ready(function(){
      $('#sub_category').change(function(){
        loadsubcategoryfilter($(this).find(':selected').val())
      })
    })   

         function loadsubcategoryfilter(CategoryId){
         	var elem = document.getElementById("sub_category");
		//alert("hiii");
        selectedNode = elem.options[elem.selectedIndex];
        var CategoryId = selectedNode.value;
		   $.ajax({
		   url: '/doora/adminpanel/Controller/deal/subcategoryfilter.php?subcategory_id='+CategoryId,
		   type: 'POST',
		   success: function(data) {
		           console.log(data);
		           $("#result").html(data);
		   }
      });
}             
// $(document).ready(function(){
//       $('#sub_category').change(function(){
//         loadsubcategoryfilter($(this).find(':selected').val())
//       })
//     })
//         function loadsubcategoryfilter(CategoryId){
      
//         //var UsersId = $('#category').val(); 
//         var elem = document.getElementById("sub_category");
//         selectedNode = elem.options[elem.selectedIndex];
//         var CategoryId = selectedNode.value;
//         console.log(selectedNode.value);
//         window.location.href='/doora/adminpanel/Controller/deal/subcategoryfilter.php?subcategory_id='+CategoryId;
// }
$(document).ready(function(){
      $('#category').change(function(){
        loadcategoryfilter($(this).find(':selected').val())
      })
    })
        function loadcategoryfilter(CategoryId){
      
        //var UsersId = $('#category').val(); 
        var elem = document.getElementById("category");
        selectedNode = elem.options[elem.selectedIndex];
        var CategoryId = selectedNode.value;
        console.log(selectedNode.value);
        window.location.href='/doora/adminpanel/Controller/deal/categoryfilter.php?category_id='+CategoryId;
}
$(document).ready(function(){
      $('#branch').change(function(){
        loadbranchfilter($(this).find(':selected').val())
      })
    })
        function loadbranchfilter(branchId){
      
        //var UsersId = $('#category').val(); 
        var elem = document.getElementById("branch");
        selectedNode = elem.options[elem.selectedIndex];
        var branchId = selectedNode.value;
        console.log(selectedNode.value);
        window.location.href='/doora/adminpanel/Controller/deal/branchfilter.php?branch_id='+branchId;
}
$(document).ready(function(){
      $('#tag').change(function(){
        loadtagfilter($(this).find(':selected').val())
      })
    })
        function loadtagfilter(tagId){
      
        //var UsersId = $('#category').val(); 
        var elem = document.getElementById("tag");
        selectedNode = elem.options[elem.selectedIndex];
        var tagId = selectedNode.value;
        console.log(selectedNode.value);
        window.location.href='/doora/adminpanel/Controller/deal/tagfilter.php?tag_id='+tagId;
}
$(document).ready(function(){
      $('#business').change(function(){
        loadbusinessfilter($(this).find(':selected').val())
      })
    })
        function loadbusinessfilter(businessId){
      
        //var UsersId = $('#category').val(); 
        var elem = document.getElementById("business");
        selectedNode = elem.options[elem.selectedIndex];
        var businessId = selectedNode.value;
        console.log(selectedNode.value);
        window.location.href='/doora/adminpanel/Controller/deal/businessfilter.php?business_id='+businessId;
}
    </script>
    <script>
  function alldata()
    {
        window.location.href='/doora/adminpanel/Controller/deal/alldatafilter.php?data=a1';
        document.getElementById("all").checked = true;
    }   
    function active()
    {
       window.location.href='/doora/adminpanel/Controller/deal/activedatafilter.php?data=a2';
       document.getElementById("active").checked = true;
    }
    function deactive()
    {
      window.location.href='/doora/adminpanel/Controller/deal/deactivedatafilter.php?data=a3';
      document.getElementById("deactive").checked = true;
    }
    function expired()
    {
      window.location.href='/doora/adminpanel/Controller/deal/expireddatafilter.php?data=a4';
      document.getElementById("expired").checked = true;
    }
    function purchased()
    {
      window.location.href='/doora/adminpanel/Controller/deal/purchaseddatafilter.php?data=a5';
      document.getElementById("purchased").checked = true;
    }
 </script>
 <?php $result='<div id="result"></div>';
 ?>
<section class="content">   
    	<div class="row">
    		<div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Deal</h2></div>
    		<div class="col-md-2">
                <br/>                   
    		</div>
    	</div> 
        <div class="row">
        	<div class="col-xs-12">
        		<div class="box">
        				<div class="box-body">
               <div class="row">
                                <label for="business" class="col-sm-1 control-label" style="margin-top: 10px;">Business</label>
                                <div class="col-sm-4" style="padding-top: 6px">
                                    <select id="business" name="" class="form-control">
                                       <option value="0">Select Business</option> 
                                       <?php 
                                    if(isset($_GET['business_id']))
                                    {
                                      $selected = $_GET['business_id'];
                                    }
                                    else
                                    {
                                      $selected = ' ';
                                    }
                                      ?>
                                       <?php foreach ($getbusiness as  $data) {
                                          ?> <option value="<?php echo $data[0]; ?>" <?php if($data[0] == $selected ) { ?> selected  <?php } ?>><?php echo $data[1]; ?></option> <?php }?>                             
                                  </select>
                                </div> 
                                <label for="branch" class="col-sm-2 control-label" style="margin-top: 10px;">Business Branch</label>
                                <div class="col-sm-5" style="padding-top: 6px;">
                                    <select id="branch" name="" class="form-control">
                                       <option value="0">Select Business Branch</option>
                                        <?php 
                                        if(isset($_GET['branch_id']))
                                    {
                                      $selected = $_GET['branch_id'];
                                    }
                                    else
                                    {
                                      $selected = ' ';
                                    }
                                        foreach ($getbranch as  $data) {
                                          ?> <option value="<?php echo $data[0]; ?>" <?php if($data[0] == $selected ) { ?> selected  <?php } ?>><?php echo $data[1]; ?></option> <?php }?>
                                  </select>
                                </div> 
                 </div>
                 <div class="row">
                                <label for="tag" class="col-sm-1 control-label" style="margin-top: 25px">Tag</label>
                                <div class="col-sm-2" style="padding-top: 20px">
                                    <select id="tag" name="" class="form-control">
                                       <option value="0">Select tag</option>
                                       <?php 
                                       if(isset($_GET['tag_id']))
                                    {
                                      $selected = $_GET['tag_id'];
                                    }
                                    else
                                    {
                                      $selected = ' ';
                                    }
                                       foreach ($gettag as  $data) {
                                          ?> <option value="<?php echo $data[0]; ?>" <?php if($data[0] == $selected ) { ?> selected  <?php } ?>><?php echo $data[1]; ?></option> <?php }?>
                                  </select>
                                </div> 
                         
                                <label for="category" class="col-sm-1 control-label" style="margin-top: 25px">Catgeory</label>
                                <div class="col-sm-3" style="padding-top: 20px">
                                    <select id="category" name="" class="form-control">
                                       <option value="0">Select Catgeory</option>
                                        <?php 
                                        if(isset($_GET['category_id']))
                                    {
                                      $selected = $_GET['category_id'];
                                    }
                                    else
                                    {
                                      $selected = ' ';
                                    }
                                        foreach ($getcategory as  $data) {
                                          ?> <option value="<?php echo $data[0]; ?>" <?php if($data[0] == $selected ) { ?> selected  <?php } ?>><?php echo $data[1]; ?></option> <?php }?>       
                                  </select>
                                </div> 
                                <label for="sub_category" class="col-sm-2 control-label" style="margin-top: 25px;">Sub Category</label>
                               
                                <div class="col-sm-3" style="padding-top: 20px;padding-left: 5px;">
                                    <select id="sub_category" name="" class="form-control">
                                       <option value="0">Select Sub Category</option>
                                       <?php 
                                       if(isset($_GET['subcategory_id']))
                                    {
                                      $selected = $_GET['subcategory_id'];
                                    }
                                    else
                                    {
                                      $selected = ' ';
                                    }
                                       foreach ($getsubcategory as  $data) {
                                          ?> <option value="<?php echo $data[0]; ?>" <?php if($data[0] == $selected ) { ?> selected  <?php } ?>><?php echo $data[1]; ?></option> <?php }?>
                                  </select>
                                </div> 
   					</div>
   					<div class="row">
   						<div class="col-sm-1"></div>
              <?php if(isset($_GET['data']))
                                    {
                                      $selected = $_GET['data'];
                                    }
                                    else
                                    {
                                      $selected = ' ';
                                    }?>
                                <label class="radio-inline col-sm-2" style="margin-top: 25px;">
      									<input type="radio" name="optradio" id="all" onclick="return alldata();" <?php if("a1" == $selected ) { ?> checked <?php } ?> >All
    							</label>
                                <label class="radio-inline col-sm-2" style="margin-top: 25px;">
      									<input type="radio" name="optradio" id="active" onclick="return active();" <?php if("a2" == $selected ) { ?> checked <?php } ?>>Active
    							</label>
								<label class="radio-inline col-sm-2" style="margin-top: 25px;">
      									<input type="radio" name="optradio" id="deactive" onclick="return deactive();" <?php if("a3" == $selected ) { ?> checked <?php } ?>>Deactive
    							</label>
								<label class="radio-inline col-sm-2" style="margin-top: 25px;">
      									<input type="radio" name="optradio" id="expired" onclick="return expired();" <?php if("a4" == $selected ) { ?> checked <?php } ?>>Expired
    							</label>
    							<label class="radio-inline col-sm-2" style="margin-top: 25px;">
      									<input type="radio" name="optradio" id="purchased" onclick="return purchased();" <?php if("a5" == $selected ) { ?> checked <?php } ?>>Purchased
    							</label>
    							</div>	
                  <hr>
                  <table id="example1" class="table table-bordered table-hover" style="width:100%">
                            <thead>
                            <tr>
                              <th style="text-align:center;">#</th>
                              <th style="text-align:center;" >Deal Id</th>
                              <th style="text-align:center;">Franchise Address</th>
                              <th style="text-align:center;width:20px;">Deal Title</th>
                              <th style="text-align:center;">Promocode</th>
                              <th style="text-align:center;">terms and Condition</th>
                               <th style="text-align:center;">Deal Photo</th>
                              <th style="text-align:center;">Action</th>
                            </tr>
                             </thead>
                     
                    <tbody>
              <?php 
              
                $i=0;
                //echo $display_deal;
                 $display_deal1='<div id="result"></div>';
                 
                echo $display_deal1;
                foreach ($display_deal as $key => $data) 
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

    $str   = ''.$data[12].'';
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
                    // $term = $data[12];
                    // $condition = "\"$term\"";
                  ?> <tr>
                                <td style="text-align:center;"><?php echo $i=$i+1;?></td>
                                <td style="text-align:center;"><?php echo $data[0]; ?></td>
                                <td style="text-align:center;"><?php echo $data[21]; ?></td>
                                <td style="text-align:center;"><?php echo $html;?></td>
                                <td style="text-align:center;"><?php echo $data[7]; ?></td>
                                <td style="text-align:center;"><?php echo $condition;?></td>
                                <td style="text-align:center;"><img <?php echo "src=/doora/images/deal/".$data[15];?> id="DealPicture"/></td>
                                <td style="text-align:center;">
                                    <div>
                                   <a <?php echo "href=/doora/adminpanel/Controller/deal/viewdealdetail_controller.php?id=".$data[0]; ?> title="View all detail">
                                          <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </td>
                                 </tr>
                           <?php } ?>
                           </tbody>
                         </table>
        			</div>
        		</div>
        	</div>	
       </div>
    </section>
</div>
 <?php include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/footer.php");?>  