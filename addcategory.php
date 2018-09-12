<?php include("header.php");
 include("sidemenu.php");
 ?>
<!--Main Content -->
    <section class="content">
        <div class="row">
        	<div class="col-xs-12">
        		<div class="box">
        			<br>
        			<!-- box-header -->
        			<div class="box-body">
        				<form class="form-horizontal" id="addcategory_form" role="form" action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
        					<div class="form-group notranslate">
                                <label for="category_name" class="col-sm-3 control-label">Category Name<span class="show_required">*</span></label>
                                <div class="col-sm-8" style="padding-top: 6px">
                                    <input name="category_name" type="text" id="category_name" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group notranslate">
                                <label for="category_image" class="col-sm-3 control-label">Category Image<span class="show_required">*</span></label>
                                    <div class="col-sm-8">
             	                        <input type="hidden" id="image" name="category_image" value="" />
                                    	<input name="category_image" type="file" id="category_image" accept="image/*" >
                                    <div id="preview_div" style="margin:10px 0 0 0">
                                        <img id="preview_img" src=thumbnail.png" data-src="" height="150" class="img-responsive img-thumbnail lazy">
                                    </div>
                                   </div>
                             </div>
                             <div class="box-footer  notranslate">
                                <input type="submit" name="category_submit" value="Submit" id="category_submit" class="btn btn-primary" />
                                <button class="btn btn-default pull-right">Cancel</button>
                            </div>
                            
                    </div>
                         </form>
        			</div>
        		</div>
        	</div>	
        </div>
    </section>
</div>
 <?php include("footer.php");?> 