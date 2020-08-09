<?php
$my_var = <<<EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>

		<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Register</title>
		
		<style>

			body{margin:0;color:black;}

			.cc2 {
				background-color: #F15C5C;
				border: 3px solid #F15C5C;
				padding: 50px;
				zoom: 80%;
			}

			.img32 {
				width: 100px;
			}

			.img12 {
				float: right;
				padding-top: 30px;
				padding-bottom: 30px;
			}

			.padding_class {
				padding: 25px;
			}

			.doora_button {
			  background-color: #F15C5C;
			  border: none;
			  color: white;
			  padding: 15px 32px;
			  text-align: center;
			  text-decoration: none;
			  display: inline-block;
			  font-size: 16px;
			  margin: 4px 2px;
			  cursor: pointer;
			  border-radius: 5px;
			}

			.doora_footer {
			   
			   left: 0;
			   bottom: 0;
			   width: 100%;
			   background-color: #F15C5C;
			   color: white;
			   text-align: center;
			}

			.box {
			    width:600px;
			    text-align:center;
			    margin:auto;
			    padding-top: 20px;
			    padding-bottom: 20px;
			}

			.img_foot_class {
			    margin:5px;
			    width: 25px;
			}

			@supports (-webkit-overflow-scrolling: touch) {

				@media all and (min-device-width: 320px) {
					.cc2 {
						background-color: #F15C5C !important;
						border: 3px solid #F15C5C !important;
						zoom: 80% !important;
					}
					.img12 {
						float: right !important;
						padding-top: 50px !important;
						zoom: 60% !important;
						width: 100px !important;
					}
					.img32 {
						width: 150px !important;
						padding-left: 20px !important;
					}
					.padding_class {
						padding: 20px !important;
					}
				}

				@media all and (min-device-width:360px) {
					.cc2 {
						background-color: #F15C5C !important;
						border: 3px solid #F15C5C !important;
						zoom: 80% !important;
					}
					.img12 {
						float: right !important;
						padding-top: 50px !important;
						zoom: 80% !important;
						width: 110px !important;
					}
					.padding_class {
						padding: 20px !important;
					}
				}

				@media all and (min-device-width:375px) {
					.cc2 {
						background-color: #F15C5C !important;
						border: 3px solid #F15C5C !important;
						zoom: 80% !important;
					}
					.img12 {
						float: right !important;
						padding-top: 50px !important;
						zoom: 80% !important;
						padding-bottom: 50px !important;
						width: 110px !important;
					}
					.img32 {
						width: 150px !important;
					}
					.padding_class {
						padding: 20px !important;
					}
					.text_class{
						padding-bottom:20px !important;
					}
				}

				@media all and (min-device-width:414px) {
					.cc2 {
						background-color: #F15C5C !important;
						border: 3px solid #F15C5C !important;
						zoom: 80% !important;
					}
					.img12 {
						float: right !important;
						padding-top: 50px !important;
						padding-bottom: 10px !important;
						zoom: 80% !important;
						width: 120px !important;
					}
					.padding_class {
						padding: 20px !important;
					}
					.text_class{
						padding-bottom:20px !important;
					}
				}

				@media all and (min-device-width: 768px) {
					.cc2 {
						background-color: #F15C5C !important;
						border: 3px solid #F15C5C !important;
						zoom: 80% !important;
					}
					.img12 {
						float: right !important;
						padding-top: 30px !important;
						padding-bottom: 30px !important;
						zoom: 120% !important;
						width: 150px !important;
					}
					.padding_class {
						padding: 55px !important;
						padding-top: 30px !important;
					}
					.img32 {
						padding-top: 35px !important;
						width: 200px !important;
					}

				}

				@media all and (min-device-width:1024px) {
					.cc2 {
						background-color: #F15C5C !important;
						border: 3px solid #F15C5C !important;
						zoom: 80% !important;
					}
					.img12 {
						float: right !important;
						padding-top: 30px !important;
						padding-bottom: 30px !important;
						zoom: 120% !important;
						width: 150px !important;
					}
					.padding_class {
						padding: 55px !important;
						padding-top: 30px !important;
					}
					.img32 {
						padding-top: 40px !important;
						width: 200px !important;
					}
				}

				@media all and (width : 375px) and (height : 635px) and (orientation : portrait) and (-webkit-device-pixel-ratio : 3) {

				    .cc2 {
						background-color: #F15C5C !important;
						border: 3px solid #F15C5C !important;
						zoom: 80% !important;
					}
					.img12 {
						float: right !important;
						padding-top: 50px !important;
						zoom: 80% !important;
						padding-bottom: 50px !important;
						width: 110px !important;
					}
					.img32 {
						width: 150px !important;
					}
					.padding_class {
						padding: 20px !important;
					}
					.text_class{
						padding-bottom:20px !important;
					}
				}
				    
			}

			@supports not (-webkit-overflow-scrolling: touch) {

				@media all and (min-device-width: 320px) {
					.cc2 {
						background-color: #F15C5C !important;
						border: 3px solid #F15C5C !important;
						zoom: 80% !important;
					}
					.img12 {
						float: right !important;
						padding-top: 50px !important;
						zoom: 60% !important;
						width: 100px !important;
					}
					.img32 {
						width: 150px !important;
						padding-left: 20px !important;
					}
					.padding_class {
						padding: 20px !important;
					}
				}

				@media all and (min-device-width:360px) {
					.cc2 {
						background-color: #F15C5C !important;
						border: 3px solid #F15C5C !important;
						zoom: 80% !important;
					}
					.img12 {
						float: right !important;
						padding-top: 50px !important;
						zoom: 80% !important;
						width: 110px !important;
					}
					.padding_class {
						padding: 20px !important;
					}
				}

				@media all and (min-device-width:375px) {
					.cc2 {
						background-color: #F15C5C !important;
						border: 3px solid #F15C5C !important;
						zoom: 80% !important;
					}
					.img12 {
						float: right !important;
						padding-top: 50px !important;
						zoom: 80% !important;
						padding-bottom: 50px !important;
						width: 110px !important;
					}
					.img32 {
						width: 150px !important;
					}
					.padding_class {
						padding: 20px !important;
					}
					.text_class{
						padding-bottom:20px !important;
					}
				}

				@media all and (min-device-width:414px) {
					.cc2 {
						background-color: #F15C5C !important;
						border: 3px solid #F15C5C !important;
						zoom: 80% !important;
					}
					.img12 {
						float: right !important;
						padding-top: 50px !important;
						padding-bottom: 10px !important;
						zoom: 80% !important;
						width: 120px !important;
					}
					.padding_class {
						padding: 20px !important;
					}
					.text_class{
						padding-bottom:20px !important;
					}
				}

				@media all and (min-device-width: 768px) {
					.cc2 {
						background-color: #F15C5C !important;
						border: 3px solid #F15C5C !important;
						zoom: 80% !important;
					}
					.img12 {
						float: right !important;
						padding-top: 30px !important;
						padding-bottom: 30px !important;
						zoom: 120% !important;
						width: 150px !important;
					}
					.padding_class {
						padding: 55px !important;
						padding-top: 30px !important;
					}
					.img32 {
						padding-top: 35px !important;
						width: 200px !important;
					}

				}

				@media all and (min-device-width:1024px) {
					.cc2 {
						background-color: #F15C5C !important;
						border: 3px solid #F15C5C !important;
						zoom: 80% !important;
					}
					.img12 {
						float: right !important;
						padding-top: 30px !important;
						padding-bottom: 30px !important;
						zoom: 120% !important;
						width: 150px !important;
					}
					.padding_class {
						padding: 55px !important;
						padding-top: 30px !important;
					}
					.img32 {
						padding-top: 35px !important;
						width: 200px !important;
					}
				}

				@media all and (width : 375px) and (height : 635px) and (orientation : portrait) and (-webkit-device-pixel-ratio : 3) {

				    .cc2 {
						background-color: #F15C5C !important;
						border: 3px solid #F15C5C !important;
						zoom: 80% !important;
					}
					.img12 {
						float: right !important;
						padding-top: 50px !important;
						zoom: 80% !important;
						padding-bottom: 50px !important;
						width: 110px !important;
					}
					.img32 {
						width: 150px !important;
					}
					.padding_class {
						padding: 20px !important;
					}
					.text_class{
						padding-bottom:20px !important;
					}
				}


			}

		</style>

	</head>

	<body style='font-family: Verdana;color:black;margin: 0;'>

		<div>
		
			<div class='cc2' style='background-color: #F15C5C;border: 3px solid #F15C5C;padding: 20px;zoom: 80%;padding-top:10px;'>
				<img class='img32' src="https://doora.app/doora/images/mail/doora_icon.png" style="width: 150px;padding-left: 20px;">
				<img class="img12" src="https://doora.app/doora/images/resize.png" style='float: right;padding-top: 30px;padding-bottom: 30px;width: 150px;'>
			</div>

			<div>
				<div style='padding: 20px;' class='padding_class'>
					<h3 style='margin-bottom:0px;'>
						<strong>
							<span style="color:black !important;padding-top:0; padding-right:9px; padding-bottom:0px;font-size: 13px;">Welcome to doora!</span>
						</strong>
					</h3>
					<p style="text-align: left;margin-top:0px !important;"><br><span style="color:black !important;font-size: 13px !important;" class='text_class'>Hi, <strong>{$business_name}!</strong></span></p>
					<p style="text-align: justify !important;color:black !important;font-size:13px !important;">
						<span style="color:black !important;">Brody and Carl here<br><br>We would like to be the first to welcome you to the next generation in mobile  adverstising - <strong>Doora.</strong><br><br>Over the last 5 years we've  endeavored to create a brand-new platform with a direct connection to your consumers. Doora enables your business to post enticing offers at any time, giving everyone a nudge in your direction.<br><br><ul style="color:black !important;font-size: 13px !important;"><li style="color:black !important;font-size: 13px !important;">How it works:</li></ul><ol style="color:black !important;font-size: 13px !important;"><li style="color:black !important;">The platform provides you with a camera to take a photo, video or upload content from your camera roll.</li><br><li style="color:black !important;">Add all of the details of your offer; type, timeframe, quantity, redeemable in store or online, T&amp;C's etc.</li><br><li style="color:black !important;">Select your Category(s) and Subcategory(s), then add specific Keywords allowing, consumers to search and find your offer.</li><br><li style="color:black !important;">Select Post and your offer is avalaible!</li><br></ol><br><span style="color:black !important;font-size: 13px !important;">Consumers then simply select a category, set a travel radius and locate your offer! Also, If the consumer is following  your Business, they will recieve a notification that you have an offer available - whenever, wherever they are!<br><br>	We know you'll love Doora as much as we do - but if you have any questions or concerns, please don't hesitate to contact us at <strong style="color:blue !important;"><a href="mailto:hello@doora.app?Subject=Hey" target="_top">hello@doora.app</a></strong><br>So hit the button below and begin your registration. We'll be with you every step of the way!</span><br><br></span>
					</p>
					<span style="color:black !important;">And remember, </span><strong style="color:black !important;">#savemoorawithdoora</strong>
					<br>
					<br>
					<br>
					<a class='doora_button' style='background-color: #F15C5C;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;border-radius: 5px;' href='https://doora.app/doora/api/verify/index.php?user_id=$user_id'>
						Doora App
					</a>
				</div>
				
				<div style='left: 0;bottom: 0;width: 100%;background-color: #F15C5C;color: white;text-align: center;' class='doora_footer'>
					<div style='width:auto;text-align:center;margin:auto;padding-top: 20px;padding-bottom: 20px;' class='box'>

						<a href='#'>
							<img src="https://doora.app/doora/images/facebook.png" style='margin:5px;width: 25px;' class='img_foot_class'>					
						</a>
						<a href='#'>
							<img src="https://doora.app/doora/images/instagram.png" style='margin:5px;width: 25px;' class='img_foot_class'>
						</a>

				        <p>
							<span style="font-size:18px">2019 Doora Group - <a href="https://doora.app/" style="text-decoration: none;color:#FFFFFF;">www.doora.app</a></span>
				        </p>
					</div>
				</div>
			</div>

		</div>

	</body>
</html>


EOD;
?>