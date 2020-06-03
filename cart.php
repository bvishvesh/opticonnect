<?php
/*
Author:VISHVESH BHAVSAR
ROLL NO:19BCE504
Class:4BCEA
*/?>
<?php
session_start();
if(isset($_SESSION['username']))
{
	$id=$_SESSION['id'];
	include 'cartdisplay.php';
}
else
{
	header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cart</title>
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
	border: 1px solid #eee;
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
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
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
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
   
	<link href="css/responsive.css" rel="stylesheet">
	<script type="text/javascript">
		function submit()
		{
			document.getElementById("form").submit();
		}
	</script>
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
					<a href="#" class="topbar-social-item fa fa-instagram"></a>
					<a href="#" class="topbar-social-item fa fa-google"></a>-->
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

							<li>
								<a href="product.php">Shop</a>
							</li>

							<li>
								<a href="cart.php">Cart</a>
							</li>

							<li>
								<a href="about.php">About</a>
							</li>
							<li>
								<a href="yorders.php">Your Orders</a>
							</li>
						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">
					<label name="loggeduser" style="margin-top: 9px"><br><br>Hello, <?php	
					 if (isset($_SESSION['username']))
					 	 echo "".$_SESSION['owner'];
					 else
					 	echo "User";
					  ?> </label>
						<span class="linedivide1"></span>
					<a href="#" class="header-wrapicon1 dis-block">
						<img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
					</a>

					<span class="linedivide1"></span>
						<ul class="menu">
							<li>
								<form action="logout.php" method="POST">
									<Button type="submit" name="logout" class="btn btn-default" style="margin-top:10px"><?php	
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
								Total: <?php echo "Rs ".$total?>
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
									<?php echo '<a href="checkout.php?amt="'.$total.' class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">' ?>
										Check Out
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		
	<!-- Title Page -->
	<br><br><br><br><br><br><br><br>
<?php 
if ($rowcount!=0)
{
?>	
	<table style="float: right;margin-right: 50px;margin-top: 70px">
						<?php 
								for ($i=0; $i < $rowcount; $i++)
								{ 
						?>
						<tr>
							<td>
								<?php	echo '<center><a href="cart_delete1.php?val='.$arr[$i]['id'].'"><i class="fa fa-minus" style="margin-top:127px"></i></a>'; ?>
							</td>
						</tr> 
					<?php } ?>
					</table>
	<!-- Cart -->
<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<div class="divTable">
						<div class="divTableBody">
							<div class="divTableRow">
								<div class="divTableHead"><center>Image</center></div>
								<div class="divTableHead"><center>Product Details</center></div>
								<div class="divTableHead"><center>Seller</center></div>
								<div class="divTableHead"><center>Quantity</center></div>
								<div class="divTableHead" style="width:200px"><center>Lens</center></div>
								<div class="divTableHead"><center>Total</center></div>
								<div class="divTableHead"></div>
							</div>
					<?php 
						for($i=0;$i<$rowcount;$i++) 
						{
					?>
							<div class="divTableRow">
								<div class="divTableCell"><?php echo '<center><img src="'.$arr[$i]['product_image'].'"width=75 height=75></center>';?></div>
								<div class="divTableCell"><center><?php echo $arr[$i]['productname']; ?></center></div>
								<div class="divTableCell"><center><?php echo $seller[$i]['seller']; ?><center></div>
								<div class="divTableCell"><center><?php echo $arr[$i]['quantity']; ?></center></div>
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
								<div class="divTableCell"><center><?php echo $arr[$i]['price']; ?></center></div>
								<?php echo '<div class="divTableCell"><center><button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4"><a href="cart_delete1.php?val='.$arr[$i]['id'].'">Delete</a></button></center></div>'; ?>
							</div><?php } ?>
						</div>
					</div>
				</div>
			</div>

			<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm" >
				<div class="flex-w flex-m w-full-sm">
					<div class="size11 bo4 m-r-10">
						<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="coupon-code" placeholder="Coupon Code">
					</div>

					<div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
						<!-- Button -->
						<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
							Apply coupon
						</button>
					</div>
				</div>

				<div class="size10 trans-0-4 m-t-10 m-b-10">
					<!-- Button -->
					<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						Update Cart
					</button>
				</div>
			</div>


			<!-- Total -->
			<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
				<h5 class="m-text20 p-b-24">
					Cart Totals
				</h5>

				<!--  -->
				<div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Subtotal:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						
						<?php 
						$sum=0;
						if ($rowcount==0)
						{
							$sum=0;
						}
						else
						{
							for ($i=0; $i <$rowcount ; $i++)
							{ 
								$sum+=$arr[$i]['price'];
							}
						}
						
						echo "Rs ".$sum; ?>
					</span>
				</div>
				<div class="flex-w flex-sb bo10 p-t-15 p-b-20">
					<span class="s-text18 w-size19 w-full-sm">
						Shipping Address:<br><br><br><br>					
						Total:
					</span>

					<div class="w-size50 w-full-sm">
						<form action="add_new_address.php" method="POST"><p class="s-text8 p-b-23">
							<textarea name="add" required ></textarea><br><br><button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0- lu4">Add new address</button></form>
						</p>
						<span class="s-text18 w-size19 w-full-sm">
							Subtotal=Rs. <?php echo $sum; ?>
							<br>+Tax=Rs. <?php echo ($sum*5)/100; ?>
							<br>+Shipping=Rs. 300
						</span>
					</div>
				</div>

				<!--  -->
				<div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Total:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						<?php 
						if ($rowcount==0)
						{
							$sum=0;
						}
						else
						{
							$GST=($sum*5)/100;
							$sum=$sum+$GST+300;
						}
						echo "Rs ".$sum;						
						 ?>
					</span>
				</div>

				<div class="size15 trans-0-4">
					<!-- Button -->
                    <form action="checkout.php" method="POST">
                            <?php echo '<input type="hidden" name="price" value="'.$sum.'"/>'; ?>
                        <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" style="height: 30px" onclick="press()" id=""submitt">Proceed to Checkout</button></form>
				</div>
			</div>
		</div>
	</section>
<?php }
else
{ ?><div class="container">
		<div class="jumbotron">
				<center><p><h1>Oops!!</h1></p>
				<p><h3>Empty Shopping Cart.</h3></p></center>
		</div>
	</div>
	<center><a href="product.php"><button type="submit" class="flex-c-m sizehalf bg1 bo-rad-23 hov1 s-text1 trans-0-4" style="width:200px"><h4>Start Shopping</h4></button></a></center>
<?php } ?>
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
        <script type="text/javascript">

        </script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
