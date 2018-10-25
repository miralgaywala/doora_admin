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
		    loadbranch($(this).find(':selected').val())
		  })
		  $('#branch').change(function(){
		  })
		  $('#category').change(function(){
		    loadsubcategory($(this).find(':selected').val())
		  })
		  $('#sub_category').change(function(){
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
    function loadbranch(UsersId){
        $("#branch").children().remove()
        //var UsersId = $('#business').val(); 
		var elem = document.getElementById("business"),
	    selectedNode = elem.options[elem.selectedIndex];
	    var UsersId = selectedNode.value;
   //console.log(UsersId);
        // var sel = document.getElementById('branch');
        // var opt = sel.options[sel.selectedIndex];
       // console.log( opt.value );
        $.ajax({
            type: "POST",
            url: "/doora/adminpanel/View/deal/branch.php",
            data: "get=branch&user_id="+ UsersId,
           	success:function(data1) {	
           			//console.log(data1);
                	$('#branch').html(data1);
            }
            });
}
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
    function loadsubcategory(CategoryId){
        $("#sub_category").children().remove()
        //var UsersId = $('#category').val(); 
		var elem = document.getElementById("category");
	    selectedNode = elem.options[elem.selectedIndex];
	    var CategoryId = selectedNode.value;
  		console.log(selectedNode.value);
        // var sel = document.getElementById('branch');
        // var opt = sel.options[sel.selectedIndex];
       // console.log( opt.value );
        $.ajax({
            type: "POST",
            url: "/doora/adminpanel/View/deal/subcategory.php",
            data: "get=subcategory&category_id="+ CategoryId,
           	success:function(data1) {	
           			//console.log(data1);
                	$('#sub_category').html(data1);
            }
            });
}
		loadbusiness();
		loadtag();
		loadcategory();
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
                  // $text = $data[3];
                  // $html = preg_replace("/\\\\u([0-9A-F]{2,5})/i", "&#x$1;", $text);
                  $text=$data[3];
                  $html="\"$text\"";
                  $term = $data[11];
                  $condition = "\"$term\"";
                  ?> <tr>
                                <td style="text-align:center;"><?php echo $i=$i+1;?></td>
                                <td style="text-align:center;"><?php echo $data[0]; ?></td>
                                <td style="text-align:center;"><?php echo $data[20]; ?></td>
                                <td style="text-align:center;"><?php echo json_decode(''.$html.''); ?></td>
                                 <td style="text-align:center;"><?php echo $data[7]; ?></td>
                                  <td style="text-align:center;"><?php echo json_decode(''.$condition.''); ?></td>
                                <td style="text-align:center;"><img <?php echo "src=/doora/images/deal/".$data[14];?> id="DealPicture"/></td>
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