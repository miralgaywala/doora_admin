<?php 
$command = isset($_POST['get'])  ? $_POST['get'] : "";
switch($command){
case "tag":
$statement = "select tag_id,tag from deal_tags where is_deleted=0";
break;
// case "branch":
// $statement = "SELECT franchise_id, franchise_address FROM business_franchise WHERE business_user_id=".(int)UsersId;
// break;
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
$retval="<option value='0'>Select Tag</option>";
echo $retval;
if($total_records > 0){
while($rows =mysqli_fetch_assoc($res)) 
{
	echo "<option value='".$rows['tag_id']."'>".$rows['tag']."</option>";
}
}

?>