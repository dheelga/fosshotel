<?php
error_reporting(0);
session_start();
include("connect.php");
include("username.php");
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
		
		<!-- Main javascript -->
		<script src="js/main.js"></script>
		
		<!-- General Style css -->
		<style>
			html 
			{
				height: 100%;
			}
			body 
			{
				position: relative;
				margin: 0;
				min-height: 100%;
			}
			nav
			{
				background: #37474F !important;
				max-height: 107px !important;
				
			}
			nav .right-inner-addon {
				position: relative;
			}
			nav .right-inner-addon input {
				padding-right: 30px;    
			}
			nav .right-inner-addon i {
				position: absolute;
				right: 0px;
				padding: 10px 12px;
				pointer-events: none;
			}
			nav a{ color: #fff; }
			nav a:hover{ color: #fff; }
			nav ul{ padding-top: 7px; }
			nav ul li
			{
				display: inline;
				list-style-type: none;
				margin-left: 10px;
				font-size: 17px;
				font-weight: bold;
			}
			nav .badge
			{
				display: block;
				position: absolute;
				left: 10px;
				bottom: 16px;
				line-height: 18px;
				height: 18px;
				padding: 0 5px;
				font-family: Arial, sans-serif;
				background-color: #339900;
				
				border-radius: 10px;
				@include box-shadow(inset 0 1px rgba(white, .3), 0 1px 1px rgba(black, .08));
				font-size:16px;
				color: #fff;
			}
			.dropdown .caret-up 
			{
				width: 0; 
				height: 0; 
				border-left: 4px solid rgba(0, 0, 0, 0);
				border-right: 4px solid rgba(0, 0, 0, 0);
				border-bottom: 4px solid;
	
				display: inline-block;
				margin-left: 2px;
				vertical-align: middle;
			}
			
		</style>
		
   		<!--login css -->
   		<link rel="stylesheet" href="css/login.css" />
   		
   		<!-- Login JS -->
   		<script type="text/javascript">
    	$(document).ready(function() { 
    	
    		//remember me
    		if (localStorage.chkbx && localStorage.chkbx != '') {
                    $('#remember_me').attr('checked', 'checked');
                    $('#username').val(localStorage.usrname);
                    $('#pwd').val(localStorage.pass);
                } else {
                    $('#remember_me').removeAttr('checked');
                    $('#username').val('');
                    $('#pwd').val('');
                }
 
			//remember me check
			$('#remember_me').click(function() {

				if ($('#remember_me').is(':checked')) {
					// save username and password
					localStorage.usrname = $('#username').val();
					localStorage.pass = $('#pwd').val();
					localStorage.chkbx = $('#remember_me').val();
				} else {
					localStorage.usrname = '';
					localStorage.pass = '';
					localStorage.chkbx = '';
				}
			});
                
    		$("#login-submit").click(function(){
    			
    			var form_data = {
    				username: $("#username").val(),
    				password: $("#pwd").val(),
    				is_ajax: 1	
    			};
    			
    			$.ajax({
    				type: "POST",
    				url:  "http://localhost/hotel/login.php",
    				data: form_data,
    				success: function(data)
    				{
    					if(data==1)
    						window.location.reload();
    					else if(data==0)
    						document.getElementById("msg").innerHTML= " * Invalid username or password";
    				}
    			});//ajax end

    			return false;
    		});//click end
    	});
	</script>
	
		<!-- Registration & forgot JS -->
		<script type="text/javascript">
			function register(){
		
				var form_data = {
						name: $("#name").val(),
						mobile: $("#mobile").val(),
						email: $("#email").val(),
						password: $("#password").val(),
						address1: $("#address1").val(),
						address2: $("#address2").val(),
						city: $("#city").val(),
						state: $("#state").val(),
						pincode: $("#pincode").val(),
						is_ajax: 1	
					};
			
				$.ajax({
					type: "POST",
					url:  "http://localhost/hotel/register.php",
					data: form_data,
					success: function(result)
					{
						if(result == "need")
							document.getElementById("regmsg").innerHTML=" * All fields must be filled";
						else if(result == "validemail")
							document.getElementById("regmsg").innerHTML=" * Enter valid email id";
						else if(result == "validmobileno")
							document.getElementById("regmsg").innerHTML=" * Enter valid 10 digit mobile no.";
						else if(result == "new")
							document.getElementById("regmsg").innerHTML=" * Your entered mailid or mobile no. is already exists\nPlease register with new one";	
						else if(result)
							window.location.href="index.php";
					}
				});
			 }
			 
			 /*function forgot(){
			 	var form_data = {
							email: $("#fgtemail").val(),
							is_ajax: 1	
						};
				
					$.ajax({
						type: "POST",
						url:  "http://localhost/hotel/forgot.php",
						data: form_data,
						success: function(result)
						{
							if(result == "notpresent")
								document.getElementById("fgtmsg").innerHTML=" * Your entered mail id is not present\nType your registered mail id or create new account";							
							else if(result == "success")
								alert('Check your inbox');						
							else if(result == "failure")
								document.getElementById("fgtmsg").innerHTML=" * mail is not send\n Try later";				
						}
					});//ajax end

    		}*/
		</script>
   		
   	</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
		<div class="row">
		
			<div class="col-md-2" style="padding-top:30px;">
				<div style="color:#fff;font-size:19px;float:left">
					<label><a href="index.php">Ustad Hotel</a></label>
				</div>
			</div>
			<div class="col-md-7">
				<form action="" method="post" style="padding-top:23px;margin-left:8px">
					<div class="right-inner-addon ">
						<i class="fa fa-search"></i>
						<input type="text" name="search" id="search" class="form-control" placeholder="Search Rooms" />
						<input type="submit" id="search-submit" style="position: absolute; left: -9999px">
					</div>
				</form>
			</div>
			<div class="col-md-3">
				<div style="padding-top:10px;float:right">
					<span style="color:#fff;font-size:17px"><a href="">Get Mobile App Link</a>
					<i class="fa fa-mobile fa-3x"></i></span>
				</div>
			</div>
					
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-5">
				<ul class="list-group">
					<li><a href="index.php">Home</a></li> 
					<li><a href="book.php">Book</a></li>			
				</ul>
			</div>
			
			<div class="col-md-3">
				<div style="padding-top:10px;float:right">
				<?php
				if(isset($_SESSION['login']))
				{
				?>	
				<div class="dropdown">		
					<label style="color:#fff;font-size:17px" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['name']; ?> <b class="caret"></b></label>
						<ul class="dropdown-menu">
							<li><a href=""><i class="fa fa-gear"></i> Account</a></li>
							<li><a href=""><i class="fa fa-building-o"></i> My Bookings</a></li>
							<li class="divider"></li>
							<li><a href="signout.php"><i class="fa fa-sign-out"></i> Signout</a></li>
						</ul>
				</div>
				<?php
				}
				else
				{
				?>
					<label style="color:#fff;font-size:17px"><a data-toggle="modal" data-target="#myModal">Login</a></label>
				<?php
				}
				?>
				</div>
			</div>
				
		</div>
	</div>
</nav>

<!-- Login Modal -->
<div id="myModal" class="modal fade" role="dialog" style="padding-top:50px">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<div class="row">
					<div class="col-md-10 col-md-offset-2">
						<button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
					</div>
				</div>
			
				<div class="row" style="padding-top:7px">
					<div class="col-xs-6">
						<a href="#" class="active" id="login-form-link">Login</a>
					</div>
					<div class="col-xs-6">
						<a href="#" id="register-form-link">Register</a>
					</div>
				</div>
				<hr>	
			</div>
		
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
				
				
						<form id="login-form" method="post" role="form" style="display: block;">
							<div id="msg" style="color:red"></div>
							<div class="form-group">
								<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="email or mobile no" value="">
							</div>
							<div class="form-group">
								<input type="password" name="pwd" id="pwd" tabindex="2" class="form-control" placeholder="password">
							</div>
							<div class="form-group text-center">
								<input type="checkbox" tabindex="3" class="" name="remember_me" id="remember_me">
								<label for="remember_me"> Remember Me</label>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-6 col-sm-offset-3">
										<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
									</div>
								</div>
							</div>
							
						</form>	
					
						<form id="register-form" method="post" role="form" style="display: none;">
							<div id="regmsg" style="color:red"></div>
							<div class="form-group">
								<input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="name" required>
							</div>
							<div class="form-group">
								<input type="text" name="mobile" id="mobile" tabindex="2" class="form-control" placeholder="mobile no" required>
							</div>
							<div class="form-group">
								<input type="email" name="email" id="email" tabindex="3" class="form-control" placeholder="email id" required>
							</div>
							<div class="form-group">
								<input type="password" name="password" id="password" tabindex="4" class="form-control" placeholder="password" required>
							</div>
							<div class="form-group">
								<input type="text" name="address1" id="address1" tabindex="5" class="form-control" placeholder="address 1" required>
							</div>
							<div class="form-group">
								<input type="text" name="address2" id="address2" tabindex="6" class="form-control" placeholder="address 2" required>
							</div>
							
							<div class="col-md-4">
							<div class="form-group">
								<input type="text" name="city" id="city" tabindex="7" class="form-control" placeholder="city" value="Chennai" required>
							</div>
							</div>
							<div class="col-md-4">
							<div class="form-group">
								<input type="text" name="state" id="state" tabindex="8" class="form-control" placeholder="state" value="Tamilnadu" required>
							</div>
							</div>
							<div class="col-md-4">
							<div class="form-group">
								<input type="text" name="pincode" id="pincode" tabindex="9" class="form-control" placeholder="pincode" required>
							</div>
							</div>
						
						
							<div class="form-group">
								<div class="row">
									<div class="col-sm-6 col-sm-offset-3">
										<input type="button" onclick="register()" name="register-submit" id="register-submit" tabindex="10" class="form-control btn btn-register" value="Register Now">
									</div>
								</div>
							</div>
						</form>	
					
					</div>
				</div>
			</div>
		
		</div>

	</div>
</div>
    
</body>
</html>