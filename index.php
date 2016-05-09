<?php
error_reporting(0);
session_start();
include("connect.php");

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


<div style="padding-top:106px">
	<div class="block">
		<div class="row">
		
			<?php if(isset($_SESSION['bookingid']))
			{
			?>
			<div class="text-center">
				<div class="alert alert-success text-center"> 
					<span style="font-size:18px"><i class="fa fa-thumbs-o-up"></i> Booking success ! Your Booking ID is <?php echo $_SESSION['bookingid']; ?></span> 
				</div>
			</div>
			<?
			}
			unset($_SESSION['bookingid']);
			?>
			
			<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="5000">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<img src="img/slide0.jpg">
					</div>

					<div class="item">
						<img src="img/slide1.jpg">
					</div>

					<div class="item">
						<img src="img/slide2.jpg">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="alert alert-warning text-center"> 
			<span style="font-size:18px"> Check In With Us ! Feel Like Home !!</span> 
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-xs-3 col-lg-3" style="padding-top: 15px;">
			<div class="thumbnail hospitality">
				<label style="padding-top:90px;margin-left:29px;font-size:18px">Good <br> Hospitality</label>
			</div>
		</div>
		<div class="col-xs-3 col-lg-3" style="padding-top: 15px;">
			<div class="thumbnail food">
				<label style="padding-top:100px;margin-left:29px;font-size:18px;color:#fff">Healthy food</label>
			</div>
		</div>
		<div class="col-xs-3 col-lg-3" style="padding-top: 15px;">
			<div class="thumbnail roomservice">
				<label style="padding-top:100px;margin-left:29px;font-size:18px;color:#fff">Better Roomservice</label>
			</div>
		</div>
		<div class="col-xs-3 col-lg-3" style="padding-top: 15px;">
			<div class="thumbnail ambience">
				<label style="padding-top:100px;margin-left:29px;font-size:16px;color:#fff">Relax spot</label>
			</div>
		</div>
	</div>
</div>

<br><br>

<div class="container-fluid">
	<div class="row">
		
		<div class="col-xs-12">
			<span style="font-size:19px;font-weight:500"> Our services </span>		
			<hr>
		</div>
		
		<div class="col-xs-4 col-lg-4" style="padding-top: 15px;">
			<div class="thumbnail chennai">
				<label style="padding-top:50px;margin-left:19px;font-size:18px">Chennai</label>
			</div>
		</div>
		<div class="col-xs-4 col-lg-4" style="padding-top: 15px;">
			<div class="thumbnail bangalore">
				<label style="padding-top:50px;margin-left:19px;font-size:18px;color:#fff">Bangalore</label>
			</div>
		</div>
		<div class="col-xs-4 col-lg-4" style="padding-top: 15px;">
			<div class="thumbnail kochi">
				<label style="padding-top:50px;margin-left:19px;font-size:18px;color:#fff">Kochi</label>
			</div>
		</div>
		
		<br>
		
		<div class="col-xs-4 col-lg-4" style="padding-top: 15px;">
			<div class="thumbnail delhi">
				<label style="padding-top:50px;margin-left:19px;font-size:18px;color:#fff">Delhi</label>
			</div>
		</div>
		<div class="col-xs-4 col-lg-4" style="padding-top: 15px;">
			<div class="thumbnail mumbai">
				<label style="padding-top:50px;margin-left:19px;font-size:18px;color:#fff">Mumbai</label>
			</div>
		</div>
		<div class="col-xs-4 col-lg-4" style="padding-top: 15px;">
			<div class="thumbnail kolkatta">
				<label style="padding-top:50px;margin-left:19px;font-size:18px;color:#fff">Kolkatta</label>
			</div>
		</div>
		
	</div>
</div>

<br><br>

</body>
</html>