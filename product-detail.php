<?php
/*
Author:VISHVESH BHAVSAR
ROLL NO:19BCE504
Class:4BCEA
*/?>
<?php session_start();
$type=isset($_GET['type'])?$_GET['type']:'s';
$no=isset($_GET['no'])?$_GET['no']:'';;
$ar = array();
if (isset($_SESSION['id']))
	$id=$_SESSION['id'];
	include 'cart_display_min.php';
if (!isset($_SESSION['pid']))
{
	header("location:product.php");
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Product Detail</title>
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
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
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
<body class="animsition">

	<!-- Header -->
	<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">
			<div class="topbar">
				<div class="topbar-social">
					<a href="#" class="topbar-social-item fa fa-facebook"></a>
					<a href="#" class="topbar-social-item fa fa-instagram"></a>
					<a href="#" class="topbar-social-item fa fa-google"></a>
				</div>

				<span class="topbar-child1">
					Free shipping for standard order over Rs. 1500
				</span>

				<div class="topbar-child2">
					<span class="topbar-email">
						opticonnect12@gmail.com
					</span>
				</div>
			</div>

			<div class="wrap_header">
				<!-- Logo -->
				<a href="index.html" class="logo">
					<img src="images/icons/icon.jpeg" alt="IMG-LOGO">
				</a>

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<li>
								<a href="index.php">Home</a>
							</li>

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
					<label name="loggeduser" style="margin-top: 10px">Hello <?php	
					 if (isset($_SESSION['username']))
						echo "".$_SESSION['owner'];
					else
						echo"User"  ?>
					 </label>
						<span class="linedivide1"></span>
					<a href="#" class="header-wrapicon1 dis-block">
						<img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
					</a>

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

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<?php echo '<a href="checkout.php?amt='.$total.'" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">';  ?>
										Check Out
									</a>
								</div>
							</div>
						</div>
					</div><?php } ?>
				</div>
			</div>
		</div>
    </header>

