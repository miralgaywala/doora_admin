<?php include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/header.php");
 include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/sidemenu.php");
 ?>
<!--Main Content -->

    <section class="content">
    	<div class="row">
    		<div class="col-md-10"></div>
    		<div class="col-md-2">
    			<button type="button" class="btn btn-primary" onclick="window.location.href='/doora/adminpanel/View/category/addcategory.php';"><b>+ Add Category</b></button>
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
			                  <th style="text-align:center;">#</th>
			                  <th style="text-align:center;" width="10%">Id</th>
			                  <th style="text-align:center;" width="20%">Image</th>
			                  <th style="text-align:center;">Category Name</th>
			                  <th style="text-align:center;" width="10%">Is_Delete</th>
			                  <th style="text-align:center;">Action</th>
			                </tr>
							 </thead>
                             <tr>
                                <td style="text-align:center;"></td>
                                <td style="text-align:center;">1</td>
                                <td style="text-align:center;"><img src="/doora/images/category/1.jpg" id="Picture"/></td>
                                <td style="text-align:center;">Electronics</td>
                                <td style="text-align:center;">1</td>
                                <td style="text-align:center;">
                                    <div >
                                        <a href="#">
                                          <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                        <a href="#">
                                          <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                        <a href="#">
                                          <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                    </div>
                                </td>
                             </tr>
                             <tr>
                                <td style="text-align:center;"></td>
                                <td style="text-align:center;">2</td>
                                <td style="text-align:center;"><img src="/doora/images/category/2.jpg" id="Picture"/></td>
                                <td style="text-align:center;">Fashion</td>
                                <td style="text-align:center;">0</td>
                                <td style="text-align:center;">
                                    <div >
                                        <a href="#">
                                          <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                        <a href="#">
                                          <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                        <a href="#">
                                          <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                    </div>
                                </td>
                             </tr>
                             <tr>
                                <td style="text-align:center;"></td>
                                <td style="text-align:center;">3</td>
                                <td style="text-align:center;"><img src="/doora/images/category/1.jpg" id="Picture"/></td>
                                <td style="text-align:center;">Food & drink</td>
                                <td style="text-align:center;">1</td>
                                <td style="text-align:center;">
                                    <div >
                                        <a href="#">
                                          <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                        <a href="#">
                                          <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                        <a href="#">
                                          <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                    </div>
                                </td>
                             </tr>
                         </table>
        			</div>
        		</div>
        	</div>	
       </div>
    </section>
</div>
 <?php include($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/header/footer.php");?> 
 