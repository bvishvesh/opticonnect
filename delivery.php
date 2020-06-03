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
				<a href="seller_upload.php" class="logo">
				<img src="images/icons/icon.jpeg" alt="IMG-LOGO">
				</a>
			<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
                            <li>
                                <a href="seller_upload.php">Upload Products</a>
                            </li>

                            <a href="delivery.php">Delivery Details</a>
                            <li>
								<a href="orders.php">Orders</a>
							</li>
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
        include "config.php";
		$result=mysqli_query($con,"select * from transaction where sellerid=$id AND isdelset=0;");
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
			$arr[$z]['tid']=$row['transaction_id'];
			$arr[$z]['set']=$row['isdelset'];
			$z++;
		}
		if ($rowcount!=0)
		{
	?>
<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
		<table border="1" align="center">
			<tr>
				<th style="border-style:solid;font-size: 20px"><center><b>Image</b></center></th>
				<th style="border-style:solid;font-size: 20px"><center><b>Product Name</b></center></th>
				<th style="border-style:solid;font-size: 20px"><center><b>Quantity</b></center></th>
				<th style="border-style:solid;font-size: 20px"><center><b>Name</b></center></th>
				<th style="border-style:solid;font-size: 20px"><center><b>Shipping Address</b></center></th>
				<th style="border-style:solid;font-size: 20px"colspan="3"><center><b>Delivery Details</b></center></th>
			</tr>
			<?php for ($i=0; $i <$rowcount ; $i++)
					{
						if($arr[$i]['set']==0){
			?>			
			<tr>
				<td style="border-style:solid">
					<?php
						echo '<img src="'.$arr[$i]['product_image'].'"height=100 width=100>';	
					?>					 
				</td>
				<td style="border-style:solid;font-size: 15px;width:250px">
					<center><?php echo $arr[$i]['productname']; ?></center>
				</td>
				<td style="border-style:solid;font-size: 15px">
					<center><?php echo $arr[$i]['quantity']; ?></center>
				</td>	
				<td style="border-style:solid;font-size: 15px;width:200px">
					<center><?php echo $arr[$i]['name']; ?></center>
				</td>
				<td style="border-style:solid;font-size: 15px;width:170px">
					<center><?php echo $arr[$i]['address']; ?></center>
				</td><?php echo '<form action="delivery_details.php?id='.$arre.'&tid='.$arr[$i]['tid'].'&sid='.$id.'" method="POST">' ?>
				<td style="border-style:solid;font-size: 15px;width:170px">
					<center><input type="text" name="consignment"style="opacity: 0.6;background-color:#D3D3D3;width:150px" placeholder="Consignment Number"></center>
				</td>
				<td style="border-style:solid;font-size: 15px;width:170px">
					<center><input type="text" name="dc" placeholder="Delivery Company" style="opacity: 0.6;background-color:#D3D3D3" class="login-form"></center>
				</td>
				<td style="border-style:solid;font-size: 15px;width:75px">
					<center><input type="submit" name="sbmit" placeholder="Enter"></center>
				</td></form>
			</tr>
			<?php }}}else
					{ ?><div class="container">
							<div class="jumbotron"><br>
								<center><p><h1>Oops!!</h1></p>
									<p><h3>You have no orders to be delivered.</h3></p></center>
							</div>
					</div><?php } ?>
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