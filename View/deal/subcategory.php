<?php 
$command = isset($_POST['get'])  ? $_POST['get'] : "";
$UsersId = isset($_POST['category_id'])  ? $_POST['category_id'] : 0;
//echo $UsersId;
switch($command){
case "subcategory":
$statement = "SELECT sub_category_id, sub_category_name FROM sub_category WHERE is_deleted=0 AND category_id=".$UsersId;
break;
// case "tag":
// $statement = "SELECT id, name FROM country WHERE state_id=".(int)stateId;
// break;
// case "category":
// $statement = "SELECT id, name FROM state WHERE country_id=".(int)countryId;
// break;
// case "sub_category":
// $statement = "SELECT id, name FROM state WHERE country_id=".(int)countryId;
// break;
default:
break;
}

$con = mysqli_connect("localhost", "root", "", "sprookr");
$res = mysqli_query($con,$statement) or die("Query Not Executed " . mysql_error($con));
$total_records = mysqli_num_rows($res);
// $data = array(); 
$retval="";
if($total_records > 0){
while($rows =mysqli_fetch_assoc($res)) 
{ 
	$retval=$retval."<option value='".$rows['sub_category_id']."'>".$rows['sub_category_name']."</option>";
}
}
echo $retval;
?>