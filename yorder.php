
<?php
/*
Author:VISHVESH BHAVSAR
ROLL NO:19BCE504
Class:4BCEA
*/?>
<?php session_start(); $tid=$_GET['val'];
$id=$_SESSION['id'];
if(isset($_SESSION['id']))
{
	include 'cart_display_min.php';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Order View</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
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
		include 'config.php';
		$p=0;
		$z=0;
		$add=mysqli_query($con,"select * from customer_master where customerid=$id;");
		$r=Mysqli_num_rows($add);
		$result=mysqli_query($con,"select * from transaction where transaction_id=$tid;");
		$rowcount=Mysqli_num_rows($result);
		while($row=mysqli_fetch_assoc($result))
		{
			$pid=$row['productid'];
			$retur=mysqli_query($con,"select * from product_subtype where product_id=$pid;");
			$counter=mysqli_fetch_assoc($retur);
			$arre=$row['sellerid'];
			$ret=mysqli_query($con,"select * from seller_master where sellerid=$arre;");
			$ro=mysqli_fetch_assoc($ret);
			$arr[$z]['product_image']=$counter['product_image'];
			$arr[$z]['price']=$row['price'];
			$arr[$z]['productname']=$row['productname'];
			$arr[$z]['quantity']=$row['quantity'];
			$arr[$z]['seller_name']=$ro['seller_name'];
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
			$p+=$row['price'];
			$z++;
		}
		$pr=$p;
	?>
	<br><br><br><br><br><br><br>
	
<div class="container bgwhite p-t-35 p-b-80">
	<form action="printpdf.php" method="post">
        <?php echo'<input type="hidden" value="'.$id.'" name="customerid">';
        echo '<input type="hidden" value="'.$tid.'" name="transactionid">';?>
        <button>Print Invoice</button>
    </form>
		<div class="flex-w flex-sb">
			<div class="divTable" style="border: 1px solid #000;">
				<div class="divTableBody">
					<div class="divTableRow">
						<div class="divTableCell"><b>Image</b></div>
						<div class="divTableCell"><b>Product Name</b></div>
						<div class="divTableCell"><b>Quantity</b></div>
						<div class="divTableCell"><b>Seller Name</b></div>
						<div class="divTableCell"><b>Price</b></div>
						<div class="divTableCell"><center><b>Lens</b></center></div>
					</div>
					<?php for ($i=0; $i <$rowcount ; $i++)
						{
					?>
					<div class="divTableRow">
						<div class="divTableCell"><?php
						echo '<img src="'.$arr[$i]['product_image'].'"height=100 width=100>';	
					?></div>
						<div class="divTableCell"><?php echo $arr[$i]['productname']; ?></div>
						<div class="divTableCell"><?php echo $arr[$i]['quantity']; ?></div>
						<div class="divTableCell"><?php echo $arr[$i]['seller_name']; ?></div>
						<div class="divTableCell"><?php echo $arr[$i]['price']; ?></div>
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
					</div> <?php } ?>
				</div>
			</div>
		</div>
	<?php
		$res=mysqli_query($con,"select * from transaction where transaction_id=$tid;");
		$ro=mysqli_fetch_assoc($res);
		$order_date=$ro['order_date'];
	?>
		<div style="border-style: solid;width: 400px;border-width: 1px;border-color:#d3d3d3;margin-top:30px;margin-right:700px;padding-left: 10px">
				<h5 class="m-text20 p-b-24">
					Order Details:-
				</h5>

				<!--  -->
				<div class="flex-w flex-sb-m p-b-12">
					<div class="flex-w flex-sb bo10 p-t-15 p-b-20">
						<span class="s-text18 w-size26 w-full-sm">
							Order Date:
						</span>
						<div class="w-size50 w-full-sm">
							<p class="s-text8 p-b-23">
								&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $order_date; ?>
							</p>
						</div>
					</div>
					<div class="flex-w flex-sb-m p-t-26 p-b-30">
						<span class="m-text22 w-size25 w-full-sm">
							Total Items:
						</span>

						<span class="m-text21 w-size25 w-full-sm">
							<?php 
								echo $z; 
							?>
						</span>
					</div>				
					<div class="flex-w flex-sb bo10 p-t-15 p-b-10">
						<span class="s-text18 w-size26 w-full-sm">
							Order ID:
						</span>
						<div class="w-size50 w-full-sm">
							<p class="s-text8 p-b-26">
								&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo "#000000000".$tid; ?>
							</p>
						</div>
					</div>
				</div>
		</div>
		<div style="border-style: solid;width: 400px;border-width: 1px;border-color:#d3d3d3;margin-top: -350px;margin-left: 500px;padding-left: 10px" >
				<h5 class="m-text20 p-b-24">
					Price Break-up:
				</h5>

				<!--  -->
				<div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						items:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						
						<?php 
							echo "Rs ".$p; ?>
					</span>
					<span class="s-text18 w-size19 w-full-sm">
						Tax (5%):
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						
						<?php 
						$sum=($p*5)/100;
						echo "Rs ".$sum; ?>
					</span>
					<span class="s-text18 w-size19 w-full-sm">
						Shipping Charges:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						Rs. 300
					</span>
				</div>

				<!--  -->
				<div class="flex-w flex-sb bo10 p-t-15 p-b-20">
					<span class="s-text18 w-size19 w-full-sm">
						Shipping Address:
					</span>

					<div class="w-size50 w-full-sm">
						<p class="s-text8 p-b-23">
							<? echo $r['address']; ?>
						</p>
					</div>
				</div>

				<!--  -->
				<div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Total:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						<?php 
						$sum=$sum+$p+300;
						echo "Rs ".$sum; ?>
					</span>
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

    <script>
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