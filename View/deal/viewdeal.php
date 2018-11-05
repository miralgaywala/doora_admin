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
      
        //var UsersId = $('#category').val(); 
        var elem = document.getElementById("sub_category");
        selectedNode = elem.options[elem.selectedIndex];
        var CategoryId = selectedNode.value;
        console.log(selectedNode.value);
        window.location.href='/doora/adminpanel/Controller/deal/subcategoryfilter.php?subcategory_id='+CategoryId;
}
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
                                    if($_GET['business_id'])
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
                                        if($_GET['branch_id'])
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
                                       if($_GET['tag_id'])
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
                                        if($_GET['category_id'])
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
                                       if($_GET['subcategory_id'])
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
                foreach ($display_deal as $key => $data) 
                {
                  //print_r($display_deal);
                  // $text = $data[3];
                  // $html = preg_replace("/\\\\u([0-9A-F]{2,5})/i", "&#x$1;", $text);
                  $text=$data[3];
                  $html="\"$text\"";
                  $term = $data[12];
                  $condition = "\"$term\"";
                  ?> <tr>
                                <td style="text-align:center;"><?php echo $i=$i+1;?></td>
                                <td style="text-align:center;"><?php echo $data[0]; ?></td>
                                <td style="text-align:center;"><?php echo $data[21]; ?></td>
                                <td style="text-align:center;"><?php echo json_decode(''.$html.''); ?></td>
                                 <td style="text-align:center;"><?php echo $data[7]; ?></td>
                                  <td style="text-align:center;"><?php echo json_decode(''.$condition.''); ?></td>
                                <td style="text-align:center;"><img <?php echo "src=/doora/images/deal/".$data[15];?> id="DealPicture"/></td>
                                <td style="text-align:center;">
                                    <div >
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
 