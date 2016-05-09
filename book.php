<?php
error_reporting(0);
session_start();
include("connect.php");

if(isset($_POST['submit']))
{
	if(isset($_SESSION['login']))
	{
		$_SESSION['hotel']=$_POST['hotel'];
		$_SESSION['guest']=$_POST['guest'];
		$_SESSION['room']=$_POST['room'];
		$_SESSION['amt']=$_POST['amt'];
		
		$_SESSION['payable']=$_POST['room']*$_POST['amt'];
		
		header('Location:http://localhost/hotel/confirm.php');
	}
	else
	{
		echo '<script language="javascript">';
		echo 'alert("Please login and proceed")';
		echo '</script>';
	}

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


<div style="padding-top:106px">
	<div class="block">
		<div class="row">
			<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="5000">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
					<li data-target="#myCarousel" data-slide-to="3"></li>
					<li data-target="#myCarousel" data-slide-to="4"></li>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<img src="img/chnbook.jpg">
					</div>

					<div class="item">
						<img src="img/c2.jpg">
					</div>

					<div class="item">
						<img src="img/c1.jpg">
					</div>
					
					<div class="item">
						<img src="img/c4.jpg">
					</div>
					
					<div class="item">
						<img src="img/c3.jpg">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container" style="padding-top:60px">
	<div class="row">
		<form class="form-horizontal" role="form" method="post">
			
			<div class="form-group" style="color:#000;font-size:18px;">
					<label class="control-label col-sm-5" for="hotel"> Hotel :</label>
				
				<div class="col-sm-4 input-group">
					<span class="input-group-addon"><i class="fa fa-building"></i></span>
					<select name="hotel" class="form-control">
						<option value="ITC Grand Chola, Guindy">ITC Grand Chola, Guindy</option>
						<option value="Le Royal Méridien, St. Thomas Mount">Le Royal Méridien, St. Thomas Mount</option>
						<option value="Hyatt Regency, Teynampet">Hyatt Regency, Teynampet</option>
						<option value="The Park, Anna Salai">The Park, Anna Salai</option>
					</select >
				</div>
			</div><br>
			
			<div class="form-group" style="color:#000;font-size:18px;">
					<label class="control-label col-sm-5" for="guest"> Guests :</label>
				
				<div class="col-sm-4 input-group">
					<span class="input-group-addon"><i class="fa fa-users"></i></span>
					<input type="number" class="form-control" id="guest" name="guest" value="1" min="1" max="25">
				</div>
			</div><br>
			
			<div class="form-group" style="color:#000;font-size:18px;">
					<label class="control-label col-sm-5" for="room"> Rooms :</label>
				
				<div class="col-sm-4 input-group">
					<span class="input-group-addon"><i class="fa fa-bed"></i></span>
					<input type="number" class="form-control" id="room" name="room" value="1" min="1" max="5">
				</div>
			</div><br>
		
			<div class="form-group" style="color:#000;font-size:18px;">
					<label class="control-label col-sm-5" for="amt"> Amount :</label>
				
				<div class="col-sm-4 input-group">
					<span class="input-group-addon"><i class="fa fa-inr"></i></span>
					<select name="amt" class="form-control">
						<option value="499">499</option>
						<option value="599">599</option>
						<option value="699">699</option>
						<option value="799">799</option>
					</select >
				</div>
			</div><br>
			
			<div class="col-sm-5"></div>
			<div class="col-sm-4">
				<input type="submit" name="submit" class="btn btn-info btn-md" value="Continue">
			</div>
			
		</form>
	</div>
</div>

<br><br><br>

</body>
</html>