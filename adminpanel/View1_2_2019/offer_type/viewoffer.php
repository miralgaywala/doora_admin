 <?php //include "../../View/header/header.php";
//  include "../../View/header/sidemenu.php";
 ?>
 <script type="text/javascript">
   function backoffer()
            {
         
            $.ajax({
                 url:"../../Controller/offer_type/displayoffercontroller.php",
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
        <div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>View Offer</h2></div>
        <div class="col-md-2">
                <br/>   
               <!-- <a href="http://localhost/sprookr/adminpanel/Controller/category/displaycategorycontroller.php" class="btn btn-default"><b><- Back</b></a>-->
               <button style="float: right;" onclick="backoffer()" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>
           <!-- <a href="/sprookr/adminpanel/View/category/addcategory.php" class="btn btn-primary">+ Add Category</a>-->
        </div>
      </div> 
        <div class="row">
        	<div class="col-xs-12">
        		<div class="box">            
        			<div class="box-body">
        			 <table style="font-size: 15px;" style="width: 100%;" class="table table-striped">
                  <?php
                   foreach ($view_offer as $key => $data) 
                  {
               ?>
                  <tr>
                 <td style="width: 20%">Offer Id</td>
                  <td><?php echo $data['offer_id'];?></td>
                  </tr>
                  <tr>
                  <td style="width: 20%">Offer Title</td>
                  <td><?php echo $data['offer_title'];?></td>
                  </tr>
                  <tr>
                  <td style="width: 20%">Is Deleted</td>
                  <td><?php if($data['is_deleted'] == 0)
                  {
                    echo "No";
                  }
                  else
                    {
                      echo "Yes";
                    }?></td>
                  </tr>
                  <tr>
                  <td style="width: 20%">Created Date</td>
                  <td><?php echo $data['created_at'];?></td>
                  </tr>
                  <tr>
                  <td style="width: 20%">Updated Date</td>
                  <td><?php echo $data['updated_at'];?></td>
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

<?php //include "../../View/header/footer.php";?>  
     
                       
 