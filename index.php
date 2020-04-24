<?php
	include("includes/config.php");
    session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Login</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script src="js/jquery.min.js" type="text/javascript"></script>
		<link rel="stylesheet" href="css/bootstrap-iso.css">
		<script src="js/date-picker.min.js" type="text/javascript"></script>
		<link rel="stylesheet" href="css/date-picker.css">

		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/custom.css">
    </head>
    <body>
		<div class="">
	        <ul class="nav nav-tabs">
	            <li class="nav-item">
	                <a class="nav-link" href="register.php">Register</a>
	            </li>
	        </ul>
	    </div>
		<section class="hero">
			<div class="container text-center">
				<div class="row">
					<div class="col-md-12">
						<a class="hero-brand"><img src="img/n.png"></a>
					</div>
				</div>

				<div class="">
					<form action="includes/login.inc.php" method="POST" novalidate>
						<div class="form-group row">
						    <label for="email" class="col-sm-2 col-form-label" style="color:black;">Email</label>
						    <div class="col-sm-8">
						    	<input name="email" type="email" class="form-control" id="email" autofocus>
						    </div>
						</div>
						<div class="form-group row">
					    	<label for="password" class="col-sm-2 col-form-label" style="color:black;">Password</label>
						    <div class="col-sm-8">
						      <input name="password" type="password" class="form-control" id="password">
						    </div>
						</div>
					  	<button name="submit" type="submit" class="btn btn-primary">Sign in</button>
					</form>
				</div>
			</div>

		</section>

		<?php
			include("includes/footer.php");
		?>
