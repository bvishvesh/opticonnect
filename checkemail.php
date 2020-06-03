<?php
/*
Author:VISHVESH BHAVSAR
ROLL NO:19BCE504
Class:4BCEA
*/?>
<?php
/**
 * Created by PhpStorm.
 * User: amogha
 * Date: 3/8/2019
 * Time: 11:02 PM
 */
session_start();
include "config.php";
$email=isset($_POST['email'])?$_POST['email']:'';
$query=mysqli_query($con,"select * from customer_master where email='$email'; ");
$rowcount=mysqli_num_rows($query);

if ($rowcount!=0)
{
    $password_chars="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890@$!_";
    $newpassword=substr(str_shuffle($password_chars),0,10);
    var_dump($newpassword);
    $subject="Password Reset";
    $message='Dear Customer,'."\r\n".'We have received request for resetting your password.'."\r\n".'The password has been changed to:'.$newpassword."\r\n".'Please do change the password at your next login.'."\r\n"."\r\n".'Regards'."\r\n".'Team Opticonnect.';
    $to=$email;
    $res=mail($to, $subject, $message);
    $updatepassword=mysqli_query($con,"update customer_master set password='$newpassword' where email='$email';");
    header("location:index.php");
}
else
{
    $_SESSION['error']="Incorrect E-mail";
    session_write_close();
    header("Location:forgotpassword.php");
}

?>