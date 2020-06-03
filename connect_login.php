<?php
/*
Author:VISHVESH BHAVSAR
ROLL NO:19BCE504
Class:4BCEA
*/?>
<?php
	session_start();
	if(isset($_POST['sbmit']))
	{
		$uname=isset($_POST['name'])?$_POST['name']:'';
		$pass=isset($_POST['passkey'])?$_POST['passkey']:'';
		$type=isset($_POST['utype'])?$_POST['utype']:'';
	}
	include "config.php";
	if($type=="customer")
	{
		$result=mysqli_query($con,"select username,password,isactive from customer_master where username='$uname' AND password='$pass';");
		$ar=mysqli_fetch_assoc($result);
		$ret=mysqli_query($con,"select name,customerid from customer_master where username='$uname';");
		$arr=mysqli_fetch_assoc($ret);
		if($ar['username']==$uname)
		{	
			if($ar['isactive']==1)
			{
				if ($result==true) 
				{				
					$_SESSION['id']=$arr['customerid'];
					$_SESSION['owner']=$arr['name'];
					$_SESSION['username']=$uname;
					session_write_close();
					header('location: index.php');
					exit();
				}
				else
				{
					header('location:Login.php?code=1');
				}
			}
			else
			{
				header("location:Login.php?code=2");
				exit();
			}
		}
		else
		{ goto a;}	
	}
	else if($type=="seller")
	{
		$result=mysqli_query($con,"select username,password from seller_master where username='$uname' AND password='$pass';");
		$ar=mysqli_fetch_assoc($result);
		$ret=mysqli_query($con,"select * from seller_master where username='$uname';");
		$arr=mysqli_fetch_assoc($ret);
		if ($arr['username']==$uname)
		{
			if($arr['isactive']==1)
			{
				if ($result==true) 
				{	
					$_SESSION['id']=$arr['sellerid'];
					$_SESSION['owner']=$arr['owner'];
					$_SESSION['username']=$arr['username'];
					session_write_close();
					header('location: seller_upload.php');
					exit();
				}
				else
				{
					header('location: Login.php?code=1');
					exit();
				}
			}
			else
			{
				header("location:Login.php?code=2");
				exit();
			}
		}
		else
		{ goto a;}
	}
	else
	{	a:
		header('location: Login.php?code=0');
		exit();
	}
	
	mysqli_close($con);
?>
	