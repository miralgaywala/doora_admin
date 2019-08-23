<?php include '../../config.php'; ?>

<?php   $connection = $db;
			if(isset($_POST['is_super_market']))
			{
			$select = "select count(*) from category where 'is_super_market'=1";
			$result = mysqli_query($connection, $select);
			if (mysqli_num_rows($result) > 0) {
			    echo "You have already check super market. Do you want super market?";
			} else {
			    	
			}
			}
			
           
            ?>