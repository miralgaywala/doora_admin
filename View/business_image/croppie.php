<?php
$data=$_POST['category_image'];
list($type, $data) = explode(';', $data);
list(, $data) = explode(',', $data);
$data = base64_decode($data);

$im = imagecreatefromstring($data);
    	$t=time();
	 $imageName = "businessdefault.jpg";
	$destination = "../../../images/profile/".$imageName;
  file_put_contents($destination, $data);
  if(file_put_contents($destination, $data))
  {
    echo $imageName;
  }
  else
  {
    echo "not";
  }
  //Will save image to new path and filename.
  
// Getting file name
//  $t=time();
// $imageName = "cate_".$t. '.jpg';
//   $filename = $_FILES['picture']['name'];
//  //echo $_FILES['picture']['tmp_name'];
//   // Valid extension
//   $valid_ext = array('png','jpeg','jpg');

//   // Location
//   $location = "../../../images/category/".$imageName;

//   // file extension
//   $file_extension = pathinfo($location, PATHINFO_EXTENSION);
//   $file_extension = strtolower($file_extension);

//   // Check extension
//   if(in_array($file_extension,$valid_ext)){

// //     // Compress Image
//     $tmp_name = $_FILES["picture"]["tmp_name"];
//         move_uploaded_file($tmp_name,  $location);
//     echo $imageName;

//   }else{
//     echo "Invalid file type.";
//   }

// // Compress image
// function compressImage($source, $destination, $quality) {

//   $info = getimagesize($source);
// // echo "info";
// print_r($info);

//   if ($info['mime'] == 'image/jpeg' || $info['mime'] == 'image/jpg') 
//     {
//     $image = imagecreatefromjpeg($source);
// 	}
//   elseif ($info['mime'] == 'image/gif') 
//   {
//     $image = imagecreatefromgif($source);
// }
//   elseif ($info['mime'] == 'image/png') 
//   {
//     $image = imagecreatefrompng($source);
// }

//  print_r($image);

//   imagejpeg($image, $destination, $quality);


// }


// $data=$_POST['category_image'];
// list($type, $data) = explode(';', $data);
// list(, $data) = explode(',', $data);
// $data = base64_decode($data);
// //$imageName = mt_rand(1, 99999) . '.jpg';
// $t=time();
// // $count=count (glob ('../../../images/category/*'));
// //echo $count;
// $imageName = "cate_".$t. '.jpg';
// echo $imageName;
// file_put_contents('../../../images/category/' . $imageName, $data);
?>