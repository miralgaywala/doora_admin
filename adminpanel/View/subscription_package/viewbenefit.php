<?php
       foreach ($view_benefit as $key => $data) 
                  {
                    $id=$data['benefit_id'];

               ?>
<script type="text/javascript">
           function backsubscription(id)
            {
         
            $.ajax({
                 url:"../../Controller/subscription_package/viewbenefitsofpackage_controller.php?id="+id,
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
       <div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>View Benefit</h2></div>
        <div class="col-md-2">
                <br/>   
               <!-- <a href="http://localhost/sprookr/adminpanel/Controller/category/displaycategorycontroller.php" class="btn btn-default"><b><- Back</b></a>-->
               <button style="float: right;" onclick="backsubscription(<?php echo $data['subscription_plan_id']; ?>)" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</button>
           <!-- <a href="/sprookr/adminpanel/View/category/addcategory.php" class="btn btn-primary">+ Add Category</a>-->
        </div>
      </div>   
      
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <br>
              <!-- box-header -->
              <div class="box-body">

              <table style="font-size: 15px;" style="width: 100%;" class="table table-striped">
                  <tr>
                 <td style="width: 20%">Subscription plan</td>
                  <td><?php echo $data['subscription_name'];?></td>
                  </tr>
                  <tr>
                  <td style="width: 20%">Title</td>
                  <td><?php echo $data['title'];?></td>
                  </tr>
                 <tr>
                  <td style="width: 20%">Is Main</td>
                  <td><?php if($data['is_main'] == 0)
                  {
                    echo "No";
                  }
                  else
                    {
                      echo "Yes";
                    }?></td>
                  </tr> 
                <?php } ?>
              </div>
            </div>              
    </section>
</div>
