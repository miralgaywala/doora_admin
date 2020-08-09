<?php   
			$connection = mysqli_connect("localhost", "root", "de!1@2#al", "doora_db");
			if(isset($_POST['is_super_market']))
			{
			$select = "select count(*) from category where 'is_super_market'=1";
			$result = mysqli_query($connection, $select);
			if (mysqli_num_rows($result) > 0) {
			    echo "you have already check super market. Do you want super market?";
			} else {
			    	
			}
			}
			
           
            ?>