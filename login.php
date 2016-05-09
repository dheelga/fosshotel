<?php
session_start();
error_reporting(0);
include("connect.php");

$is_ajax=$_REQUEST['is_ajax'];

if(isset($is_ajax) && $is_ajax)
{
	$username=$_REQUEST['username'];
	$password=$_REQUEST['password'];

	$result=mysqli_query($con,'select * from customers where (email="'.$username.'" or mobileno="'.$username.'") and password="'.$password.'"');

	$userdetails=mysqli_fetch_object($result);

	if(mysqli_num_rows($result)==1){
		$_SESSION['id']=$userdetails->customerid;	
		$_SESSION['name']=$userdetails->name;
		$_SESSION['login']=1;
	
		echo 1;

	}
	else
	{
		echo 0;
	}
}
	
?>