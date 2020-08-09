  <?php 
  //include "../../View/header/header.php";
 // include "../../View/header/sidemenu.php";
 ?>
 <script>
        // $(document).ready(function(){
        //   $("#business").select2(); 
        //    $("#branch").select2(); 
        //     $("#tag").select2(); 
        //      $("#category").select2(); 
        //       $("#sub_category").select2(); 
        // });


    </script>
    <style type="text/css">
     
    </style>
    <script> 

      $(document).ready(function(){
            $(".select2").select2(); 
        });
      function viewdeal(id)
      {
            $.ajax({
                 url:"../../Controller/deal/viewdealdetail_controller.php?id="+id,
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                        
                 }
              })
      }
    $(document).ready(function(){
      $('#sub_category_deal').change(function(){
        // loadsubcategoryfilter($(this).find(':selected').val())
        loadfilter()
      })
    })   
    function loadsubcategoryfilter(CategoryId){
         	var elem = document.getElementById("sub_category_deal");
		//alert("hiii");
        selectedNode = elem.options[elem.selectedIndex];
        var CategoryId = selectedNode.value;
         $('#example2').dataTable().fnDestroy();
		   $.ajax({
		   url: '../../Controller/deal/subcategoryfilter.php?subcategory_id='+CategoryId,
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
      $('#category_deal').change(function(){

        // loadcategoryfilter($(this).find(':selected').val())
        loadsubcategory($(this).find(':selected').val())
             loadfilter()
      })
    })
        function loadcategoryfilter(CategoryId){
      
        //var UsersId = $('#category').val(); 
        var elem = document.getElementById("category_deal");
        selectedNode = elem.options[elem.selectedIndex];
        var CategoryId = selectedNode.value;
        $('#example2').dataTable().fnDestroy();
        $.ajax({
		   url: '../../Controller/deal/categoryfilter.php?category_id='+CategoryId,
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
        $("#sub_category_deal").children().remove()
        //var UsersId = $('#category').val(); 
    var elem = document.getElementById("category_deal");
      selectedNode = elem.options[elem.selectedIndex];
      var CategoryId = selectedNode.value;
    
        $.ajax({
            type: "POST",
            url: '../../Controller/deal/subcategory.php?category_id='+CategoryId,
            success:function(data1) { 
                //console.log(data1);
                  $('#sub_category_deal').html(data1);
            }
            });
}
$(document).ready(function(){
      $('#branch_deal').change(function(){
        loadfilter()
        // loadbranchfilter($(this).find(':selected').val())
      })
    })
        function loadbranchfilter(branchId){
      
        //var UsersId = $('#category').val(); 
        var elem = document.getElementById("branch_deal");
        selectedNode = elem.options[elem.selectedIndex];
        var branchId = selectedNode.value;
        $('#example2').dataTable().fnDestroy();
        $.ajax({
       url: '../../Controller/deal/branchfilter.php?branch_id='+branchId,
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
      $('#tag_deal').change(function(){
        loadfilter()
        // loadtagfilter($(this).find(':selected').val())
      })
    })
        function loadtagfilter(tagId){
        //var UsersId = $('#category').val(); 
        var elem = document.getElementById("tag_deal");
        selectedNode = elem.options[elem.selectedIndex];
        var tagId = selectedNode.value;
       
         $('#example2').dataTable().fnDestroy();

        $.ajax({
		   url: '../../Controller/deal/tagfilter.php?tag_id='+tagId,
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
      $('#business_deal').change(function(){
      
        loadbranch($(this).find(':selected').val())
          loadfilter()
        // loadbusinessfilter($(this).find(':selected').val())
      })
    })
function loadbranch(UsersId){
            $("#branch_deal").children().remove()
            //var UsersId = $('#business').val(); 
        var elem = document.getElementById("business_deal"),
          selectedNode = elem.options[elem.selectedIndex];
          var UsersId = selectedNode.value;
       //console.log(UsersId);
            $.ajax({
                type: "POST",
                url: '../../Controller/deal/branch.php?branch_id='+UsersId,
               
                success:function(data1) { 
                    // console.log(data1);
                      $('#branch_deal').html(data1);
                }
                });
    }
        function loadbusinessfilter(businessId){
      
        //var UsersId = $('#category').val();
        var elem = document.getElementById("business_deal");
        selectedNode = elem.options[elem.selectedIndex];
        var businessId = selectedNode.value;
        $('#example2').dataTable().fnDestroy();
        $.ajax({
       url: '../../Controller/deal/businessfilter.php?business_id='+businessId,
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
function loadfilter(){
      // console.log($('#business').val());
      //  console.log($('#branch').val()); 
      //  console.log($('#tag').val()); 
        // console.log($('#sub_category').val()); 
      //  console.log($('#category').val()); 
      var radio=$("input[name='optradio']:checked").val();

      var business_id = $('#business_deal').val();
      var branch = $('#branch_deal').val();
      var tag = $('#tag_deal').val();
      var sub_category = $('#sub_category_deal').val();
      var category = $('#category_deal').val();
        $('#example2').dataTable().fnDestroy();
        $.ajax({
       url: '../../Controller/deal/loadfilter.php',
       data : {business_id : business_id,branch : branch,tag : tag, category : category, sub_category : sub_category,radio : radio},
       type: 'POST',
       success: function(data) {
        // console.log("filter");
        //        console.log(data);
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
                                    }
                                    });

                                   
  function alldata()
    {
      loadfilter()
      
    	//  $('#example2').dataTable().fnDestroy();
		   // $.ajax({
		   // url: '/sprookr/adminpanel/Controller/deal/alldatafilter.php?data=a1',
		   // type: 'POST',
		   // success: function(data) {
		   //         //console.log(data);
		   //         $("#result_data").empty();
		   //         $("#result_data").append(data);
     //   		       $('#example2').dataTable({
		            
		   //          "destroy":true,
		   //  		});
     //   		   }
     //  });
    }   
    function active()
    {
      loadfilter()
    	// $('#example2').dataTable().fnDestroy();
     //  $.ajax({
		   // url: '/sprookr/adminpanel/Controller/deal/activedatafilter.php?data=a2',
		   // type: 'POST',
		   // success: function(data){
		   //         //console.log(data);
		   //         $("#result_data").empty();
		   //         $("#result_data").append(data);
		   //         $('#example2').dataTable({
		           
		   //          "destroy":true,
		   //  		});
		   // }
     //  });
    }
    function deactive()
    {
      loadfilter()
    	// $('#example2').dataTable().fnDestroy();
     //  $.ajax({
		   // url: '/sprookr/adminpanel/Controller/deal/deactivedatafilter.php?data=a3',
		   // type: 'POST',
		   // success: function(data){
		   //         //console.log(data);
		   //         $("#result_data").empty();
		   //         $("#result_data").append(data);
		   //         $('#example2').dataTable({
		            
		   //          "destroy":true,
		   //  		});
		   // }
     //  });
    }
    function expired()
    {
      loadfilter()
    	// $('#example2').dataTable().fnDestroy();
     //  $.ajax({
		   // url: '/sprookr/adminpanel/Controller/deal/expireddatafilter.php?data=a4',
		   // type: 'POST',
		   // success: function(data){
		   //         //console.log(data);
		   //         $("#result_data").empty();
		   //         $("#result_data").append(data);
		   //         $('#example2').dataTable({
		   //          "destroy":true,
		   //  		});
		   // }
     //  });
    }
    function purchased()
    {
      loadfilter()
    	// $('#example2').dataTable().fnDestroy();
     //  $.ajax({
		   // url: '/sprookr/adminpanel/Controller/deal/purchaseddatafilter.php?data=a5',
		   // type: 'POST',
		   // success: function(data) {
		   //         //console.log(data);
		   //         $("#result_data").empty();
		   //         $("#result_data").append(data);
		   //         $('#example2').dataTable({
		           
		   //          "destroy":true,
		   //  		});
		   // }
     //  });
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
                                    <select id="business_deal" name="" class="form-control select2">
                                       <option value="0">Select Business</option> 
                                       
                                       <?php foreach ($getbusiness as  $data) {
                                          ?> <option value="<?php echo $data['user_id']; ?>"><?php echo $data['business_name']; ?></option> <?php }?>                             
                                  </select>
                                </div> 
                                <label for="branch" class="col-sm-2 control-label" style="margin-top: 10px;">Business Branch</label>
                                <div class="col-sm-5" style="padding-top: 6px;">
                                    <select id="branch_deal" name="" class="form-control select2">
                                       <option value="0">Select Business Branch</option>
                                      
                                  </select>
                                </div> 
                          </div>
                              <div class="row">
                                <label for="tag" class="col-sm-1 control-label" style="margin-top: 25px">Tag</label>
                                <div class="col-sm-2" style="padding-top: 20px">
                                    <select id="tag_deal" name="" class="form-control select2">
                                       <option value="0">Select tag</option>
                                       <?php 
                                       foreach ($gettag as  $data) {
                                          ?> <option value="<?php echo $data['tag_id']; ?>"><?php echo $data['tag']; ?></option> <?php }?>
                                  </select>
                                </div> 
                                <label for="category" class="col-sm-1 control-label" style="margin-top: 25px">Catgeory</label>
                                <div class="col-sm-3" style="padding-top: 20px">
                                    <select id="category_deal" name="" class="form-control select2">
                                       <option value="0">Select Catgeory</option>
                                        <?php 
                                        foreach ($getcategory as $data) {
                                          ?> <option value="<?php echo $data['category_id']; ?>"><?php echo $data['category_name']; ?></option> <?php }?>       
                                  </select>
                                </div> 
                                <label for="sub_category" class="col-sm-2 control-label" style="margin-top: 25px;">Sub Category</label>
                                <div class="col-sm-3" style="padding-top: 20px;padding-left: 5px;">
                                    <select id="sub_category_deal" name="" class="form-control select2">
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
      									<input type="radio" name="optradio" id="active" onclick="active();" value="active">Active
    							</label>
								<label class="radio-inline col-sm-2" style="margin-top: 25px;">
      									<input type="radio" name="optradio" id="deactive" onclick="deactive();" value="deactive">Deactive
    							</label>
								<label class="radio-inline col-sm-2" style="margin-top: 25px;">
      									<input type="radio" name="optradio" id="expired" onclick="expired();" value="expired">Expired
    							</label>
    							<label class="radio-inline col-sm-2" style="margin-top: 25px;">
      									<input type="radio" name="optradio" id="purchased" onclick="purchased();" value="purchased">Purchased
    							</label>
    							</div>	
                  <hr>
                  <table id="example2" class="table table-bordered table-condensed table-hover" style="width:100%">
                            <thead>
                            <tr>
                              <th style="text-align:center;" width="10%">#</th>
                              <th style="text-align:center;" width="10%">Deal Id</th>
                              <th style="text-align:center;" width="20%">Franchise Address</th>
                              <th style="text-align:center;" width="20%">Deal Title</th>
                              <th style="text-align:center;" width="10%">Promocode</th>
                              <th style="text-align:center;" width="10%">Terms and Condition</th>
                              <th style="text-align:center;" width="10%">Deal Photo</th>
                              <th style="text-align:center;" width="10%">Action</th>
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
<?php 
//include "../../View/header/footer.php";?> 
