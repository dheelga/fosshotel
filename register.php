<?php
session_start();
error_reporting(0);
include("connect.php");

$is_ajax=$_REQUEST['is_ajax'];
if(isset($is_ajax) && $is_ajax)
{	
	$name=$_POST['name'];
	$mobile=$_POST['mobile'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$address1=$_POST['address1'];
	$address2=$_POST['address2'];
	$city=$_POST['city'];
	$state=$_POST['state'];
	$pincode=$_POST['pincode'];
	
	if(empty($name) || empty($mobile) || empty($email) || empty($password) || empty($address1) || empty($address2) || empty($city) || empty($state) || empty($pincode))
	{
		echo "need";
	}
	else if(!(filter_var($email, FILTER_VALIDATE_EMAIL)) || !preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/',$email))
	{
		echo "validemail";
	}
	else if(!preg_match('/^[0-9]{10}+$/', $mobile))
	{
		echo "validmobileno";
	}
	else
	{
		$checkmailid=mysqli_query($con,'select * from customers where email="'.$email.'" or mobileno="'.$mobile.'"');
	
		if(mysqli_num_rows($checkmailid)==1)
		{
			echo "new";
		}
		else
		{	
		$sql="insert into customers(name,email,password,mobileno,address1,address2,city,state,pincode) values('".$_POST['name']."','".$_POST['email']."','".$_POST['password']."','".$_POST['mobile']."','".$_POST['address1']."','".$_POST['address2']."','".$_POST['city']."','".$_POST['state']."','".$_POST['pincode']."')";
		$result=mysqli_query($con,$sql);
	
		$retrieve=mysqli_query($con,'select * from customers where email="'.$_POST['email'].'"');
		
		$fetchdetails=mysqli_fetch_object($retrieve);
		
			$_SESSION['id']=$fetchdetails->customerid;
			$_SESSION['login']=1;
		
			echo 1;
		}
	}	
}
?>