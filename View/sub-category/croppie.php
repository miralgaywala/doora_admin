<?php
$data=$_POST['sub_category_image'];
list($type, $data) = explode(';', $data);
list(, $data) = explode(',', $data);
$data = base64_decode($data);
//$imageName = mt_rand(1, 99999) . '.jpg';
$count=count (glob ($_SERVER['DOCUMENT_ROOT'].'/doora/images/sub_category/*.jpg'));
$imageName = $count + 1 . '.jpg';
echo $imageName;
file_put_contents($_SERVER['DOCUMENT_ROOT'].'/doora/images/sub_category/' . $imageName, $data);


// if ((($data == "image/gif") || ($data == "image/jpeg") || ($data == "image/jpg") || ($data == "image/pjpeg") || ($data == "image/x-png") || ($data == "image/png"))) {
//     echo "hii";
//     if ($data["error"] > 0) {
//         echo "No Picture upload";
//     } else {

//         if (file_exists("/doora/images/sub_category/" . $data)) {
//             echo 'This picture already exists';
//         } else {
//             file_put_contents('/doora/images/sub_category/' . $imageName, $data);
            
//             }
//         }
//     }
//  else {
//     echo('Something went wrong');
// }

/*if(isset($_FILES['sub_category_image']))
{
   $image = $_FILES['sub_category_image']['name'];
   echo $image;
}
    //echo "<script>alert('hii');</script>";
    /*function compress_image($source_url,$qualitiy){
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
    	if($_FILES["sub_category_image"]["error"] > 0){
    		$error = $_FILES["sub_category_image"]["error"];
    	}
    	elseif (($_FILES["sub_category_image"]["type"] == "image/gif") || ($_FILES["sub_category_image"]["type"] == "image/png") ||
    			($_FILES["sub_category_image"]["type"] == "image/jpg") || $_FILES["sub_category_image"]["type"] == "image/jpeg") {
    				
    				$filename = compress_image($_FILES["sub_category_image"]["tmp_name"],90);
    			  
    			
    	} 
    //$image = base64_decode($image);
         //$image_name = $_FILES['sub_category_image']['name'];
    echo $image;
    $image_name = time().'.png';
    echo $image_name;
    file_put_contents($_SERVER['DOCUMENT_ROOT']."/doora/images/sub_category/" .$image_name, $image);
}*/
//echo "hii";
?>