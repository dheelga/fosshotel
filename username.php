<?php
error_reporting(0);
session_start();

include("connect.php");

$view=mysqli_query($con,'select * from customers where customerid="'.$_SESSION['id'].'"');

$userdetails=mysqli_fetch_object($view);

if(isset($_SESSION['login']))
{
	$_SESSION['name']=$userdetails->name;
	$_SESSION['mobile']=$userdetails->mobileno;
	$_SESSION['email']=$userdetails->email;
	
	if(!isset($_SESSION['deliveryaddress']))
	{
		$deliveryaddress =$userdetails->address1;
		$deliveryaddress.=", ";
		$deliveryaddress.=$userdetails->address2;
		$deliveryaddress.=", ";
		$deliveryaddress.=$userdetails->city;
		$deliveryaddress.=" - ";
		$deliveryaddress.=$userdetails->pincode;
		$deliveryaddress.="<br>";
		$deliveryaddress.=$userdetails->state;
		$deliveryaddress.=", ";
		$deliveryaddress.="INDIA";
	
		$_SESSION['deliveryaddress']=$deliveryaddress;
	}
	
}

?>