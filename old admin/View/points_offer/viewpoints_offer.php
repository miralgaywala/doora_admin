<?php 
// include "../../View/header/header.php";
//  include "../../View/header/sidemenu.php";
?> 
 <script type="text/javascript">
    function backoffer_points()
            {
         
            $.ajax({
                  url:"../../Controller/points_offer/displaypoints_offer.php",
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
        <div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>View Points Offer</h2></div>
        <div class="col-md-2">
                <br/>   
               <!-- <a href="http://localhost/sprookr/adminpanel/Controller/category/displaycategorycontroller.php" class="btn btn-default"><b><- Back</b></a>-->
               <button style="float: right;" onclick="backoffer_points()" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>
           <!-- <a href="/sprookr/adminpanel/View/category/addcategory.php" class="btn btn-primary">+ Add Category</a>-->
        </div>
      </div> 
        <div class="row">
        	<div class="col-xs-12">
        		<div class="box">            
        			<div class="box-body">
        			 <table style="font-size: 15px;" style="width: 100%;" class="table table-striped">
                  <?php
                   foreach ($displaydetailpoints_offer as $key => $data) 
                 
                  {
                    // echo "<pre>"; print_r($data); echo "</pre>";
                    if($data['business_id'] != 0 )
                    {
                      foreach ($business_name as $key => $value) {
                        $business_name = $value['business_name'];
                      }
                    }
                    else
                    {
                      $business_name = 0;
                    }
               ?>
                  <tr>
                  <td style="width: 20%">Offer Id</td>
                  <td><?php echo $data['offer_id'];?></td>
                  </tr>
                  <tr>
                  <td style="width: 20%">Offer Description</td>
                  <td><?php echo $data['offer_desc'];?></td>
                  </tr>
                  <tr>
                   <tr>
                  <td style="width: 20%">Is Fixed Point</td>
                  <td><?php if($data['is_fixed_points'] == 0)
                      {
                        echo "No";
                      }
                      else
                        {
                          echo "Yes";
                        }?></td>
                  </tr> 
                      <tr>
                  <td style="width: 20%">Points</td>
                  <td><?php echo $data['points'];?></td>
                  </tr>  
                   <tr>
                  <td style="width: 20%">Multiplier</td>
                  <td><?php echo $data['multiplier'];?></td>
                  </tr> 
                  <tr>
                  <td style="width: 20%">Business Name</td>
                  <td><?php echo $business_name;?></td>
                  </tr> 
                   <tr>
                  <td style="width: 20%">Number Of Purchase</td>
                  <td><?php echo $data['number_of_purchase'];?></td>
                  </tr>  
                   <tr>
                   <td style="width: 20%">Offer Start Date</td>
                  <td>
                    <script type="text/javascript">
                      var dateFormat = 'DD-MM-YYYY HH:mm:ss';
                      var testDateUtc = moment.utc('<?php echo $data["offer_start_date"] ?>');
                      //alert(testDateUtc);
                      var localDate = testDateUtc.local();
                      // console.log(localDate.format(dateFormat));
                      document.getElementById("demo4").innerHTML = localDate.format(dateFormat);
                    </script>
                   <div id="demo4"></div></td>
                  </tr>
                   <tr>
                   <td style="width: 20%">Offer End Date</td>
                  <td>
                    <script type="text/javascript">
                      var dateFormat = 'DD-MM-YYYY HH:mm:ss';
                      var testDateUtc = moment.utc('<?php echo $data["offer_end_date"] ?>');
                      //alert(testDateUtc);
                      var localDate = testDateUtc.local();
                      // console.log(localDate.format(dateFormat));
                      document.getElementById("demo3").innerHTML = localDate.format(dateFormat);
                    </script>
                   <div id="demo3"></div></td>
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
 
     
                       
 