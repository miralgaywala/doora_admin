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
		           $("#result_data").empty();
		           $("#result_data").append(data);
		           $('#example2').DataTable({
		            "order": [[ 1, 'asc' ]],
		    		});
		   }
      });
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
        $.ajax({
		   url: '/doora/adminpanel/Controller/deal/categoryfilter.php?category_id='+CategoryId,
		   type: 'POST',
		   success: function(data) {
		           console.log(data);
		           $("#result_data").empty();
		           $("#result_data").append(data);
		           $('#example2').DataTable( {
		            "order": [[ 1, 'asc' ]],
		    		} );
    
		   }
      });
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
        $.ajax({
		   url: '/doora/adminpanel/Controller/deal/tagfilter.php?tag_id='+tagId,
		   type: 'POST',
		   success: function(data) {
		           console.log(data);
		           $("#result_data").empty();
		           $("#result_data").append(data);
		          if ($.fn.dataTable.isDataTable('#example2')) {
				                 $('#example2').DataTable().destroy();     
				                 $('#example2').DataTable();          
				            }
				           
				$('#example2').DataTable({
			 "order": [[ 1, 'asc' ]],
				})
			}
      });
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
		   $.ajax({
		   url: '/doora/adminpanel/Controller/deal/alldatafilter.php?data=a1',
		   type: 'POST',
		   success: function(data) {
		           console.log(data);
		           $("#result_data").empty();
		           $("#result_data").append(data);
		   }
      });
       		         $('#example2').DataTable({
		            "order": [[ 1, 'asc' ]],
		    		}).fnDestroy();
    }   
    function active()
    {
      $.ajax({
		   url: '/doora/adminpanel/Controller/deal/activedatafilter.php?data=a2',
		   type: 'POST',
		   success: function(data) {
		           console.log(data);
		           $("#result_data").empty();
		           $("#result_data").append(data);
		           $('#example2').DataTable({
		            "order": [[ 1, 'asc' ]],
		    		}).fnDestroy();
		   }
      });
    }
    function deactive()
    {
      $.ajax({
		   url: '/doora/adminpanel/Controller/deal/deactivedatafilter.php?data=a3',
		   type: 'POST',
		   success: function(data) {
		           console.log(data);
		           $("#result_data").empty();
		           $("#result_data").append(data);
		           $('#example2').DataTable({
		            "order": [[ 1, 'asc' ]],
		    		} );
		   }
      });
    }
    function expired()
    {
      $.ajax({
		   url: '/doora/adminpanel/Controller/deal/expireddatafilter.php?data=a4',
		   type: 'POST',
		   success: function(data) {
		           console.log(data);
		           $("#result_data").empty();
		           $("#result_data").append(data);
		           $('#example2').DataTable({
		            "order": [[ 1, 'asc' ]],
		    		} );
		   }
      });
    }
    function purchased()
    {
      $.ajax({
		   url: '/doora/adminpanel/Controller/deal/purchaseddatafilter.php?data=a5',
		   type: 'POST',
		   success: function(data) {
		           console.log(data);
		           $("#result_data").empty();
		           $("#result_data").append(data);
		          $('#example2').DataTable({
		            "order": [[ 1, 'asc' ]],
		    		} );
		   }
      });
    }
 </script>
 
<section class="content">   
    	<div class="row">
    		<div class="col-md-10" style="float:left;margin-bottom:10px;"> <h2>Deal</h2></div>
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
                                        foreach ($getcategory as $data) {
                                          ?> <option value="<?php echo $data[0]; ?>"><?php echo $data[1]; ?></option> <?php }?>       
                                  </select>
                                </div> 
                                <label for="sub_category" class="col-sm-2 control-label" style="margin-top: 25px;">Sub Category</label>
                                <div class="col-sm-3" style="padding-top: 20px;padding-left: 5px;">
                                    <select id="sub_category" name="" class="form-control">
                                       <option value="0">Select Sub Category</option>
                                       <?php 
                                       foreach ($getsubcategory as $data) {
                                          ?> <option value="<?php echo $data[0]; ?>" ><?php echo $data[1]; ?></option> <?php }?>
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
      									<input type="radio" name="optradio" id="all" onclick="alldata();" checked>All
    							</label>
                                <label class="radio-inline col-sm-2" style="margin-top: 25px;">
      									<input type="radio" name="optradio" id="active" onclick="active();">Active
    							</label>
								<label class="radio-inline col-sm-2" style="margin-top: 25px;">
      									<input type="radio" name="optradio" id="deactive" onclick="deactive();">Deactive
    							</label>
								<label class="radio-inline col-sm-2" style="margin-top: 25px;">
      									<input type="radio" name="optradio" id="expired" onclick="expired();">Expired
    							</label>
    							<label class="radio-inline col-sm-2" style="margin-top: 25px;">
      									<input type="radio" name="optradio" id="purchased" onclick="purchased();">Purchased
    							</label>
    							</div>	
                  <hr>
                  <table id="example2" class="table table-bordered table-condensed table-hover" style="width:100%">
                            <thead>
                            <tr>
                              <th style="text-align:center;">#</th>
                              <th style="text-align:center;">Deal Id</th>
                              <th style="text-align:center;">Franchise Address</th>
                              <th style="text-align:center;width:20px;">Deal Title</th>
                              <th style="text-align:center;">Promocode</th>
                              <th style="text-align:center;">Terms and Condition</th>
                              <th style="text-align:center;">Deal Photo</th>
                              <th style="text-align:center;">Action</th>
                            </tr>
                             </thead>
                    		<tbody id="result_data">
                           </tbody>
                         </table>

        			</div>
        		</div>
        	</div>	
       </div>
    </section>
</div>
 <?php include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/footer.php");?>  
