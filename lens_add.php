<?php
/*
Author:VISHVESH BHAVSAR
ROLL NO:19BCE504
Class:4BCEA
*/?>
<?php
session_start();
$id=$_SESSION['id'];
$add=isset($_POST['add'])?$_POST['add']:'';
$submtted=$_SESSION['pid'];
$quantity=isset($_POST['quantity'])?$_POST['quantity']:1;
include "config.php";
	$lsign=$_POST['lsign']!=''?$_POST['lsign']:0;
	$rsign=$_POST['rsign']!=''?$_POST['rsign']:0;
	$reph=$_POST['resph']!=''?$_POST['resph']:0;
	$reax=$_POST['reax']!=''?$_POST['reax']:0;
	$readd=$_POST['readd']!=''?$_POST['readd']:0;
	$recyl=$_POST['recyl']!=''?$_POST['recyl']:0;
	$lseph=$_POST['lesph']!=''?$_POST['lesph']:0;
	$lecyl=$_POST['lecyl']!=''?$_POST['lecyl']:0;
	$leadd=$_POST['leadd']!=''?$_POST['leadd']:0;
	$leax=$_POST['leax']!=''?$_POST['leax']:0;
	$sql="insert into lens(productid,customerid,lsign,rsign,laxis,ladd,lsph,lcycle,rsph,radd,raxis,rcycle) values ($submtted,$id,'".$lsign."','".$rsign."','$leax','$leadd','$lseph','$lecyl','$reph','$readd','$reax','$recyl');";
	$true=mysqli_query($con,$sql);
	if (isset($_POST['submit']))
	{
		$return=mysqli_query($con,"select * from product_subtype where product_id=$submtted;");
		$array=mysqli_fetch_assoc($return);
		$name=$array['product_name'];
		$price=$array['Price'];
		$id=$array['seller_id'];
		$res=mysqli_query($con,"select seller_name from seller_master where sellerid=$id;");
		$seller=mysqli_fetch_assoc($res);
		$customerid=$_SESSION['id'];
		$sellername=$seller['seller_name'];
		$checkquery=mysqli_query($con,"select * from cart where product_id=$submtted AND customerid=$customerid");
		$rowcount=mysqli_num_rows($checkquery);
		if ($rowcount==1)
		{
			$row=mysqli_fetch_assoc($checkquery);
			$quantity=$quantity+$row['quantity'];
			$result=Mysqli_query($con,"update cart set quantity=$quantity where customerid=$customerid AND product_id=$submtted;");
		}
		else
		{
			$result=Mysqli_query($con,"insert into cart(customerid,product_id,product_name,sellerid,sellername,quantity,price) values($customerid,$submtted,'$name',$id,'$sellername',$quantity,$price);");
		}
		if ($result==true)
		{
			header("location:product-detail.php");
		}
	}

?>