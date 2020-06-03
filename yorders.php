<?php
/*
Author:VISHVESH BHAVSAR
ROLL NO:19BCE504
Class:4BCEA
*/?>

<?php session_start();
$id=$_SESSION['id'];
include "config.php";
	$result=mysqli_query($con,"select * from cart where customerid=$id;");
	$rowcount=mysqli_num_rows($result);
	$z=0;
	$price=0;
include 'cart_display_min.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Orders</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
	  <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main1.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
<!--===============================================================================================-->
<style>
.button {
  border-radius: 4px;
  background-color: #ffffff;
  border: solid;border-width:2px;
  color: #000000;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 350px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
</style>
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

				<div class="topbar-child2">
					<span class="topbar-email">
					opticonnect12@gmail.com
					</span>
				</div>
			</div>
			<div class="wrap_header">
				<!-- Logo -->
				<a href="index.php" class="logo">
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
							
								<a href="yorders.php">Your Orders</a>
													
						</ul>
					</nav>
					<div class="header-icons">
						<label name="loggeduser"><br><br>Hello,<?php	
							if (isset($_SESSION['username']))
								echo "".$_SESSION['owner'];
							else
								echo "User"; ?>
					 	</label>
						<span class="linedivide1"></span>
						<a href="Login.php" class="header-wrapicon1 dis-block">
							<img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
						</a>
						<span class="linedivide1"></span>
						<ul class="menu">
							<li>
								<form action="logout.php" method="POST">
									<Button type="submit" name="logout" class="btn btn-default">Logout</Button>
								</form>
							</li>
						</ul>
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
								Total: <?php echo "Rs ".$price ?>
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
									<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
									</a>
								</div>
							</div>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<?php
		$id=$_SESSION['id'];
		$con=mysqli_connect("localhost","root","");
		if (mysqli_connect_error())
			die("connection failed ".mysqli_connect_error());
		else 
			mysqli_select_db($con,'opticonnect');
		$result=mysqli_query($con,"select * from transaction_identifier where customerid=$id ORDER BY transactionid DESC;");
		$z=0;?>

<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
		<table>
		<?php
		while($row=mysqli_fetch_assoc($result))
		{
			$tid=$row['transactionid'];
			$res=mysqli_query($con,"select * from transaction where transaction_id=$tid;");
			$ro=mysqli_fetch_assoc($res);
			$arr[$z]['tid']=$row['transactionid'];
			$arr[$z]['order_date']=$ro['order_date'];
		?>
			<tr>
				<td>
					<button type="button" class="button" style="text-align: left"><span>
						<?php echo '<a href="yorder.php?val='.$tid.'">'; ?> <h3><b>Transaction Id:</b>&nbsp<?php echo "#". $arr[$z]['tid']; ?></h3>
					<h4><b>Order Date:</b>&nbsp<?php echo $arr[$z]['order_date'];?></h4></span></a>
				</button><br><br>
				</td>
			</tr>
		<?php $z++;
				} ?>
		</table>
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

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>
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
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
</body>
</html>