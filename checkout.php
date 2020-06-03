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
}
else
{
	header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Checkout</title>
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
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
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
	<link rel="stylesheet" type="text/css" href="fonts/PaymentFont-1.2.5/css/paymentfont.min.css">
	<script language="Javascript">
		function creditcard(argument)
		{
			document.getElementById('ch').style.display="block";
			document.getElementById('cnum').style.display="block";
			document.getElementById('mon').style.display="block";
			document.getElementById('y').style.display="block";
			document.getElementById('cvv').style.display="block";
			document.getElementById('1').style.display="block";
			document.getElementById('vpa').style.display="none";
			document.getElementById('infomartion').style.display="none";
			document.getElementById('dch').style.display="none";
			document.getElementById('dcnum').style.display="none";
			document.getElementById('dcvv').style.display="none";
			document.getElementById('dmon').style.display="none";
			document.getElementById('dy').style.display="none";
			document.getElementById('2').style.display="none";
			document.getElementById('dropdown').style.display="none";
			document.getElementById('0').style.display="none";
			document.getElementById('cvv').style.backgroundColor="#D3D3D3";
			document.getElementById('cnum').style.backgroundColor="#D3D3D3";
			document.getElementById('ch').style.backgroundColor="#D3D3D3";
			document.getElementById('mon').style.backgroundColor="#D3D3D3";
			document.getElementById('y').style.backgroundColor="#D3D3D3";
			document.getElementById('vpa').style.display="none";
			document.getElementById('infomartion').style.display="none";
		}
		function debitcard(argument)
		{
			document.getElementById('vpa').style.display="none";
			document.getElementById('infomartion').style.display="none";
			document.getElementById('ch').style.display="none";
			document.getElementById('cnum').style.display="none";
			document.getElementById('y').style.display="none";
			document.getElementById('mon').style.display="none";
			document.getElementById('cvv').style.display="none";
			document.getElementById('1').style.display="none";
			document.getElementById('0').style.display="block"; 
			document.getElementById('dropdown').style.display="block";
		}
		function cardselect()
		{
			document.getElementById('vpa').style.display="none";
			document.getElementById('infomartion').style.display="none";
			document.getElementById('ch').style.display="none";
			document.getElementById('cnum').style.display="none";
			document.getElementById('mon').style.display="none";
			document.getElementById('y').style.display="none";
			document.getElementById('cvv').style.display="none";
			document.getElementById('1').style.display="none";
			document.getElementById('2').style.display="block";
			document.getElementById('dch').style.display="block";
			document.getElementById('dcnum').style.display="block";
			document.getElementById('dmon').style.display="block";
			document.getElementById('dy').style.display="inline";
			document.getElementById('dcvv').style.display="block";
			document.getElementById('dropdown').style.display="block";
			document.getElementById('dcvv').style.backgroundColor="#D3D3D3";
			document.getElementById('dcnum').style.backgroundColor="#D3D3D3";
			document.getElementById('dch').style.backgroundColor="#D3D3D3";
			document.getElementById('dmon').style.backgroundColor="#D3D3D3";
			document.getElementById('dy').style.backgroundColor="#D3D3D3";
		}
		function bhimupi()
		{
			document.getElementById('dch').style.display="none";
			document.getElementById('dcnum').style.display="none";
			document.getElementById('dcvv').style.display="none";
			document.getElementById('dmon').style.display="none";
			document.getElementById('dy').style.display="none";
			document.getElementById('2').style.display="none";
			document.getElementById('dropdown').style.display="none";
			document.getElementById('0').style.display="none";
			document.getElementById('ch').style.display="none";
			document.getElementById('cnum').style.display="none";
			document.getElementById('y').style.display="none";
			document.getElementById('mon').style.display="none";
			document.getElementById('cvv').style.display="none";
			document.getElementById('1').style.display="none";
			document.getElementById('0').style.display="none"; 
			document.getElementById('dropdown').style.display="none";
			document.getElementById('vpa').style.display="block";
			document.getElementById('infomartion').style.display="block";
		}
		function POD()
		{
			document.getElementById('dch').style.display="none";
			document.getElementById('dcnum').style.display="none";
			document.getElementById('dcvv').style.display="none";
			document.getElementById('dmon').style.display="none";
			document.getElementById('dy').style.display="none";
			document.getElementById('2').style.display="none";
			document.getElementById('dropdown').style.display="none";
			document.getElementById('0').style.display="none";
			document.getElementById('ch').style.display="none";
			document.getElementById('cnum').style.display="none";
			document.getElementById('y').style.display="none";
			document.getElementById('mon').style.display="none";
			document.getElementById('cvv').style.display="none";
			document.getElementById('1').style.display="none";
			document.getElementById('0').style.display="none"; 
			document.getElementById('dropdown').style.display="none";
			document.getElementById('vpa').style.display="none";
			document.getElementById('infomartion').style.display="none";
		}
		function submit()
		{
			document.getElementById('form1').submit();
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

				<!-- Header Icon -->
				<div class="header-icons">
					<label name="loggeduser" style="margin-top: 10px">Hello
					 <?php	
						 if (isset($_SESSION['username']))
							echo "".$_SESSION['owner'];
						else
							echo "User";  ?>
					 </label>
					 <span class="linedivide1"></span>
					<?php
						if (isset($_SESSION['username']))
					 	{
					 		?> <a href="index.php" class="header-wrapicon1 dis-block">
									<img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
								</a> <span class="linedivide1"></span>
						<?php
						}
					 	else
					 	{ 
					 	?> <a href="Login.php" class="header-wrapicon1 dis-block">
							 <img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
							</a>

					 	<?php } ?>
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
				</div>
			</div>
		</div>

	<br><br><br><br>

	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-38">
		<p  style="font-size: 70px;color:#000000" align="center">Payment</p>
		<div class="container">
			<div class="row">
				<p  style="font-size: 50px;color:#000000" align="center">Total: Rs. <?php echo $_GET['amt']; ?></p>
				<form action="transaction.php" method="POST" id="form1">
				<table>
					<br><br><br><br><br>
					<!--<tr>
						<td>
							<input type="radio" name="rdo" id="cc" onclick="creditcard()" style="font-size: 30px"  value="Credit Card">&nbsp&nbsp<i class="pf pf-credit-card pf-2x"></i>&nbsp&nbsp<span style="font-size: 30px"> Credit Card</span>
						</td>
					</tr>	
					<tr id="1" style="display: none;margin-left: 30px">
						<td>	
							<input type="text" name="cardholder" placeholder="Cardholder's name" id="ch" style="display: none;margin-top: 10px;height:25px" required>
						</td>
					</tr>
					<tr >
						<td style="margin-left: 30px">
							<input type="text" name="cardnumber" placeholder="Card Number" id="cnum" style="display: none;margin-top: 10px;height:25px;margin-left: 30px" required>
						</td>
					</tr>
					<tr >
						<td >
							<input type="number" min="1" max="12" placeholder="MM"name="date" id="mon" style="display: none;margin-top: 10px;float:left;height:25px;margin-left: 30px" required>
							<?php
								//$d=date("Y");
								//$c=$d+20;
								//echo '<input type="number" min="'.$d.'" max="'.$c.'" placeholder="YYYY" name="date" id="y" style="display: none;margin-top: 10px;margin-left:10px;margin-right:20px;height:25px;float:left" required>';
							?>
							<input type="password" name="cvv" placeholder="CVV" id="cvv" style="margin-top: 10px;display: none;height:25px"maxlength="3" required>
						</td>
					<tr>
						<td>
							<input type="radio" name="rdo" id="dc" onclick="debitcard()" value="Debit Card">&nbsp&nbsp<i class="pf pf-credit-card pf-2x"></i>&nbsp&nbsp<span style="font-size: 30px">Debit Card</span>
						</td>
					</tr>
					<tr id="0">
						<td>
							<select id="dropdown" style="display:none;margin-left: 30px" onchange="cardselect()">
								<option value="">Select Card type</option>
								<option value="visa">VISA <i class="pf pf-visa"></i></option>
								<option value="Maestro">Maestro <i class="pf pf-maestro-alt"></i></option>
								<option value="Rupay">RuPay <i class=""></i></option>
								<option value="mastercard">Mastercard <i class="pf pf-mastercard-alt"></i></option>
							</select>
						</td>
					</tr>
					<tr id="2" style="display: none">
						<td>	
							<input type="text" name="cardholder" placeholder="Cardholder's name" id="dch" style="display: none;margin-top: 10px;height:25px;margin-left: 30px" required>
						</td>
					<tr>
						<td>
							<input type="text" name="cardnumber" placeholder="Card Number" id="dcnum" style="display: none;margin-top: 10px;height:25px;;margin-left: 30px" required>
						</td>
					</tr>
					<tr>
						<td >
							<input type="number" min="1" max="12" placeholder="MM"name="date" id="dmon" style="display: none;margin-top: 10px;float:left;height:25px;margin-left: 30px" required>
							<?php
								//$d=date("Y");
								//$c=$d+20;
								//echo '<input type="number" min="'.$d.'" max="'.$c.'" placeholder="YYYY" name="date" id="dy" style="display: none;margin-top: 10px;margin-left:10px;margin-right:20px;height:25px;float:left" required>';
							?>
							<input type="password" name="cvv" placeholder="CVV" id="dcvv" style="margin-top: 10px;display: none;height:25px" maxlength="3" required>
						</td>
					</tr>
					<tr>
						<td>
							<input type="radio" name="rdo" id="dc" onclick="bhimupi()" value="UPI">&nbsp&nbsp<img src="images/upi.png" height="50" width="50"></i>&nbsp&nbsp<span style="font-size: 30px">BHIM UPI</span>
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" name="vpa" id="vpa" placeholder="Enter your VPA" style="display: none;margin-left: 30px;;background-color: #d3d3d3" required>
						</td>
					</tr>
					<tr>
						<td>
							<label id="infomartion" style="display: none;margin-left: 30px">VPA means Virtual Payment Address.Generally written with @vpa or @upi after the phone number</label>
						</td>
					</tr>
					<tr>-->
						<td>
							<input type="radio" name="rdo" id="dc" onclick="POD()" value="Pay On Delivery">&nbsp&nbsp<i class="pf pf-cash-on-delivery pf-2x"></i>&nbsp&nbsp<span style="font-size: 30px">Cash On Delivery</span>
						</td>
					</tr>
					<tr colspan="2">
						<td>
							<center>
								<?php 
								if ($_GET['amt']==0)
								{
									echo '<button id="submitter" style="background-color: #D3d3d3;border-radius: 12px;width:100px;height: 30px;" onclick="submit();" disabled="disabled">Continue</button>';
								}
								else
								{

								echo '<button id="submitter" style="background-color: #D3d3d3;border-radius: 12px;width:100px;height: 30px" onclick="submit();">Continue</button>';
							}?>
							</center>
						</td>
					</tr>
				</table></form>
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
	<script src="js/main.js"></script>

</body>
</html>
