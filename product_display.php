<?php
/*
Author:VISHVESH BHAVSAR
ROLL NO:19BCE504
Class:4BCEA
*/?>
<?php
include "config.php";
$sort=$_POST['psorting'];
if($sort=="price")
{
	unset($_POST['psorting']);
}
					if(!isset($_GET['type']) AND !isset($_GET['no']))
					{
						if(isset($_POST['psorting']))
							{
								$s=$sort+1000;
								$result=mysqli_query($con,"select * from product_subtype where price BETWEEN $sort AND $s;");
								$rowcount=mysqli_num_rows($result);
							}
						else
							$result=mysqli_query($con,"select * from product_subtype ;");
							$rowcount=mysqli_num_rows($result);
						$div=ceil($rowcount/11);
						$z=0;
						while($row=mysqli_fetch_assoc($result))
						{
							$arr[$z]['product_image']=$row['product_image'];
							$arr[$z]['price']=$row['Price'];
							$arr[$z]['product_name']=$row['product_name'];
							$sum=$arr[$z]['id']=$row['product_id'];
							$z++;
						}
					}
					elseif (isset($_GET['type']) AND !isset($_GET['no']))
					{
						
						$return=mysqli_query($con,"select * from producttype where producttype_name='$type';");
						$array=Mysqli_fetch_assoc($return);
						$t=$array['producttype_id'];
						if(isset($_POST['psorting']))
						{
							$s=$sort+1000;
							$result=mysqli_query($con,"select * from product_subtype where producttype_id=$t AND price BETWEEN $sort AND $s;");
							$rowcount=mysqli_num_rows($result);
						}
						else
							$result=mysqli_query($con,"select * from product_subtype where producttype_id='$t';");
							$rowcount=mysqli_num_rows($result);
						$div=ceil($rowcount/11);
						$z=0;
						$i=0;
						$x=mysqli_query($con,"select * from product_subtype where producttype_id='$t';");
						$roy=mysqli_fetch_assoc($x);
						$ar[]=$roy['product_id'];
						while($row=mysqli_fetch_assoc($result))
						{
							$arr[$z]['product_image']=$row['product_image'];
							$arr[$z]['price']=$row['Price'];
							$arr[$z]['product_name']=$row['product_name'];
							$sum=$arr[$z]['id']=$row['product_id'];
							if(($z%11)==0 AND $z!=0)
							{
								$ar[]=$row['product_id'];
								$i++;
							}
							$z++;
						}

					}
					elseif (isset($_GET['no']) AND isset($_GET['type']))
					{
						$return=mysqli_query($con,"select * from producttype where producttype_name='$type';");
						$array=Mysqli_fetch_assoc($return);
						$t=$array['producttype_id'];
						if (isset($_POST['psorting'])) 
						{
							$s=$sort+1000;
							$result=mysqli_query($con,"select * from product_subtype where producttype_id='$t' and product_id>=$no and price BETWEEN $sort AND $s;");
							$rowcount=mysqli_num_rows($result);
						}
						else
							$result=mysqli_query($con,"select * from product_subtype where producttype_id='$t' and product_id>=$no;");
							$rowcount=mysqli_num_rows($result);
						$div=ceil($rowcount/11);
						$z=0;
						$i=0;
						$x=mysqli_query($con,"select * from product_subtype where producttype_id='$t';");
						$roy=mysqli_fetch_assoc($x);
						$ar[]=$roy['product_id'];
						while($row=mysqli_fetch_assoc($result))
						{
							$arr[$z]['product_image']=$row['product_image'];
							$arr[$z]['price']=$row['Price'];
							$arr[$z]['product_name']=$row['product_name'];
							$sum=$arr[$z]['id']=$row['product_id'];
							if(($z%10)==0 AND $z!=0)
							{
								$ar[]=$row['product_id'];
								$i++;
							}$z++;
						}
					}
					elseif (isset($_GET['no']) AND !isset($_GET['type']))
					{
						if(isset($_POST['psorting']))
						{
							$s=$sort+1000;
							$result=mysqli_query($con,"select * from product_subtype where product_id>=$no and price BETWEEN $sort AND $s;");
							$r=mysqli_query($con,"select * from product_subtype where price BETWEEN $sort AND $s;");
							$rowcount=mysqli_num_rows($r);
						}
						else
							$result=mysqli_query($con,"select * from product_subtype where product_id>=$no;");
							$r=mysqli_query($con,"select * from product_subtype;");
							$rowcount=mysqli_num_rows($r);
						$div=ceil($rowcount/11);
						$z=0;
						while($row=mysqli_fetch_assoc($result))
						{
							$arr[$z]['product_image']=$row['product_image'];
							$arr[$z]['price']=$row['Price'];
							$arr[$z]['product_name']=$row['product_name'];
							$sum=$arr[$z]['id']=$row['product_id'];
							$z++;
						}
					}
?>