<br><br><br><br>
	<!-- Product Detail -->
	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">

						<div class="item-slick3" data-thumb="images/thumb-item-01.jpg">
							<div class="wrap-pic-w">
								<?php echo '<img src="'.$_SESSION['image'].'" alt="IMG-PRODUCT">'; ?>
							</div>
						</div>
				</div>
			</div>

			<div class="w-size14 p-t-30 respon5">
				<h4 class="product-detail-name m-text16 p-b-13">
					<?php echo $_SESSION['name']; ?>
				</h4>

				<span class="m-text17">
					<?php echo "Rs ".$_SESSION['price']; ?>
				</span>

				<p class="s-text8 p-t-10">
					<?php echo $_SESSION['description']?>
				</p> 

				<!--  -->
				<div class="p-t-33 p-b-60">

					<div class="flex-m flex-w">
						<div class="s-text15 w-size15 t-center">
							Lens number
						</div>
						<?php 
						if($type=="Accessories")
						{ echo '
						<div class="rs2-select2 rs3-select2 bo50 of-hidden w-size16 style="visibility:hidden";">
							<form action="lens_add.php" method="POST" id="form1">
								<table style="border: 2px solid black" >
									<tr style="border: 2px solid black ">
										<td style="border: 2px solid black">
										</td>
										<td style="border: 2px solid black ">
											Sign
										</td>
										<td style="border: 2px solid black ">
											SPH.
										</td>
										<td style="border: 2px solid black ">
											CYL.
										</td>
										<td style="border: 2px solid black ">
											AXIS
										</td>
										<td style="border: 2px solid black ">
											ADD
										</td style="border: 2px solid black ">
									</tr>
									<tr style="border: 2px solid black">
										<td style="border: 2px solid black ">
											RE (0D)
										</td>
										<td style="border: 2px solid black ">
											<select name="rsign">
												<option value="0">0</option>
												<option value="+">+</option>
												<option value="-">-</option>
											</select>
										</td>
										<td style="border: 2px solid black ">
											<input type="num" name="resph" style="width:60px;">
										</td>
										<td style="border: 2px solid black ">
											<input type="num" name="recyl" style="width:60px">
										</td>
										<td style="border: 2px solid black ">
											<input type="num" name="reax" style="width:60px">
										</td>
										<td style="border: 2px solid black ">
											<input type="num" name="readd" style="width:60px">
										</td>
									</tr>
									<tr style="border: 2px solid black ">
										<td style="border: 2px solid black ">
											LE (0S)
										</td>
										<td style="border: 2px solid black ">
											<select name="lsign">
												<option value="0">0</option>
												<option value="+">+</option>
												<option value="-">-</option>
											</select>
										</td>
										<td style="border: 2px solid black ">
											<input type="num" name="lesph" style="width:60px">
										</td>
										<td style="border: 2px solid black ">
											<input type="num" name="lecyl" style="width:60px">
										</td>
										<td style="border: 2px solid black ">
											<input type="num" name="leax" style="width:60px">
										</td>
										<td style="border: 2px solid black">
											<input type="num" name="leadd" style="width:60px">
										</td>
									</tr>
								</table>';
							}
								else
									{
										echo '
										<div class="rs2-select2 rs3-select2 bo50 of-hidden w-size16 style=visibility:visible;">
							<form action="lens_add.php" method="POST" id="form1">
								<table style="border: 2px solid black" >
									<tr style="border: 2px solid black ">
										<td style="border: 2px solid black">
										</td>
										<td style="border: 2px solid black ">
											Sign
										</td>
										<td style="border: 2px solid black ">
											SPH.
										</td>
										<td style="border: 2px solid black ">
											CYL.
										</td>
										<td style="border: 2px solid black ">
											AXIS
										</td>
										<td style="border: 2px solid black ">
											ADD
										</td style="border: 2px solid black ">
									</tr>
									<tr style="border: 2px solid black">
										<td style="border: 2px solid black ">
											RE (0D)
										</td>
										<td style="border: 2px solid black ">
											<select name="rsign">
												<option value="0">0</option>
												<option value="+">+</option>
												<option value="-">-</option>
											</select>
										</td>
										<td style="border: 2px solid black ">
											<input type="num" name="resph" style="width:60px;">
										</td>
										<td style="border: 2px solid black ">
											<input type="num" name="recyl" style="width:60px">
										</td>
										<td style="border: 2px solid black ">
											<input type="num" name="reax" style="width:60px">
										</td>
										<td style="border: 2px solid black ">
											<input type="num" name="readd" style="width:60px">
										</td>
									</tr>
									<tr style="border: 2px solid black ">
										<td style="border: 2px solid black ">
											LE (0S)
										</td>
										<td style="border: 2px solid black ">
											<select name="lsign">
												<option value="0">0</option>
												<option value="+">+</option>
												<option value="-">-</option>
											</select>
										</td>
										<td style="border: 2px solid black ">
											<input type="num" name="lesph" style="width:60px">
										</td>
										<td style="border: 2px solid black ">
											<input type="num" name="lecyl" style="width:60px">
										</td>
										<td style="border: 2px solid black ">
											<input type="num" name="leax" style="width:60px">
										</td>
										<td style="border: 2px solid black">
											<input type="num" name="leadd" style="width:60px">
										</td>
									</tr>
								</table>';	

									}?>	
								</div>
							</div>
					

					<div class="flex-r-m flex-w p-t-10">
						<div class="w-size16 flex-m flex-w">
							<div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
								</div>
									<div class="signup-form">
										<h2>Quantity
										<input type="number" min="1" max="10" value="1" style="opacity: 0.8;background-color:#D3D3D3" name="quantity">
									</h2>
									</div>
									<?php if(isset($_SESSION['id']))
									{
									?>
									<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
										<?php echo '<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" value="'.$_SESSION['pid'].'" name="submit" style="margin-top:60px;margin-left:-100px" id="addtocart" onload="checker();">
												Add to Cart
										</button>';?>
									</div>
								<?php } else{ ?>
									<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
										<button  class="flex-c-m size1 bg4 bo-rad-23"style="margin-top:60px;margin-left:-100px;"  disabled > Add to Cart</button>
									</div>
								<?php } ?>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	

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

					<div class="flex-m p-t-30">
						<a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-google"></a>
					</div>
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

	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>



<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});

		$('.btn-addcart-product-detail').each(function(){
			var nameProduct = $('.product-detail-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>

<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
