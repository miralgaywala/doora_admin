
 <?php include "./header.php";
 include "./sidemenu.php";
 ?>
<?php include '../../config.php'; ?>

<?php   $connection = $db;
			
					$total_business = "SELECT COUNT(*) FROM users WHERE is_business=1 AND created_at >= NOW()";
					$result = mysqli_query($connection, $total_business);
					$business = mysqli_fetch_array($result);
					
					$total_customer = "SELECT COUNT(*) FROM users WHERE is_business=0 AND created_at >= NOW()";
					$result = mysqli_query($connection, $total_customer);
					$customer = mysqli_fetch_array($result);

					$total_user = "SELECT COUNT(*) FROM users";
					$result = mysqli_query($connection, $total_user);
					$user = mysqli_fetch_array($result);

					$total_deal = "SELECT COUNT(*) FROM business_deal where is_active=1";
					$result = mysqli_query($connection, $total_deal);
					$deal = mysqli_fetch_array($result);
			
            ?>
<section class="content-header">
            <h1>
                Doora
            </h1>
            <br/>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">New Registration<br/>Business</span>
                          <span class="info-box-number"><?php echo $business['COUNT(*)']; ?></span> 
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">New Registration<br/>Customer</span>
                            <span class="info-box-number"><?php echo $customer['COUNT(*)']; ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Users</span><br/>
                            <span class="info-box-number"><?php echo $user['COUNT(*)']; ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Deals</span><br/>
                           <span class="info-box-number"><?php echo $deal['COUNT(*)']; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</div>
 <?php include "./footer.php"; ?> 



