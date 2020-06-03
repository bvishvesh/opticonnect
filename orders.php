<?php
/*
Author:VISHVESH BHAVSAR
ROLL NO:19BCE504
Class:4BCEA
*/?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Orders</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
	.divTable{
		display: table;
		width: 100%;
	}
	.divTableRow {
		display: table-row;
	}
	.divTableHeading {
		background-color: #EEE;
		display: table-header-group;
	}
	.divTableCell, .divTableHead {
		border: 1px solid #999999;
		display: table-cell;
		padding: 3px 10px;
	}
	.divTableHeading {
		background-color: #EEE;
		display: table-header-group;
		font-weight: bold;
	}
	.divTableFoot {
		background-color: #EEE;
		display: table-footer-group;
		font-weight: bold;
	}
	.divTableBody {
		display: table-row-group;
	}
	</style>
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
					Free shipping for standard order over Rs.1500
				</span>

				<div class="topbar-child2">
					<span class="topbar-email">
						opticonnect12@gmail.com
					</span>
				</div>
			</div>
			<div class="wrap_header">
				<!-- Logo -->
				<a href="seller_.php" class="logo">
				<img src="images/icons/icon.jpeg" alt="IMG-LOGO">
				</a>
			<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<li>
                                <a href="seller_upload.php">Upload Products</a>
                            </li>
                            <li>
								<a href="delivery.php">Delivery Details</a>
							</li>


								<a href="orders.php">Orders</a>

							<li>
								<a href="update_details.php">Update details</a>
							</li>
						</ul>
					</nav>
					<div class="header-icons">
						<label name="loggeduser">Hello <?php	
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
					</div>
				</div>
			</div>
		</div>
	</header>
	<?php
		$id=$_SESSION['id'];
		include 'config.php';
		$result=mysqli_query($con,"select * from transaction where sellerid=$id;");
		$rowcount=mysqli_num_rows($result);
		$z=0;
		while($row=mysqli_fetch_assoc($result))
		{
			$arr[$z]['product_id']=$row['productid'];
			$array=$arr[$z]['product_id'];
			$arre=$row['customerid'];
			$re=mysqli_query($con,"select product_name,product_image,price from product_subtype where product_id=$array;");
			$count=mysqli_fetch_assoc($re);
			$ret=mysqli_query($con,"select * from customer_master where customerid=$arre;");
			$ro=mysqli_fetch_assoc($ret);
			$arr[$z]['product_image']=$count['product_image'];
			$arr[$z]['price']=$row['price'];
			$arr[$z]['productname']=$row['productname'];
			$arr[$z]['quantity']=$row['quantity'];
			$arr[$z]['address']=$ro['address'];
			$arr[$z]['name']=$ro['name'];
			$arr[$z]['num']=$ro['phone'];
			$arr[$z]['lsph']=$row['lsph'];
			$arr[$z]['leadd']=$row['ladd'];
			$arr[$z]['leax']=$row['laxis'];
			$arr[$z]['lecyl']=$row['lcycle'];
			$arr[$z]['rsph']=$row['rsph'];
			$arr[$z]['raxis']=$row['raxis'];
			$arr[$z]['rcyl']=$row['rcycle'];
			$arr[$z]['radd']=$row['radd'];
			$arr[$z]['rsign']=$row['rsign'];
			$arr[$z]['lsign']=$row['lsign'];	
			$arr[$z]['set']=$row['isdelset'];
			$z++;
		}
	?>
	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="divTable">
				<div class="divTableBody">
					<div class="divTableRow">
						<div class="divTableHead"><strong>Image</strong></div>
						<div class="divTableHead"><strong>Product Name</strong></div>
						<div class="divTableHead"><strong>Quantity</strong></div>
						<div class="divTableHead"><strong>Name</strong></div>
						<div class="divTableHead"><strong>Lens Details</strong></div>
						<div class="divTableHead"><strong>Shipping Address</strong></div>
						<div class="divTableHead"><strong>Shipping Status</strong></div>
					</div>
					<?php for ($i=0; $i<$rowcount ; $i++)
						{
					?>
					<div class="divTableRow">
						<div class="divTableCell"><?php
						echo '<img src="'.$arr[$i]['product_image'].'"height=100 width=100>';?></div>
						<div class="divTableCell"><?php echo $arr[$i]['productname']; ?></div>
						<div class="divTableCell"><center><?php echo $arr[$i]['quantity']; ?></center></div>
						<div class="divTableCell"><?php echo $arr[$i]['name']; ?></div>
						<div class="divTableCell">
						<div class="divTable" style="width: 50%; border: 1px solid #000;">
							<div class="divTableBody">
								<div class="divTableRow">
									<div class="divTableCell">&nbsp;</div>
									<div class="divTableCell">Sign</div>
									<div class="divTableCell">SPH.</div>
									<div class="divTableCell">Axis</div>			
									<div class="divTableCell">Cyl.</div>
									<div class="divTableCell">ADD</div>
								</div>
								<div class="divTableRow">
									<div class="divTableCell">RE</div>
									<div class="divTableCell"><?php echo $arr[$i]['rsign'];?></div>
									<div class="divTableCell"><?php echo $arr[$i]['rsph'];?></div>
									<div class="divTableCell"><?php echo $arr[$i]['raxis'];?></div>
									<div class="divTableCell"><?php echo $arr[$i]['rcyl'];?></div>
									<div class="divTableCell"><?php echo $arr[$i]['radd'];?></div>
								</div>
								<div class="divTableRow">
									<div class="divTableCell">LE.</div>
									<div class="divTableCell"><?php echo $arr[$i]['lsign'];?></div>
									<div class="divTableCell"><?php echo $arr[$i]['lsph'];?></div>
									<div class="divTableCell"><?php echo $arr[$i]['leax'];?></div>
									<div class="divTableCell"><?php echo $arr[$i]['lecyl'];?></div>
									<div class="divTableCell"><?php echo $arr[$i]['leadd'];?></div>
								</div>
							</div>
						</div>
					</div>
					<div class="divTableCell"><?php echo $arr[$i]['address']; ?></div>
					<div class="divTableCell"><?php if($arr[$i]['set']==1)
														echo "shipped";
													else
														echo "Not Shipped" ?></div>
				</div><?php } ?><br><br><br><br><br>
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
	<script src="js/main.js"></script>
</body>
</html>