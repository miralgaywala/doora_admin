<?php
    $image = $_FILES['category_image'];
    
    function compress_image($source_url,$qualitiy){
    	$get = getimagesize($source_url);
    	if($info['mime'] == 'image/jpeg'){
    		$image = imagecreatefromjpeg($source_url);
    	}
    	else if($info['mime'] == 'image/png'){
    		$image = imagecreatefrompng($source_url);
    	}
    	else if($info['mime'] == 'image/jpg'){
    		$image = imagecreatefromjpg($source_url);
    	}
    	else if($info['mime'] == 'image/gif'){
    		$image = imagecreatefromgif($source_url);
    	}
    	imagejpeg($image,$source_url);
    }

    if($_POST){
    	if($_FILES["category_image"]["error"] > 0){
    		$error = $_FILES["category_image"]["error"];
    	}
    	elseif (($_FILES["category_image"]["type"] == "image/gif") || ($_FILES["category_image"]["type"] == "image/png") ||
    			($_FILES["category_image"]["type"] == "image/jpg") || $_FILES["category_image"]["type"] == "image/jpeg") {
    				
    				$filename = compress_image($_FILES["category_image"]["tmp_name"],90);
    			  
    			
    	}
                                $source = $_FILES["category_image"]["tmp_name"];
                                  
                                $target = $_SERVER['DOCUMENT_ROOT']."/doora/images/category/" . $image; 
                                 
                                move_uploaded_file($source, $target);