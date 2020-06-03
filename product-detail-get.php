<?php
/*
Author:VISHVESH BHAVSAR
ROLL NO:19BCE504
Class:4BCEA
*/?>
<?php
	session_start();
include "config.php";
	$id=$_GET['id'];
	$result=mysqli_query($con,"select * from product_subtype where product_id='$id';");
	$arr=Mysqli_fetch_assoc($result);
	$type=$arr['producttype_id'];
	$_SESSION['description']=$arr['product_description'];
	$_SESSION['image']=$arr['product_image'];
	$_SESSION['name']=$arr['product_name'];
	$_SESSION['brand']=$arr['brand'];
	$_SESSION['price']=$arr['Price'];
	$_SESSION['pid']=$id;
	$return=mysqli_query($con,"select * from producttype where producttype_id=$type;");
	$array=Mysqli_fetch_assoc($return);
	$_SESSION['type']=$array['producttype_name'];
	session_write_close();
	header("location:product-detail.php");

?>