

 <?php include("header.php");
 include("sidemenu.php");
 ?>
    <?php
        include 'Controller/controller.php';
        $controller=new controller();
        $controller->invoke();
        ?>
<?php
   
    if(isset($_POST['submit']) && !empty($_POST['submit']))
    {
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $dob=$_POST['dob'];
        $department=$_POST['department'];
        //echo $dob,$department,$lname,$fname;
    }
    ?>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3>Add Employee Form</h3>
                    </div>
                    <form role="form" method="POST">
                        <div class="box-body">
                            <div class="form-group">
                                 <label for="fname">First Name:</label>
                                 <input type="text" class="form-control" placeholder="Enter First Name" required="" name="fname">
                            </div>
                            <div class="form-group">
                                 <label for="lname">Last Name:</label>
                                 <input type="text" class="form-control" placeholder="Enter Last Name" required="" name="lname">
                            </div>
                            <div class="form-group">
                                    <label for="birthdate">Birth Date:</label>
                                    <div class='input-group date' id='datetimepicker2'>
                                    <input type="date" name="dob" class="form-control" required="">
                                    <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                            </div>
                            </div>
                              <div class="form-group">
                                <label>Select Department:</label>
                                <select class="form-control" required="" name="department">
                                  <option value="">select department</option>
                                  <option value="Marketing">Marketing</option>
                                  <option value="Devloper">Developer</option>
                                  <option value="Tester">Tester</option>
                                  <option value="Administrator">Administrator</option>
                                </select>
                              </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                               </div>
                            </div>
                         </form>
                </div>
            </div>
        </div>
    </section>
</div>
 <?php include("footer.php");?> 



