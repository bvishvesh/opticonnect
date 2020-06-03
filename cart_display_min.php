<?php
/*
Author:VISHVESH BHAVSAR
ROLL NO:19BCE504
Class:4BCEA
*/?>
<?php
include 'config.php';
	$z=0;
	$total=0;
	if(isset($_SESSION['id']))
	{
		$result=mysqli_query($con,"select * from cart where customerid=$id;");
		$rowcount=mysqli_num_rows($result);
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
			$total+=$arr[$z]['price'];
			$z++;
		}
	}
?>