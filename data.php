<?php include("header.php");
 include("sidemenu.php");
 ?>
   <!-- Main content -->
   
   <section class="content">
        <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
                <h1 class="box-title"><b>Employee List</b></h1>
            </div>
                  <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Birth Date</th>
                  <th>Department</th>
                </tr>
				 </thead>
                <?php
                 foreach ($ans as $data) {
                     ?>         
                    <tr>
                        <td> <?php echo $data[0];  ?> </td>
                        <td> <?php echo $data[1];  ?> </td>
                        <td> <?php echo $data[2];  ?> </td>
                        <td> <?php echo $data[3]; ?> </td>
                        <td> <?php echo $data[4];  ?> </td>  
                           <?php }
                               ?>
                    </tr>  
               
				
              </table>
                  </div>
              
                </div>
           
            </div>
        </div>
       </section>
	    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
 <?php include("footer.php");?>




