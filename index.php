<?php
/*
Author:VISHVESH BHAVSAR
ROLL NO:19BCE504
Class:4BCEA
*/?>
<?php
session_start();
if (isset($_SESSION['id']))
	$id=$_SESSION['id'];
	include 'cart_display_min.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/lightbox2/css/lightbox.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	  <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main1.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
<!--===============================================================================================-->
</head>
<body class="animsition" bgcolor="3366FF">

	<!-- Header -->
	<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">
			<div class="topbar">
				<div class="topbar-child2">
					<span class="topbar-email">
						opticonnect12@gmail.com
					</span>
				</div>
			</div>
			<div class="wrap_header">
				<!-- Logo -->
				<a href="index.php" class="logo">
					<img src="images/icons/icon.jpeg" alt="IMG-LOGO" width="50" height="50">
				</a>

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<a href="index.php">Home</a>								
							<li>
								<a href="product.php">Shop</a>
							</li>

							<li>
								<a href="cart.php">Cart</a>
							</li>
							<li>
								<a href="about.php">About</a>
							</li>
							<?php if (isset($_SESSION['id']))
							{
								?>
							<li>
								<a href="yorders.php">Your Orders</a>
							</li>
						<?php } ?>							
						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">
					<br><br>
					<label name="loggeduser" style="margin-top: 9px;margin-right: -15px"><br><br>Hello,
					<?php	
						if (isset($_SESSION['username']))
						{
							echo "".$_SESSION['owner'];
						}
						else
							echo "User"; 
					 ?>
					 </label>
					 <span class="linedivide1"></span>
					<a href="#" class="header-wrapicon1 dis-block">
						<img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
					</a>
					<?php
						if (isset($_SESSION['username']))
					 	{
					 		?>
						<?php
						}
					 	else
					 	{ 
					 	?><a href="Login.php" class="header-wrapicon1 dis-block">
							<img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
						</a>
					 	<?php } ?>
					<span class="linedivide1"></span>
						<ul class="menu">
							<li>
								<form action="logout.php" method="POST">
									<Button type="submit" name="logout" class="btn btn-default" style="margin-top: 10px"><?php	
					 							if (isset($_SESSION['username']))
					 	 							{
					 	 							?> Logout
													<?php
														}
					 								else
					 								{ 
					 								?>Login
					 						<?php } ?></Button>
								</form>
							</li>
						</ul>
					<?php if (isset($_SESSION['id']))
					 {
					 ?>
					<span class="linedivide1"></span>
					<div class="header-wrapicon2">
						<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<?php echo '<span class="header-icons-noti">'.$rowcount.'</span>' ?>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<?php for ($i=0; $i <$rowcount ; $i++) 
							{ 
							?>
							<ul class="header-cart-wrapitem">
								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<?php echo '<img src="'.$arr[$i]['product_image'].'" alt="IMG">'; ?>
									</div>

									<div class="header-cart-item-txt">
										<?php echo '<a href="product-detail-get.php?id='.$arr[$i]['id'].'"class="header-cart-item-name">'; 
											echo $arr[$i]['productname']; ?>
										</a>

										<span class="header-cart-item-info">
											<?php echo $arr[$i]['quantity']." x Rs".$arr[$i]['price'] ?>
										</span>
									</div>
								</li>
							</ul>
						<?php } ?>

							<div class="header-cart-total">
								Total: <?php echo "Rs ".$total ?>
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>

								<!--<div class="header-cart-wrapbtn">
									
									<?php echo '<a href="checkout.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">';  ?>
										Check Out
									</a>
								</div>-->
							</div>
						</div>
					</div><?php } ?>
				</div>
			</div>
		</div>
	</header>
	<section class="banner bgwhite p-t-40 p-b-40">
		<div class="container">
			<div class="row">
				<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="images/specs.jpg" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="product.php?type=Spectacles" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								Frames
							</a>
						</div>
					</div>

					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="images/sun.jpg" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="product.php?type=Sunglasses" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								Sunglasses
							</a>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="images/103.jpg" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="product.php?type=Contact Lens" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								Contact Lens
							</a>
						</div>
					</div>

				<!--
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="images/contest.png" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							
							<a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								Contests
							</a>
						</div>
					</div>-->
				</div>

				<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="images/img(1).jpg" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="product.php?type=Accessories" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								Accessories
							</a>
						</div>
					</div>

					<!-- block2 -->
					<!--<div class="block2 wrap-pic-w pos-relative m-b-30">
						<img src="images/icons/bg-01.jpg" alt="IMG">

						<div class="block2-content sizefull ab-t-l flex-col-c-m">
							<h4 class="m-text4 t-center w-size3 p-b-8">
								Sign up & get 20% off
							</h4>-->

							<!--<p class="t-center w-size4" >
								Be the frist to know about the latest fashion news and get exclusive offers
							</p>-->

							<!--<div class="w-size2 p-t-25">
								<a href="Login.php" class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
									Sign Up
								</a>
							</div>-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- New Product -->
	<section class="newproduct bgwhite p-t-45 p-b-105">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Featured Products
				</h3>
			</div>

			<!-- Slide2 -->
			<?php 
					$result=mysqli_query($con,"select * from product_subtype;");
					$z=0;
					while($row=mysqli_fetch_assoc($result))
					{
						$arr[$z]['product_image']=$row['product_image'];
						$arr[$z]['price']=$row['Price'];
						$arr[$z]['product_name']=$row['product_name'];
						$arr[$z]['id']=$row['product_id'];
						$z++;
					}								
			?>									
			<div class="wrap-slick2">
				<div class="slick2">
					<?php for($z=0;$z<8;$z++) { ?>
					<div class="item-slick2 p-l-15 p-r-15">
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
								<?php echo '<img src="'.$arr[$z]['product_image'].'">' ;?>
								<div class="block2-overlay trans-0-4">
									<form action=""></form>
									<div class="block2-btn-addcart w-size1 trans-0-4">
										<?php 
											 echo '<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" value="'.$arr[$z]['id'].'" name="add">
												Add to Cart
											</button>';?>
									</div>
								</div>
							</div>
							<div class="block2-txt p-t-20">
								<?php
									$pname=$arr[$z]['product_name'];
									$a=mysqli_query($con,"select * from product_subtype where product_name='$pname';");
									$array=mysqli_fetch_assoc($a);  
									echo '<a href="product-detail-get.php?id='.$array['product_id'].'"'. 'class="block2-name dis-block s-text3 p-b-5">'; 
									 echo $arr[$z]['product_name']; 

								?>
								</a>
								<span class="block2-price m-text6 p-r-5">
									<?php echo "Rs ".$arr[$z]['price'];$z++; ?>
								</span>
							</div>
							</div>
						</div><?php }?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Shipping -->
	<!--<section class="shipping bgwhite p-t-62 p-b-46">
		<div class="flex-w p-l-15 p-r-15">
			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
				<h4 class="m-text12 t-center">
					Free Delivery Worldwide
				</h4>

				<a href="#" class="s-text11 t-center">
					Click here for more info
				</a>
			</div>

			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 bo2 respon2">
				<h4 class="m-text12 t-center">
					30 Days Return
				</h4>

				<span class="s-text11 t-center">
					Simply return it within 30 days for an exchange.
				</span>
			</div>

			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
				<h4 class="m-text12 t-center">
					Store Opening
				</h4>

				<span class="s-text11 t-center">
					Shop open from Monday to Sunday
				</span>
			</div>
		</div>
	</section>-->


	<!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
		<div class="flex-w p-b-90">
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					GET IN TOUCH
				</h4>

				<div>
					<p class="s-text7 w-size27">
						Any questions? Let us know at opticonnect12@gmail.com
					</p>
				</div>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Categories
				</h4>
				
				<ul>
					<li class="p-b-9">
						<a href="product.php?type=Spectacles" class="s-text7">
							Frames
						</a>
					</li>

					<li class="p-b-9">
						<a href="product.php?type=Contact Lens" class="s-text7">
							Contact Lens
						</a>
					</li>

					<li class="p-b-9">
						<a href="product.php?type=Sunglasses" class="s-text7">
							Sunglasses
						</a>
					</li>

					<li class="p-b-9">
						<a href="product.php?type=Accessories" class="s-text7">
							Accessories
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Links
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="about.php" class="s-text7">
							About Us
						</a>
					</li>
				</ul>
			</div>
		</div>
	</footer>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	</script>

<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
