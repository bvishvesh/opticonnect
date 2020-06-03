<?php
/*
Author:VISHVESH BHAVSAR
ROLL NO:19BCE504
Class:4BCEA
*/?>
<?php
session_start();
$add=$_POST['add'];
$_SESSION['address']=$add;
header("location:cart.php");
?>