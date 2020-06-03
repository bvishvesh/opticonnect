<?php
/*
Author:VISHVESH BHAVSAR
ROLL NO:19BCE504
Class:4BCEA
*/?>

<?php
session_start();
$id=$_SESSION['id'];
$va=$_GET['val'];
include 'config.php';
$true=mysqli_query($con,"delete from cart where customerid=$id AND product_id=$va;");
$t=mysqli_query($con,"delete from lens where customerid=$id AND productid=$va;");
header("location:cart.php");
?>