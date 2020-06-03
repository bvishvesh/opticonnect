<?php
/*
Author:VISHVESH BHAVSAR
ROLL NO:19BCE504
Class:4BCEA
*/?>
<?php session_start(); 
if(isset($_SESSION['id']))
	header("location:index.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
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
	<script language="Javascript">
		var check=function()
		{
			if (document.getElementById('p').value==document.getElementById('c').value)
			{
				document.getElementById('button').disabled=false;
				document.getElementById('m').style.display="none";
				document.getElementById('me').style.display="inline";
			}
			else
			{
				document.getElementById('button').disabled=true;
				document.getElementById('me').style.display="none";
				document.getElementById('m').style.display="inline";
			}
		}
		function valid()
		{
			document.getElementById('alert').style.display="none";
		}
	</script>
<!--===============================================================================================-->
</head>
<body class="animsition" style="background-color:#d9d9d9">

	<!-- Header -->
	<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">
			<div class="topbar">
				<div class="topbar-social">
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
					<img src="images/icons/icon.jpeg" alt="IMG-LOGO" height="40" width="40">
				</a>
			</div>
		</div>
	</header>
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="connect_login.php" method="Post" >
							<input type="text" placeholder="Username" name="name" onkeyup="valid()" required/>
							<input type="password" placeholder="Password" name="passkey" required/>
							<table>
								<tr>
									<td>
										<span>
											<input type="Radio" name="utype" value="customer" required>Customer
										</span>
									</td>
									<td>
										<span>	
											<input type="Radio" name="utype" value="seller" required>Seller
										</span>
									</td>
								</tr>
								<tr>
									<td>
										<span>
											<input type="checkbox" class="checkbox"> 
												Keep me signed in
										</span>
                                    </td>
                                    <td style="float: right">
                                        <span style="padding-left:85px ">
                                            <a href="forgotpassword.php">Forgot Password?</a>
                                        </span>
									</td>
								</tr>
							</table>
							<?php 
								if (isset($_GET['code']))
								{
									if ($_GET['code']==1)
									{
										echo '<span class="alert alert-danger" id="alert" display="inline"> Please check the Username and Password!! </span>';
									}
									else if($_GET['code']==0)
									{	
										echo '<span class="alert alert-danger" id="alert" display="inline"> Wrong user type selected!!</span>';
									}
									else
									{
										echo '<span class="alert alert-danger" id="alert" display="inline">Account Deactivated!!</span>';
									}
								}
							?>
							<button type="submit" class="btn btn-default" name="sbmit" style="opacity: 0.8;background-color:#85adad; border:solid 3px;text-decoration: : #b3ff1a">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="connect_reg.php" method="post">
							<input type="text" placeholder="Name"  name="name" required />
							<input type="text" placeholder="Username" name="uname" required/><?php if (isset($_GET['code']))
								{
									if ($_GET['code']==4)
									{
										echo '<span class="alert alert-danger" id="alert" display="inline">Username Already Exits!! </span>';
									}
								} ?>
							<input type="email" placeholder="Email Address" name="mail" required/><?php if (isset($_GET['code']))
								{
									if ($_GET['code']==5)
									{
										echo '<span class="alert alert-danger" id="alert" display="inline">Username Already Exits!! </span>';
									}
								} ?>
							<input type="tel" name="phone" placeholder="Phone Number" pattern="[0-9]{10}" required>
							<textarea name="address" style="height: 100px" placeholder="Address"></textarea><br><br>
							<input type="password" placeholder="Password" name="pass" id="p" onkeyup="check();"/>
							<input type="password" name="confirm" placeholder="Confirm Password" id="c" onkeyup="check();"><span id='m' style="color:red; display: none">Passwords do not match!!</span><span id='me' style="color:green ; display: none">Password match!!</span>
							<button type="submit" class="btn btn-default" id="button" style="opacity: 0.8;background-color:#85adad; border:solid 3px;text-decoration: : #b3ff1a">Signup</button>
							<a href="seller_reg.php" style="float:right"><b>Want to sell with Us?</b></a>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
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

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>



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