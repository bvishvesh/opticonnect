<?php
/*
Author:VISHVESH BHAVSAR
ROLL NO:19BCE504
Class:4BCEA
*/?>

<?php
session_start();
$type=isset($_GET['type'])?$_GET['type']:'';
$page=isset($_GET['page'])?$_GET['page']:'1';

$ar = array();
$remaining_rows=1;
if(isset($_SESSION['id']))
	$id=$_SESSION['id'];
	include 'cart_display_min.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Product</title>
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
	<link rel="stylesheet" type="text/css" href="vendor/noui/nouislider.min.css">
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
					<!--<a href="#" class="topbar-social-item fa fa-facebook"></a>
					<a href="#" class="topbar-social-item fa fa-google"></a>-->
					<a href="#" class="topbar-social-item fa fa-instagram"></a>
				</div>

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
								<a href="product.php">Shop</a>
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
					<label name="loggeduser" style="margin-top: 10px"><br><br>Hello, <?php	
					 if (isset($_SESSION['username']))
						echo "".$_SESSION['owner'];
					else
						echo"User";  ?> </label>
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
					 						<?php } ?> </Button>
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

		

	<!-- Content page -->
	<br><br><br><br><br><br>
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						<!--  -->
						<h4 class="m-text14 p-b-7">
							Categories
						</h4>

						<ul class="p-b-54">
							<li class="p-t-4">
								<a href="product.php" class="s-text13 active1">
									All
								</a>
							</li>

							<li class="p-t-4">
								<a href="product.php?type=Spectacles"  class="s-text13">
									Frames
								</a>
							</li>

							<li class="p-t-4">
								<a href="product.php?type=Contact Lens" class="s-text13">
									Contact Lens
								</a>
							</li>

							<li class="p-t-4">
								<a href="product.php?type=Sunglasses" class="s-text13">
									Sunglasses
								</a>
							</li>

							<li class="p-t-4">
								<a href="product.php?type=Accessories" class="s-text13">
									Accesories
								</a>
							</li>
						</ul>

						<div class="filter-price p-t-22 p-b-50 bo3">
						<!--  -->
						<h4 class="m-text14 p-b-32">
							Filters
						</h4>
							<form action="product.php" method="POST">
								<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
									<select class="selection-2" name="price_sorting">
										<option value="price">Price</option>
										<option value="0">Rs 0 - Rs 1000</option>
										<option value="1000">Rs 1001.00 - Rs2000</option>
										<option value="2000">Rs 2001.00 - Rs 3000</option>
										<option value="3000">Rs 3001.00 - Rs 4000</option>
										<option value="4000">Rs 4000+</option>
									</select>
								</div>
								<div class="flex-sb-m flex-w p-b-35">
									<div class="flex-w">
										<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
											<select class="selection-2" name="sorting">
												<option value="sort">Default Sorting</option>
												<option value="up">Price: low to high</option>
												<option value="down">Price: high to low</option>
											</select>
										</div>
									</div>
								</div>
								<button name="pricesubmit" class="btn btn-default" style="background-color:#D3D3D3">Filter</button>			</div>
							<div class="search-product pos-relative bo4 of-hidden">
								<input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search" placeholder="Search Products...">
									<button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4" class="searchsubmit">
										<i class="fs-12 fa fa-search" aria-hidden="true"></i>
									</button>
								</form>
							</div>
						</div>
					</div>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<?php 
		 			include 'product_sort.php';
		 			$z=0;
					if ($result==true) 
					{	
						for($i=0;$i<11;$i++)
						{
							
					 ?>
					 <form action="cart_add.php" method="POST">
					<div class="row">
						<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
									<?php echo '<img src="'.$arr[$z]['product_image'].'" height="200" width="200">' ;?>
								</div>
							</div>
						</div>

								<div class="block2-txt p-t-20">
									<?php 
									echo '<a href="product-detail-get.php?id='.$arr[$z]['id'].'"'. 'class="block2-name dis-block s-text3 p-b-5">';	
										 echo $arr[$z]['product_name']; ?>
									</a>

									<span class="block2-price m-text6 p-r-5">
										<?php echo "Rs ".$arr[$z]['price'];
										$z++;
										if($sum==$remaining_rows)
										{
											break;
										}
										$remaining_rows++;
										?>
									</span>
								</div>
					</div>
					<?php } } ?>
					<div style="margin-top: 250px">
						<?php 
							$z=ceil($rowcount/11);
							for ($i=1; $i <=$z ; $i++)
							{ 	
						?>
						<div class="pagination flex-m flex-w p-t-26">
						<?php	
								if(isset($_GET['type']))	
								{
									
									echo '<a href="product.php?page='.$i.'&type='.$type.'" class="item-pagination flex-c-m trans-0-4 active-pagination">'.$i.'</a>';
								}
								elseif (isset($_POST['sorting']) || isset($_POST['price_sorting'])) 
								{
									if ($_POST['sorting']=="sort" && $_POST['price_sorting']!="price")
									{
										echo '<a href="product.php?page='.$i.'&sort=true&price_sorting='.$sort.'" class="item-pagination flex-c-m trans-0-4 active-pagination">'.$i.'</a>';
									}
									elseif ($_POST['sorting']!="sort" && $_POST['price_sorting']=="price") 
									{
										echo '<a href="product.php?page='.$i.'&sort=true&sorting='.$price_sorter.'" class="item-pagination flex-c-m trans-0-4 active-pagination">'.$i.'</a>';
									}
									elseif($_POST['sorting']!="sort" && $_POST['price_sorting']!="price")
									{
										echo '<a href="product.php?page='.$i.'&sort=true&sorting='.$price_sorter.'&price_sorting='.$lowerlimit.'" class="item-pagination flex-c-m trans-0-4 active-pagination">'.$i.'</a>';
									}

								}
								elseif (isset($_GET['sorting']) || isset($_GET['price_sorting'])) 
								{
									if (isset($_GET['sorting']) && isset($_GET['price_sorting']))
									{
										echo "$lowerlimit";
										echo '<a href="product.php?page='.$i.'&sort=true&price_sorting='.$lowerlimit.'" class="item-pagination flex-c-m trans-0-4 active-pagination">'.$i.'</a>';
									}
									elseif (isset($_GET['sorting']) && !isset($_GET['price_sorting'])) 
									{
										echo '<a href="product.php?page='.$i.'&sort=true&sorting='.$price_sorter.'" class="item-pagination flex-c-m trans-0-4 active-pagination">'.$i.'</a>';
									}
									elseif(!isset($_GET['sorting']) && isset($_GET['price_sorting']))
									{
										echo '<a href="product.php?page='.$i.'&sort=true&sorting='.$price_sorter.'&price_sorting='.$lowerlimit.'" class="item-pagination flex-c-m trans-0-4 active-pagination">'.$i.'</a>';
									}

								}
								else
								{
									echo '<a href="product.php?page='.$i.'" class="item-pagination flex-c-m trans-0-4 active-pagination">'.$i.'</a>';
								}
						?>
						</div> <?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>


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
	<script type="text/javascript" src="vendor/daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="vendor/daterangepicker/daterangepicker.js"></script>
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
	</script>

<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/noui/nouislider.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
