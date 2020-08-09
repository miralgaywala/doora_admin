<?php 
$business_id= $_POST['business_id'];
$branch= $_POST['branch'];
$tag= $_POST['tag'];
$sub_category= $_POST['sub_category'];
$category= $_POST['category'];
$radio = $_POST['radio'];
		include ".././deal/deal_controller.php";
        $controller=new deal_controller();          
        $controller->loadfilter_deal($business_id,$branch,$tag,$sub_category,$category,$radio);        
?>