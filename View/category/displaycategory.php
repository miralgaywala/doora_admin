<?php include("View/header/header.php");
 include("View/header/sidemenu.php");
 ?>
<!--Main Content -->

    <section class="content">
    	<div class="row">
    		<div class="col-md-10"></div>
    		<div class="col-md-2">
    			<button type="button" class="btn btn-primary" onclick="window.location='View/category/addcategory.php'"><b>+ Add Category</b></button>
    		</div>

    	</div> 	
        <div class="row" >
        	<div class="col-xs-12">
        		<br/>
        		<div class="box">
        			<br>
        			<!-- box-header -->
			        	<div class="box-header">
			                <h1 class="box-title"><b>Category List</b></h1>
			            </div>
        				<div class="box-body">
        				<table id="example1" class="table table-bordered table-hover">
			                <thead>
			                <tr>
			                  <th></th>
			                  <th>Id</th>
			                  <th>Image</th>
			                  <th>Category Name</th>
			                  <th>Is_Delete</th>
			                  <th>Action</th>
			                </tr>
							 </thead>
                             <tr>
                                <td></td>
                                <td>1</td>
                                <td><img src="/doora/adminpanel/images/IMG_144869.jpg" id="Picture"/></td>
                                <td>electronics</td>
                                <td>1</td>
                                <td></td>
                             </tr>
                             <tr>
                                <td></td>
                                <td>2</td>
                                <td>image2</td>
                                <td>electronics</td>
                                <td>1</td>
                                <td></td>
                             </tr>
                             <tr>
                                <td></td>
                                <td>2</td>
                                <td>image3</td>
                                <td>electronics</td>
                                <td>1</td>
                                <td></td>
                             </tr>
                         </table>
        			</div>
        		</div>
        	</div>	
       </div>
    </section>
</div>
 <?php include("View/header/footer.php");?> 
 