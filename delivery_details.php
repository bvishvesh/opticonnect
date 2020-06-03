<?php
/*
Author:VISHVESH BHAVSAR
ROLL NO:19BCE504
Class:4BCEA
*/?>

<?php
include "config.php";
$cn=isset($_POST['consignment'])?$_POST['consignment']:'';
$dc=isset($_POST['dc'])?$_POST['dc']:'';
$z=0;
$id=isset($_GET['id'])?$_GET['id']:'';
$tid=isset($_GET['tid'])?$_GET['tid']:'';
$sql="insert into delivery (transaction_id,consignment_number,Delivery_company,customer_id) values ($tid,'$cn','$dc',$id);";
$true=mysqli_query($con,$sql);
if ($true)
{
	$data=mysqli_query($con,"select * from customer_master where customerid=$id;");
	$row=mysqli_fetch_assoc($data);
	mysqli_query($con,'update transaction set isdelset=1 where transaction_id='.$tid.' AND customerid='.$id.';');
	$subject="Order Shipped";
	$message='Dear Customer,'."\r\n".' Your order is prepared and shipped by seller.'."\r\n".' It has been sent via '.$dc.' and consignment number is '.$cn.' to your address.'."\r\n"."\r\n".'Regards'."\r\n".'Team Opticonnect';
	$to="".$row['email'];
	$res=mail($to, $subject, $message);
	header("location:delivery.php");
}
mysqli_close($con);
?>	