 <?php include("header.php");
 include("sidemenu.php");
 ?>
    
 <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
   <script>
        $(document).ready(function(){
            $("#Employee").select2(); 
        });
    </script>
    
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3>Select Employee
                    </div>
                    <form role="form" method="POST">
                        <div class="box-body">
                             <div class="form-group">
                                 <select id="Employee" name="Employee" class="form-control">
                                    <option value="">Select employee</option>
                                     <?php
                                         foreach ($result as $data) 
                                          {
                                      ?>  
                                    <option value="<?php echo $data[1];?>"><?php echo $data[1];?></option>
                                  <?php 
                                    }
                                    ?>
                                </select>
                             </div>
                          </div>
                         </form>
                </div>
            </div>
        </div>
    </section>
</div>
 <?php include("footer.php");?> 



