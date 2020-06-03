<?php
/*
Author:VISHVESH BHAVSAR
ROLL NO:19BCE504
Class:4BCEA
*/?>

<?php
include "config.php";
$sort=isset($_POST['price_sorting'])?$_POST['price_sorting']:'price';
$price_sorter=isset($_POST['sorting'])?$_POST['sorting']:'sort';
$page=isset($_GET['page'])?$_GET['page']:'1';
$offset=($page-1)*11;
$sum=0;
					if(!isset($_GET['type']) AND !isset($_GET['page']))
					{
						if(isset($_POST['price_sorting']) || isset($_POST['sorting']))
							{
								if($price_sorter!="sort" || $sort!="price")
								{
									if ($price_sorter!="sort" && $sort!="price")
									{
										$lowerlimit=$sort;
										$upperlimit=$sort+1000;
										if($price_sorter=="up")
										{
											$result=mysqli_query($con,"select * from product_subtype where price BETWEEN $lowerlimit AND $upperlimit ORDER BY price ASC LIMIT $offset,11;");
											$result_rows=mysqli_query($con,"select * from product_subtype where price BETWEEN $lowerlimit AND $upperlimit ORDER BY price ASC;");
										}
										else
										{
											$result=mysqli_query($con,"select * from product_subtype where price BETWEEN $lowerlimit AND $upperlimit ORDER BY price DESC LIMIT $offset,11;");
											$result_rows=mysqli_query($con,"select * from product_subtype where price BETWEEN $lowerlimit AND $upperlimit ORDER BY price DESC;");
										}
									}
									else if($price_sorter=="sort" && $sort!="price")
									{
										$lowerlimit=$sort;
										$upperlimit=$sort+1000;
										$result=mysqli_query($con,"select * from product_subtype where price BETWEEN $lowerlimit AND $upperlimit ORDER BY price ASC LIMIT $offset,11;");
										$result_rows=mysqli_query($con,"select * from product_subtype where price BETWEEN $lowerlimit AND $upperlimit ORDER BY price ASC;");
										
									}
									elseif($price_sorter=="up" && $sort=="price")
									{
										$result=mysqli_query($con,"select * from product_subtype ORDER BY price ASC LIMIT $offset,11;");
										
										$result_rows=mysqli_query($con,"select * from product_subtype ORDER BY price ASC;");
										
									}
									else if($price_sorter=="down" && $sort=="price")
									{
										$result=mysqli_query($con,"select * from product_subtype ORDER BY price DESC LIMIT $offset,11;");
										
										$result_rows=mysqli_query($con,"select * from product_subtype ORDER BY price DESC;");
										
									}
								}
							}
							else
							{
								$result=mysqli_query($con,"select * from product_subtype LIMIT $offset,11;");
								
								$result_rows=mysqli_query($con,"select * from product_subtype;");
								
							}
							$rowcount=mysqli_num_rows($result_rows);
							
						$z=0;
						while($row=mysqli_fetch_assoc($result))
						{
							$arr[$z]['product_image']=$row['product_image'];
							$arr[$z]['price']=$row['Price'];
							$arr[$z]['product_name']=$row['product_name'];
							$arr[$z]['id']=$row['product_id'];
							$z++;
							$sum++;
							
							
						}
					}
					
					elseif (isset($_GET['type']) AND !isset($_GET['page']))
					{
						$return=mysqli_query($con,"select * from producttype where producttype_name='$type';");
						$array=Mysqli_fetch_assoc($return);
						$t=$array['producttype_id'];
						if(isset($_GET['price_sorting']) || isset($_GET['sorting']))
						{
							$sorter=isset($_GET['price_sorting'])?$_GET['price_sorting']:'';
							$price_sorter=isset($_GET['sorting'])?$_GET['sorting']:'';
								if(isset($_GET['price_sorting']) || isset($_GET['sorting']))
								{
									if (isset($_GET['price_sorting']) && isset($_GET['sorting']))
									{
										$lowerlimit=isset($_GET['price_sorting'])?$_GET['price_sorting']:'0';
										$upperlimit=$lowerlimit+1000;
										$lowerlimit=intval($lowerlimit);
										if($price_sorter=="up")
										{
											$result=mysqli_query($con,"select * from product_subtype where producttype_id='$t' and price BETWEEN $lowerlimit AND $upperlimit ORDER BY price ASC LIMIT $offset,11;");
											$result_rows=mysqli_query($con,"select * from product_subtype where producttype_id='$t' and price BETWEEN $lowerlimit AND $upperlimit ORDER BY price ASC;");
											
										}
										else
										{
											$result=mysqli_query($con,"select * from product_subtype where producttype_id='$t' and price BETWEEN $lowerlimit AND $upperlimit ORDER BY price DESC LIMIT $offset,11;");
											$result_rows=mysqli_query($con,"select * from product_subtype where producttype_id='$t' and price BETWEEN $lowerlimit AND $upperlimit ORDER BY price DESC;");
										}
									}
									elseif(isset($_GET['price_sorting']) && isset($_GET['sorting']))
									{
										$lowerlimit=isset($_GET['price_sorting'])?$_GET['price_sorting']:'0';
										$upperlimit=$lowerlimit+1000;
										$result=mysqli_query($con,"select * from product_subtype where producttype_id='$t' and price BETWEEN $lowerlimit AND $upperlimit ORDER BY price ASC LIMIT $offset,11;");
										$result_rows=mysqli_query($con,"select * from product_subtype where producttype_id='$t' and price BETWEEN $lowerlimit AND $upperlimit ORDER BY price ASC;");
										
									}
									elseif(!isset($_GET['price_sorting']) && $_GET['sorting']="up")
									{
										$result=mysqli_query($con,"select * from product_subtype where producttype_id='$t' ORDER BY price ASC LIMIT $offset,11;");
										
										$result_rows=mysqli_query($con,"select * from product_subtype where producttype_id='$t' ORDER BY price ASC;");
										
									}
									else if(!isset($_GET['price_sorting']) && $_GET['sorting']=="down")
									{
										$result=mysqli_query($con,"select * from product_subtype where producttype_id='$t'ORDER BY price DESC LIMIT $offset,11;");
										$result_rows=mysqli_query($con,"select * from product_subtype where producttype_id='$t' ORDER BY price DESC;");
										
									}
								}
							}
							else
							{
								$result=mysqli_query($con,"select * from product_subtype where producttype_id='$t' LIMIT $offset,11;");
								$result_rows=mysqli_query($con,"select * from product_subtype where producttype_id='$t';");	
							}
						$rowcount=mysqli_num_rows($result_rows);
						$z=0;
						while($row=mysqli_fetch_assoc($result))
						{
							$arr[$z]['product_image']=$row['product_image'];
							$arr[$z]['price']=$row['Price'];
							$arr[$z]['product_name']=$row['product_name'];
							$arr[$z]['id']=$row['product_id'];
							$z++;
							$sum++;	
						}
					}
					elseif (isset($_GET['page']) AND isset($_GET['type']))
					{
						$return=mysqli_query($con,"select * from producttype where producttype_name='$type';");
						$array=Mysqli_fetch_assoc($return);
						$t=$array['producttype_id'];
						if(isset($_GET['price_sorting']) || isset($_GET['sorting']))
						{
							$sorter=isset($_GET['price_sorting'])?$_GET['price_sorting']:'';
							$price_sorter=isset($_GET['sorting'])?$_GET['sorting']:'';
								if(isset($_GET['price_sorting']) || isset($_GET['sorting']))
								{
									if (isset($_GET['price_sorting']) && isset($_GET['sorting']))
									{
										$lowerlimit=isset($_GET['price_sorting'])?$_GET['price_sorting']:'0';
										$upperlimit=$lowerlimit+1000;
										$lowerlimit=intval($lowerlimit);
										if($price_sorter=="up")
										{
											$result=mysqli_query($con,"select * from product_subtype where producttype_id='$t' and price BETWEEN $lowerlimit AND $upperlimit ORDER BY price ASC LIMIT $offset,11;");
											$result_rows=mysqli_query($con,"select * from product_subtype where producttype_id='$t' and price BETWEEN $lowerlimit AND $upperlimit ORDER BY price ASC;");
											
										}
										else
										{
											$result=mysqli_query($con,"select * from product_subtype where producttype_id='$t' and price BETWEEN $lowerlimit AND $upperlimit ORDER BY price DESC LIMIT $offset,11;");
											$result_rows=mysqli_query($con,"select * from product_subtype where producttype_id='$t' and price BETWEEN $lowerlimit AND $upperlimit ORDER BY price DESC;");
										}
									}
									elseif(isset($_GET['price_sorting']) && isset($_GET['sorting']))
									{
										$lowerlimit=isset($_GET['price_sorting'])?$_GET['price_sorting']:'0';
										$upperlimit=$lowerlimit+1000;
										$result=mysqli_query($con,"select * from product_subtype where producttype_id='$t' and price BETWEEN $lowerlimit AND $upperlimit ORDER BY price ASC LIMIT $offset,11;");
										$result_rows=mysqli_query($con,"select * from product_subtype where producttype_id='$t' and price BETWEEN $lowerlimit AND $upperlimit ORDER BY price ASC;");
										
									}
									elseif(!isset($_GET['price_sorting']) && $_GET['sorting']="up")
									{
										$result=mysqli_query($con,"select * from product_subtype where producttype_id='$t' ORDER BY price ASC LIMIT $offset,11;");
										
										$result_rows=mysqli_query($con,"select * from product_subtype where producttype_id='$t' ORDER BY price ASC;");
										
									}
									else if(!isset($_GET['price_sorting']) && $_GET['sorting']=="down")
									{
										$result=mysqli_query($con,"select * from product_subtype where producttype_id='$t'ORDER BY price DESC LIMIT $offset,11;");
										$result_rows=mysqli_query($con,"select * from product_subtype where producttype_id='$t' ORDER BY price DESC;");
										
									}
								}
							}
							else
							{
								$result=mysqli_query($con,"select * from product_subtype where producttype_id='$t' LIMIT $offset,11;");
								$result_rows=mysqli_query($con,"select * from product_subtype where producttype_id='$t';");	
							}
							$rowcount=mysqli_num_rows($result_rows);
						
						$z=0;
						while($row=mysqli_fetch_assoc($result))
						{
							$arr[$z]['product_image']=$row['product_image'];
							$arr[$z]['price']=$row['Price'];
							$arr[$z]['product_name']=$row['product_name'];
							$arr[$z]['id']=$row['product_id'];
							$z++;
							$sum++;
							
						}
						
					}
					elseif (isset($_GET['page']) AND !isset($_GET['type']))
					{
						if(isset($_GET['price_sorting']) || isset($_GET['sorting']))
						{
							$sorter=isset($_GET['price_sorting'])?$_GET['price_sorting']:'';
							$price_sorter=isset($_GET['sorting'])?$_GET['sorting']:'';
								if(isset($_GET['price_sorting']) || isset($_GET['sorting']))
								{
									if (isset($_GET['price_sorting']) && isset($_GET['sorting']))
									{
										$lowerlimit=isset($_GET['price_sorting'])?$_GET['price_sorting']:'0';
										$upperlimit=$lowerlimit+1000;
										$lowerlimit=intval($lowerlimit);
										if($price_sorter=="up")
										{
											$result=mysqli_query($con,"select * from product_subtype where price BETWEEN $lowerlimit AND $upperlimit ORDER BY price ASC LIMIT $offset,11;");
											$result_rows=mysqli_query($con,"select * from product_subtype where price BETWEEN $lowerlimit AND $upperlimit ORDER BY price ASC;");
											
										}
										else
										{
											$result=mysqli_query($con,"select * from product_subtype where price BETWEEN $lowerlimit AND $upperlimit ORDER BY price DESC LIMIT $offset,11;");
											$result_rows=mysqli_query($con,"select * from product_subtype where price BETWEEN $lowerlimit AND $upperlimit ORDER BY price DESC;");
										}
									}
									elseif(isset($_GET['price_sorting']) && !isset($_GET['sorting']))
									{
										$lowerlimit=isset($_GET['price_sorting'])?$_GET['price_sorting']:'0';
										$upperlimit=$lowerlimit+1000;
										$result=mysqli_query($con,"select * from product_subtype where price BETWEEN $lowerlimit AND $upperlimit ORDER BY price ASC LIMIT $offset,11;");
										$result_rows=mysqli_query($con,"select * from product_subtype where price BETWEEN $lowerlimit AND $upperlimit ORDER BY price ASC;");
										
									}
									elseif(!isset($_GET['price_sorting']) && $_GET['sorting']="up")
									{
										$result=mysqli_query($con,"select * from product_subtype ORDER BY price ASC LIMIT $offset,11;");
										$result_rows=mysqli_query($con,"select * from product_subtype ORDER BY price ASC;");
										
									}
									else if(!isset($_GET['price_sorting']) && $_GET['sorting']=="down")
									{
										$result=mysqli_query($con,"select * from product_subtype ORDER BY price DESC LIMIT $offset,11;");
										$result_rows=mysqli_query($con,"select * from product_subtype ORDER BY price DESC;");
										
									}
								}
							}
								else
								{
									$result=mysqli_query($con,"select * from product_subtype LIMIT $offset,11;");
									$result_rows=mysqli_query($con,"select * from product_subtype;");
									
								}
								$rowcount=mysqli_num_rows($result_rows);
						$z=0;
						while($row=mysqli_fetch_assoc($result))
						{
							$arr[$z]['product_image']=$row['product_image'];
							$arr[$z]['price']=$row['Price'];
							$arr[$z]['product_name']=$row['product_name'];
							$arr[$z]['id']=$row['product_id'];
							$z++;$sum++;
						}
					}
					
?>