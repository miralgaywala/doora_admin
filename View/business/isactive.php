<?php   
			$connection = mysqli_connect("localhost", "root", "", "sprookr");
			if(isset($_POST['is_active']))
			{
			$select = "update users SET is_active=".$is_super_market;
			$result = mysqli_query($connection, $select);
			if (mysqli_num_rows($result) > 0) {
			    echo "you have already check super market. Do you want super market?";
			} else {
			    	
			}
			}
			
           
            ?>