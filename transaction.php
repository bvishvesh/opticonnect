<?php
/*
Author:VISHVESH BHAVSAR
ROLL NO:19BCE504
Class:4BCEA
*/?>

<?php
session_start();
$id=$_SESSION['id'];
$paymentmode=$_POST['rdo'];
$address=$_SESSION['address'];
include "config.php";
$t=mysqli_query($con,"select * from transaction_identifier;");
$rows=mysqli_num_rows($t);
$rows+=1;
$true=mysqli_query($con,"select * from cart where customerid=$id;");
$date=date("o-n-j H:i:s");
 while($ar=mysqli_fetch_assoc($true))
{	
	$pid=$ar['product_id'];
	$len=mysqli_query($con,"select * from lens where customerid=$id AND productid=$pid;");
	$l=mysqli_fetch_assoc($len);
	$lsph=$l['lsph'];
	$leadd=$l['ladd'];
	$leax=$l['laxis'];
	$lecyl=$l['lcycle'];
	$rsph=$l['rsph'];
	$raxis=$l['raxis'];
	$rcyl=$l['rcycle'];
	$radd=$l['radd'];
	$rsign=$l['rsign'];
	$lsign=$l['lsign'];
	$pid=$ar['product_id'];
	$price=$ar['price'];
	$customerid=$ar['customerid'];
	$pname=$ar['product_name'];
	$sid=$ar['sellerid'];
	$sname=$ar['sellername'];
	$quantity=$ar['quantity'];
	$show=mysqli_query($con,"insert into transaction (transaction_id,customerid,price,productid,productname,quantity,sellerid,lsign,rsign,ladd,laxis,lcycle,lsph,radd,raxis,rcycle,rsph,Payment_Method,address) values (".$rows.",".$customerid.",".$price.",".$pid.",'".$pname."',".$quantity.",".$sid.",$lsign,$rsign,$leadd,$leax,$lecyl,$lsph,$radd,$raxis,$rcyl,$rsph,'".$paymentmode."','".$address."');");
}
if($show==true)
{
	$data=mysqli_query($con,"select * from customer_master where customerid=$id;");
	$row=mysqli_fetch_assoc($data);
	$subject="Order Confirmation:#".$rows.":";
	$message='Dear Customer,'."\r\n".' Thank You for your order.'."\r\n".' The Seller will confirm your order and share the courier details'."\r\n".' check it on the delivery page'."\r\n"."\r\n".'Regards'."\r\n".'Team Opticonnect';
	$to="".$row['email'];
	$res=mail($to, $subject, $message);
	mysqli_query($con,"delete from cart where customerid=$id;");
	mysqli_query($con,"delete from lens where customerid=$id;");
	mysqli_query($con,'insert into transaction_identifier (transactionid,customerid) values ('.$rows.','.$id.');');
	header("location:yorders.php");
}
mysqli_close($con);
?>