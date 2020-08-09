<?php 
// include "../../View/header/header.php";
//  include "../../View/header/sidemenu.php";
?> 
 <script type="text/javascript">
   function backdoora()
      {
           $.ajax({
                 url:"../../Controller/doorapoints/displaydoora_points.php",
                 method:"POST",
                 success:function(data)
                 {
                       $('.content-wrapper').html(data);
                      
                 }
            })
      }
 </script>
 
<!--Main Content -->
    <section class="content">
      <div class="row">
        <div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>View Doora Dollor Points</h2></div>
        <div class="col-md-2">
                <br/>   
               <!-- <a href="http://localhost/sprookr/adminpanel/Controller/category/displaycategorycontroller.php" class="btn btn-default"><b><- Back</b></a>-->
               <button style="float: right;" onclick="backdoora()" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>
           <!-- <a href="/sprookr/adminpanel/View/category/addcategory.php" class="btn btn-primary">+ Add Category</a>-->
        </div>
      </div> 
        <div class="row">
        	<div class="col-xs-12">
        		<div class="box">            
        			<div class="box-body">
        			 <table style="font-size: 15px;" style="width: 100%;" class="table table-striped">
                  <?php
                   foreach ($doorapoints as $key => $data) 
                  {
               ?>
                  <tr>
                  <td style="width: 20%">Id</td>
                  <td><?php echo $data['id'];?></td>
                  </tr>
                  <tr>
                  <td style="width: 20%">Doora Dollor Points</td>
                  <td><?php echo $data['type'];?></td>
                  </tr>
                   <tr>
                  <td style="width: 20%">Code</td>
                  <td><?php echo $data['code'];?></td>
                  </tr>
                   <tr>
                  <td style="width: 20%">Doora Dollor Points Description</td>
                  <td><?php echo $data['doora_dollar_points_desc'];?></td>
                  </tr>
                   <tr>
                  <td style="width: 20%">Points</td>
                  <td><?php echo $data['points'];?></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Created Date</td>
                  <td>
                    <script type="text/javascript"> 
                      var dateFormat = 'DD-MM-YYYY HH:mm:ss';
                      var testDateUtc = moment.utc('<?php echo $data["created_at"] ?>');
                      //alert(testDateUtc);
                      var localDate = testDateUtc.local();
                      // console.log(localDate.format(dateFormat));
                      document.getElementById("demo1").innerHTML = localDate.format(dateFormat);
                    </script>
                   <div id="demo1"></div></td>
                  </tr>
                  <tr>
                   <td style="width: 20%">Updated Date</td>
                  <td><script type="text/javascript">
                      var dateFormat = 'DD-MM-YYYY HH:mm:ss';
                      var testDateUtc = moment.utc('<?php echo $data["updated_at"] ?>');
                      //alert(testDateUtc);
                      var localDate = testDateUtc.local();
                      // console.log(localDate.format(dateFormat));
                      document.getElementById("demo2").innerHTML = localDate.format(dateFormat);
                    </script>
                   <div id="demo2"></div></td>
                  </tr>
                <?php } ?>
                </table>
        			</div>
        		</div>
        	</div>	
          <?php
           ?>
    </section>
</div>

 <?php 
//include "../../View/header/footer.php";?> 
 
     
                       
 