<?php 
include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/header.php");

include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/sidemenu.php");
 ?>

 <?php 
        include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/Controller/offer_type/offer_controller.php");
        $controller=new offer_controller();
        $controller->add_offer();       
        ?>

<!--Main Content -->

    <section class="content">
      <div class="row">
        <div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Add/Edit Offer</h2></div>
        <div class="col-md-2">
                <br/>   
            
               <button style="float: right;" onclick="window.location.href='/doora/adminpanel/Controller/offer_type/displayoffercontroller.php'" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>
        </div>
      </div>   
        <div class="row">
        	<div class="col-xs-12">
        		<div class="box">
        			<br>
        			<!-- box-header -->
        			<div class="box-body">
        				<form class="form-horizontal" name="addoffer" id="addoffer_form" role="form" action="" method="post" onsubmit="return validateForm();">
        					<div class="form-group notranslate">
                                <label for="offer_title" class="col-sm-3 control-label">Offer Title<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <input name="offer_title" type="text" id="offer_title" class="form-control"/>
                                    <span id="offer_error" class="show_required"></span><br>
                                </div>
                            </div>                                              
                             <div class="box-footer  notranslate">
                                    <input type="submit" name="offer_submit" style="margin-left: 5px;" class="btn btn-primary pull-right" value="Submit" id="offer_submit"/>
                                    <input type="button" class="btn btn-default pull-right" onclick="document.getElementById('addoffer_form').reset();window.location.href='/doora/adminpanel/Controller/offer_type/displayoffercontroller.php'" value="Cancel"></button>
                            </div>  
                           </div>
                         </form>
        			</div>
        		</div>
        	</div>	
       
    </section>
</div>

 <?php 
 include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/footer.php");?> 
 <script type="text/javascript">
                      function validateForm() {
                                    var offer = document.getElementById("offer_title").value;
                                    var count=0;
                                    if (offer.trim() == "") {
                                        document.getElementById('offer_error').innerHTML="Please Enter Offer Title";
                                        count++;
                                      }
                                      else
                                      {
                                      	document.getElementById('offer_error').innerHTML="";
                                      }
                                   
                                   if(count>0)
                                   {
                                   	return false;
                                   }
                                   else
                                   {
                                   	return true;
                                   }
                                  }
 
</script>
 <?php 
                            if(isset($_POST['offer_submit']) && !empty($_POST['offer_submit'])){
                                  $offer =$_POST['offer_name'];
                              }
                            ?>       