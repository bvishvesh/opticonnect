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
				$confirm=isset($_POST['confirm'])? $_POST['confirm'] :'';
				$phone=isset($_POST['phone'])? $_POST['phone'] :'';
				$email=isset($_POST['mail'])? $_POST['mail'] :'';
				$sname=isset($_POST['sname'])? $_POST['sname'] :'';
				$oname=isset($_POST['oname'])? $_POST['oname'] :'';
				$len=strlen($passw);
				include 'config.php';
				$error=array("");
				$ret=mysqli_query($con,"select * from seller_master where username='$uname' OR email='$email';");
				$result=mysqli_fetch_assoc($ret);
				$affect=mysqli_affected_rows($con);
				if($affect==1)
				{	
					if($result['username']==$uname)
						header("location: seller_reg.php?code=0");
					if($result['username']==$email)
						header("location: seller_reg.php?code=1");
				}
				if (isset($_POST['submit']))
				{
					$curdir=getcwd();
					$filename=$_FILES['filer']['name'];
					$filesize=$_FILES['filer']['size'];
					$tmpname=$_FILES['filer']['tmp_name'];
					$extension=explode('.',$filename);
					$fileext=strtolower(end($extension));
					$filename=$uname.".".$fileext;
					$uploadpath=$curdir."\images\Company registration\ ".basename($filename);
					$uploadpath=trim($uploadpath);
					move_uploaded_file($tmpname,$uploadpath);
				}
				$bool=mysqli_query($con,"insert into seller_master(username,password,phone,email,Seller_name,Owner,Company_reg) values ('$uname','$passw','$phone','$email','$sname','$oname','$uploadpath');");
				if($bool==true)
				{
					$req=mysqli_query($con,"select * from seller_master where username='$uname';");
					$row=mysqli_fetch_assoc($req);
					$_SESSION['username']=$uname;
					$_SESSION['id']=$req['sellerid'];
					session_write_close();
					$subject="Successfull Registration";
					$message='Dear Seller,'."\r\n".' Thank you for registering with us.'."\r\n".' We wish you have better sales with us.'."\r\n"."\r\n"."\r\n".'Regards'."\r\n".'Team Opticonnect';
					$to="".$row['email'];
					$res=mail($to, $subject, $message);
					header("location:seller_upload.php");

				}
?>
