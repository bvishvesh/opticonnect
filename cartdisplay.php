<?php
/*
Author:VISHVESH BHAVSAR
ROLL NO:19BCE504
Class:4BCEA
*/?>
<?php
$total=0;
include "config.php";
	$result=mysqli_query($con,"select * from cart where customerid=$id;");
	$rowcount=mysqli_num_rows($result);
	$z=0;
	while($row=mysqli_fetch_assoc($result))
	{
		$arr[$z]['product_id']=$row['product_id'];
		$array=$arr[$z]['product_id'];
		$ret=mysqli_query($con,"select * from product_subtype where product_id=$array;");
		$count=mysqli_fetch_assoc($ret);
		$arr[$z]['product_image']=$count['product_image'];
		$arr[$z]['price']=$row['price'];
		$arr[$z]['productname']=$row['product_name'];
		$arr[$z]['id']=$row['product_id'];
		$arr[$z]['sellerid']=$row['sellerid'];
		$arr[$z]['quantity']=$row['quantity'];
		$arr[$z]['pid']=$count['product_id'];
		$total=$total+$arr[$z]['price'];
		$z++;
	}
	$result=mysqli_query($con,"select * from lens where customerid=$id;");
	$count=mysqli_num_rows($result);
	$z=0;
	while($row=mysqli_fetch_assoc($result))
	{
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
		$z++;
	}
	for ($i=0; $i <$rowcount ; $i++)
	{ 
		$sellerid=$arr[$i]['sellerid'];
		$res=mysqli_query($con,"select seller_name from seller_master where sellerid=$sellerid;");
		$array=mysqli_fetch_assoc($res);
		$seller[$i]['seller']=$array['seller_name'];
	}

?>