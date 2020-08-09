<?php   
			$connection = mysqli_connect("localhost", "root", "", "sprookr");
			if (!$connection) {
			    die("Database connection not successful");
			} else {
			    //echo "connection successful";
			}
			$name=$_POST['sub_category_name'];
			$select = "select * from sub_category where sub_category_name='".$name."' AND is_deleted=0";
			$result = mysqli_query($connection, $select);
			if (mysqli_num_rows($result) > 0) {
			    echo "data alredy exist";
			} else {
			    	
			}
           
            ?>