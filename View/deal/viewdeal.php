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
         $('#example2').dataTable().fnDestroy();
		   $.ajax({
		   url: '/doora/adminpanel/Controller/deal/subcategoryfilter.php?subcategory_id='+CategoryId,
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
}             
$(document).ready(function(){
      $('#category').change(function(){
        loadcategoryfilter($(this).find(':selected').val())
        loadsubcategory($(this).find(':selected').val())
      })
    })
        function loadcategoryfilter(CategoryId){
      
        //var UsersId = $('#category').val(); 
        var elem = document.getElementById("category");
        selectedNode = elem.options[elem.selectedIndex];
        var CategoryId = selectedNode.value;
        $('#example2').dataTable().fnDestroy();
        $.ajax({
		   url: '/doora/adminpanel/Controller/deal/categoryfilter.php?category_id='+CategoryId,
		   type: 'POST',
		   success: function(data) {
		          // console.log(data);
		           $("#result_data").empty();
		           $("#result_data").append(data);
		           $('#example2').dataTable({
		          
		            "destroy":true,
		    		});
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
        $.ajax({
            type: "POST",
            url: '/doora/adminpanel/Controller/deal/subcategory.php?category_id='+CategoryId,
            success:function(data1) { 
                //console.log(data1);
                  $('#sub_category').html(data1);
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
        $('#example2').dataTable().fnDestroy();
        $.ajax({
       url: '/doora/adminpanel/Controller/deal/branchfilter.php?branch_id='+branchId,
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
       
         $('#example2').dataTable().fnDestroy();

        $.ajax({
		   url: '/doora/adminpanel/Controller/deal/tagfilter.php?tag_id='+tagId,
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
}
$(document).ready(function(){
      $('#business').change(function(){
        loadbusinessfilter($(this).find(':selected').val())
        loadbranch($(this).find(':selected').val())
      })
    })
function loadbranch(UsersId){
            $("#branch").children().remove()
            //var UsersId = $('#business').val(); 
        var elem = document.getElementById("business"),
          selectedNode = elem.options[elem.selectedIndex];
          var UsersId = selectedNode.value;
       //console.log(UsersId);
            
            $.ajax({
                type: "POST",
                url: '/doora/adminpanel/Controller/deal/branch.php?branch_id='+UsersId,
               
                success:function(data1) { 
                    //console.log(data1);
                      $('#branch').html(data1);
                }
                });
    }
        function loadbusinessfilter(businessId){
      
        //var UsersId = $('#category').val();
        var elem = document.getElementById("business");
        selectedNode = elem.options[elem.selectedIndex];
        var businessId = selectedNode.value;
        $('#example2').dataTable().fnDestroy();
        $.ajax({
       url: '/doora/adminpanel/Controller/deal/businessfilter.php?business_id='+businessId,
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
}
    </script>
    <script>

                          $(window).on('load', function() {
                                if($('#all').is(':checked')) 
                                    { 
                                        $('#example2').dataTable().fnDestroy();
                                           $.ajax({
                                           url: '/doora/adminpanel/Controller/deal/alldatafilter.php?data=a1',
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
                                    }
                                    });

                                   
  function alldata()
    {
    	 $('#example2').dataTable().fnDestroy();
		   $.ajax({
		   url: '/doora/adminpanel/Controller/deal/alldatafilter.php?data=a1',
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
    }   
    function active()
    {
    	$('#example2').dataTable().fnDestroy();
      $.ajax({
		   url: '/doora/adminpanel/Controller/deal/activedatafilter.php?data=a2',
		   type: 'POST',
		   success: function(data){
		           //console.log(data);
		           $("#result_data").empty();
		           $("#result_data").append(data);
		           $('#example2').dataTable({
		           
		            "destroy":true,
		    		});
		   }
      });
    }
    function deactive()
    {
    	$('#example2').dataTable().fnDestroy();
      $.ajax({
		   url: '/doora/adminpanel/Controller/deal/deactivedatafilter.php?data=a3',
		   type: 'POST',
		   success: function(data){
		           //console.log(data);
		           $("#result_data").empty();
		           $("#result_data").append(data);
		           $('#example2').dataTable({
		            
		            "destroy":true,
		    		});
		   }
      });
    }
    function expired()
    {
    	$('#example2').dataTable().fnDestroy();
      $.ajax({
		   url: '/doora/adminpanel/Controller/deal/expireddatafilter.php?data=a4',
		   type: 'POST',
		   success: function(data){
		           //console.log(data);
		           $("#result_data").empty();
		           $("#result_data").append(data);
		           $('#example2').dataTable({
		           
		            "destroy":true,
		    		});
		   }
      });
    }
    function purchased()
    {
    	$('#example2').dataTable().fnDestroy();
      $.ajax({
		   url: '/doora/adminpanel/Controller/deal/purchaseddatafilter.php?data=a5',
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
                                       
                                       <?php foreach ($getbusiness as  $data) {
                                          ?> <option value="<?php echo $data[0]; ?>"><?php echo $data[1]; ?></option> <?php }?>                             
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
                                       <?php 
                                       foreach ($gettag as  $data) {
                                          ?> <option value="<?php echo $data[0]; ?>"><?php echo $data[1]; ?></option> <?php }?>
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
