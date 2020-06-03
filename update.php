<?php
/*
Author:VISHVESH BHAVSAR
ROLL NO:19BCE504
Class:4BCEA
*/?>
<?php
				session_start();
				if(!isset($_SESSION['username']))
				{
					header("location:Login.php");
				}
				else
				{	
					$uname=$_SESSION['username'];
					$id=$_SESSION['id'];
					$passw=isset($_POST['pass'])? $_POST['pass'] :'';
					$confirm=isset($_POST['confirm'])? $_POST['confirm'] :'';
					$sname=isset($_POST['sname'])? $_POST['sname'] :'';
					$oname=isset($_POST['oname'])? $_POST['oname'] :'';
					$len=strlen($passw);
                    include "config.php";
					$ret=mysqli_query($con,"select * from seller_master where username='$uname';");
					$bool=mysqli_query($con,"update seller_master set password='$passw',Seller_name='$sname',Owner='$oname' where username='$uname';");
					if($bool==true)
					{
						$_SESSION['username']=$uname;
						$_SESSION['id']=$id;
						header("location:seller_upload.php");
					}
					var_dump($con);
				}
?>