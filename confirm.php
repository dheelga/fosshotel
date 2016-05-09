<?php
error_reporting(0);
session_start();
include("connect.php");

if(isset($_POST['submit']))
{

	//bookingid generator
	$bookingid="H";
	
	$bookingid.=date('dmHi');
	$bookingid.=$payable;
	$bookingid.=$_SESSION['id'];
	
	$_SESSION['bookingid']=$bookingid;
			
	$sql="insert into booking(customerid,name,bookingid,hotelname,guest,room,payable) values('".$_SESSION['id']."','".$_SESSION['name']."','".$bookingid."','".$_SESSION['hotel']."','".$_SESSION['guest']."','".$_SESSION['room']."','".$_SESSION['payable']."')";
	mysqli_query($con,$sql);
	
	header('Location:http://localhost/hotel/index.php');

}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="format-detection" content="telephone=no">
        <meta name="msapplication-tap-highlight" content="no">
		<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi">
        
        <title>Hotel Rooms </title>
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	
		<!-- Font Awesome Icons -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		
		<!-- Scripts -->	
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
   		
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		
		<link href="css/style.css" rel="stylesheet">
		
	</head>
<body>

<?php require_once("header.php"); ?>

<div class="container" style="padding-top:186px;font-size:17px">
	<div class="row">
		<div class="col-md-3"></div>
		
		<div class="col-md-6">
			<div class="thumbnail">
			
				<br>
			
				<div class="row">
					<span style="margin-left:30px">
						<i class="fa fa-user" style="margin-right:5px"></i><?php echo $_SESSION['name']; ?>
					</span>
					<span style="float:right;margin-right:30px">
						<i class="fa fa-mobile" style="margin-right:5px"></i><?php echo $_SESSION['mobile']; ?>
					</span>
				</div>
				
				<hr>
				
				<div class="row">
					<span style="margin-left:30px">
						Hotel name : <?php echo $_SESSION['hotel']; ?>
					</span>
				</div><br>
				
				<div class="row">
					<span style="margin-left:30px">
						Guest : </i><?php echo $_SESSION['guest']; ?>
					</span>
					<span style="margin-left:120px">
						Room : </i><?php echo $_SESSION['room']; ?>
					</span>
				</div><br>
				
				<div class="row">
					<span style="margin-left:30px">
						Payable : <i class="fa fa-inr" style="margin-right:5px"></i><?php echo $_SESSION['payable']; ?>
					</span>
				</div><br>
				
			</div>
		</div>
		
		<div class="col-md-3"></div>
		
	</div>
	
	<br>
	
	<div class="row">
		<div class="col-md-3"></div>
		
		<div class="col-md-6 text-center">
			<form method="post">
				<input type="submit" name="submit" class="btn btn-info btn-md" value="confirm Booking">
			</form>
		</div>
		
		<div class="col-md-3"></div>
	</div>
</div>

<br><br><br>

</body>
</html>