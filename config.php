<?php
/*
Author:VISHVESH BHAVSAR
ROLL NO:19BCE504
Class:4BCEA
*/?>
<?php
$con=mysqli_connect("localhost","root","");
if (mysqli_connect_error())
	die("connection failed ".mysqli_connect_error());
else 
	mysqli_select_db($con,'opticonnect');
?>