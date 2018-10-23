<?php 
$command = isset($_POST['get'])  ? $_POST['get'] : "";
$UsersId = isset($_POST['user_id'])  ? $_POST['user_id'] : 0;
//echo $UsersId;
switch($command){
case "branch":
$statement = "SELECT franchise_id, franchise_address FROM business_franchise WHERE is_deleted=0 AND business_user_id=".$UsersId;
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
	$retval=$retval."<option value='".$rows['franchise_address']."'>".$rows['franchise_address']."</option>";
}
}
echo $retval;
?>