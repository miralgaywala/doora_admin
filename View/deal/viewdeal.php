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
		  $('#business').change(function(){
		  })
		  $('#branch').change(function(){
		  })
		})

		function loadbusiness(){
        $.ajax({
            type: "POST",
            url: "/doora/adminpanel/View/deal/ajax.php",
            data: "get=business",
            success:function(data) {
            	//console.log(data);
                	$('#business').html(data);
            }
		});
    }
//     function loadbranch(UsersId){
//         $("#branch").children().remove()
//         //var UsersId = $('#business').val(); 
// 		var elem = document.getElementById("business"),
// 	    selectedNode = elem.options[elem.selectedIndex];
// 	    var UsersId = selectedNode.value;
//    //console.log(UsersId);
//         // var sel = document.getElementById('branch');
//         // var opt = sel.options[sel.selectedIndex];
//        // console.log( opt.value );
//         $.ajax({
//             type: "POST",
//             url: "/doora/adminpanel/View/deal/branch.php",
//             data: "get=branch&user_id="+ UsersId,
//            	success:function(data1) {	
//            			//console.log(data1);
//                 	$('#branch').html(data1);
//             }
//             });
// }
function loadtag(){
        $.ajax({
            type: "POST",
            url: "/doora/adminpanel/View/deal/tag.php",
            data: "get=tag",
            success:function(data) {	
                	$('#tag').html(data);
            }
		});
    }
    function loadcategory(){
        $.ajax({
            type: "POST",
            url: "/doora/adminpanel/View/deal/category.php",
            data: "get=category",
            success:function(data) {	
                	$('#category').html(data);
            }
		});
    }
		loadbusiness();
		loadtag();
		loadcategory();
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
        function loadbranchfilter(CategoryId){
      
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
        function loadtagfilter(CategoryId){
      
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
        function loadbusinessfilter(CategoryId){
      
        //var UsersId = $('#category').val(); 
        var elem = document.getElementById("business");
        selectedNode = elem.options[elem.selectedIndex];
        var businessId = selectedNode.value;
        console.log(selectedNode.value);
        window.location.href='/doora/adminpanel/Controller/deal/businessfilter.php?business_id='+businessId;
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
                                       <option value="">Select Business</option>                              
                                  </select>
                                </div> 
                      
                           
                                <label for="branch" class="col-sm-2 control-label" style="margin-top: 10px;">Business Branch</label>
                                <div class="col-sm-5" style="padding-top: 6px;">
                                    <select id="branch" name="" class="form-control">
                                       <option value="0">Select Business Branch</option>
                                        <?php foreach ($getbranch as  $data) {
                                          ?> <option value="<?php echo $data[0]; ?>"><?php echo $data[1]; ?></option> <?php }?>
                                  </select>
                                </div> 
                 </div>
                 <div class="row">
                                <label for="tag" class="col-sm-1 control-label" style="margin-top: 25px">Tag</label>
                                <div class="col-sm-2" style="padding-top: 20px">
                                    <select id="tag" name="" class="form-control">
                                       <option value="0">Select tag</option>
                                  </select>
                                </div> 
                         
                                <label for="category" class="col-sm-1 control-label" style="margin-top: 25px">Catgeory</label>
                                <div class="col-sm-3" style="padding-top: 20px">
                                    <select id="category" name="" class="form-control">
                                       <option value="0">Select Catgeory</option>
                                  </select>
                                </div> 
                                <label for="sub_category" class="col-sm-2 control-label" style="margin-top: 25px;">Sub Category</label>
                               
                                <div class="col-sm-3" style="padding-top: 20px;padding-left: 5px;">
                                    <select id="sub_category" name="" class="form-control">
                                       <option value="0">Select Sub Category</option>
                                       <?php foreach ($getsubcategory as  $data) {
                                          ?> <option value="<?php echo $data[0]; ?>"><?php echo $data[1]; ?></option> <?php }?>
                                  </select>
                                </div> 
   					</div>
   					<div class="row">
   						<div class="col-sm-1"></div>
                                <label class="radio-inline col-sm-2" style="margin-top: 25px;">
                                	
      									<input type="radio" name="optradio" checked>All
  									
    							</label>
                                <label class="radio-inline col-sm-2" style="margin-top: 25px;">
                                	
      									<input type="radio" name="optradio">Active
  									
    							</label>
								<label class="radio-inline col-sm-2" style="margin-top: 25px;">
                                	
      									<input type="radio" name="optradio">Deactive
  									
    							</label>
								<label class="radio-inline col-sm-2" style="margin-top: 25px;">
                                	
      									<input type="radio" name="optradio">Expired
  								
    							</label>
    							<label class="radio-inline col-sm-2" style="margin-top: 25px;">
                                	
      									<input type="radio" name="optradio">Purchased
  								
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