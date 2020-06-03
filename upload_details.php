<?php
/*
Author:VISHVESH BHAVSAR
ROLL NO:19BCE504
Class:4BCEA
*/?>

<?php
				session_start();
				if (!isset($_SESSION['username']))
				{
					$uname=$_SESSION['username'];
					header("location:Login.php");
				}
				else
				{
					$id=$_SESSION['id'];
					$uname=$_SESSION['username'];
					$pname=isset($_POST['name'])? $_POST['name']:'';
					$pname=trim($pname);
					$price=isset($_POST['price'])? $_POST['price'] :'';
					$brand=isset($_POST['brand'])? $_POST['brand'] :'';
					$pdesc=isset($_POST['pdesc'])? $_POST['pdesc'] :'';
					$type=isset($_POST['ptype'])? $_POST['ptype'] :'';
					$con=mysqli_connect("localhost","root","");
					if (mysqli_connect_error())
						die("connection failed ".mysqli_connect_error());
					else 
						$conn = mysqli_select_db($con,'opticonnect');
					if (isset($_POST['submit']))
					{
						$curdir=getcwd();
						$curdir=$curdir.str_replace('\ ', '/', $curdir);
						$filename=$_FILES['filer']['name'];
						$filesize=$_FILES['filer']['size'];
						$tmpname=$_FILES['filer']['tmp_name'];
						$extension=explode('.',$filename);
						$fileext=strtolower(end($extension));
						$filename=$pname."_".$id.".".$fileext;
						$filename=str_replace(' ','_', $filename);
						echo "$filename";
						if ($type=="accessories")
						{
							$uploadpath="images/Accessories/ ".basename($filename);
						}
						elseif ($type=="specs")
						{
							$uploadpath="images/Spectacles/ ".basename($filename);	
						}
						elseif ($type=="contact")
						{
							$uploadpath="images/Contact_lens/ ".basename($filename);	
						}
						else
						{
							$uploadpath="images/Sunglasses/".basename($filename);
						}		
						echo "$filename";
						move_uploaded_file($tmpname,$uploadpath);					
					}
					if ($type=="accessories")
					{
						$bool=mysqli_query($con,"insert into product_subtype(producttype_id,product_name,product_image,product_description,brand,Price,seller_id) values (4,'$pname','$uploadpath','$pdesc','$brand','$price','$id');");
					}
					elseif ($type=="specs")
					{
						$bool=mysqli_query($con,"insert into product_subtype(producttype_id,product_name,product_image,product_description,brand,Price,seller_id) values (1,'$pname','$uploadpath','$pdesc','$brand','$price','$id');");	
					}
					elseif ($type=="contact")
					{
						$bool=mysqli_query($con,"insert into product_subtype(producttype_id,product_name,product_image,product_description,brand,Price,seller_id) values (3,'$pname','$uploadpath','$pdesc','$brand','$price','$id');");	
					}
					else
					{
						$bool=mysqli_query($con,"insert into product_subtype(producttype_id,product_name,product_image,product_description,brand,Price,seller_id) values (2,'$pname','$uploadpath','$pdesc','$brand','$price','$id');");
					}
					if($bool==true)
					{
						$req=mysqli_query($con,"select * from seller_master where username='$uname';");
						$res=mysqli_fetch_assoc($req);
						$_SESSION['username']=$res['username'];
						$_SESSION['id']=$res['sellerid'];
						session_write_close();
						echo $uploadpath;
						header("location:seller_upload.php");
					}
				}
?>
