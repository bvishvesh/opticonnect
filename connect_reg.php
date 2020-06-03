<?php
/*
Author:VISHVESH BHAVSAR
ROLL NO:19BCE504
Class:4BCEA
*/?>
<?php
				session_start();
				$name=isset($_POST['name'])? $_POST['name']:'';
				$uname=isset($_POST['uname'])? $_POST['uname']:'';
				$passw=isset($_POST['pass'])? $_POST['pass'] :'';
				$phone=isset($_POST['phone'])? $_POST['phone'] :'';
				$email=isset($_POST['mail'])? $_POST['mail'] :'';
				$confirm=isset($_POST['confirm'])? $_POST['confirm'] :'';
				$add=isset($_POST['address'])? $_POST['address'] :'';
				require 'config.php';
				$result=mysqli_query($con,"select * from customer_master where username='$uname'");
				$get=mysqli_fetch_assoc("result");
				if($result==true)
				{
					$rowcount=mysqli_num_rows($result);
					if ($rowcount==1)
					{
						if($get['email']==$email)
							header("location:login.php?code=4");
						else
							header("location:login.php?code=5");
					}
					else
					{	
						if($passw===$confirm)
						{
							if (mysqli_query($con,"insert into customer_master(username,name,password,phone,email,address,isactive) values ('$uname','$name','$passw','$phone','$email','$add',1)")==true) 
								$_Session["username"]="$uname";
								session_write_close();
								header("location:index.php");
						}
					}
				}		
				mysqli_close($con);
?>
				
				