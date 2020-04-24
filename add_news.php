<?php
	include("includes/config.php");
    session_start();
	if(!isset($_SESSION['email'])){
	   header("Location: index.php");
	}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Add News</title>
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
	                <a class="nav-link" href="home.php">Display CauseList</a>
	            </li>
				<li class="nav-item">
	                <a class="nav-link" href="news.php">Display News</a>
	            </li>
	            <li class="nav-item">
	                <a class="nav-link" href="all_cases.php">Cases</a>
	            </li>
				<li class="nav-item">
	                <a class="nav-link" href="add_case.php">Add Case</a>
	            </li>
				<li class="nav-item">
	                <a class="nav-link" href="add_court.php">Add Court</a>
	            </li>
				<li class="nav-item">
	                <a class="nav-link" href="all_courts.php">All Courts</a>
	            </li>
				<li class="nav-item">
	                <a class="nav-link" href="all_news.php">All News</a>
	            </li>
				<li class="nav-item">
	                <a class="nav-link" href="add_news.php">Add News</a>
	            </li>
	            <li class="nav-item">
	                <form action="includes/logout.inc.php" method="POST">
	                    <button name="submit" type="submit" class="nav-link link">Logout</button>
	                </form>
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

				<div class="bootstrap-iso">
					<form action="includes/add.news.php" method="POST" enctype="multipart/form-data">
						<div class="form-group row">
						    <label for="title" class="col-sm-2 col-form-label form_label" style="color:black;">Title</label>
						    <div class="col-sm-8">
						    	<input type="text" name="title" class="form-control" required autofocus>
						    </div>
						</div>
						<div class="form-group row">
					    	<label for="content" class="col-sm-2 col-form-label form_label" style="color:black;">Content</label>
						    <div class="col-sm-8">
						        <textarea type="text" name="content" class="form-control" rows="6" style="resize:none;" required></textarea>
						    </div>
						</div>
		                <div class="form-group row"> <!-- Date input -->
					        <label class="col-sm-2 col-form-label form_label" for="date" style="color:black;">Date</label>
							<div class="col-sm-8">
					        	<input class="form-control" name="date" placeholder="MM/DD/YYYY" type="text">
							</div>
					    </div>
					  	<button name="submit" type="submit" class="btn btn-primary">Add News</button>
					</form>
				</div>
			</div>

		</section>
		<script>
		    $(document).ready(function(){
		    	var date_input=$('input[name="date"]'); //our date input has the name "date"
		    	var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		    	var options={
		        	format: 'mm/dd/yyyy',
			        container: container,
			        todayHighlight: true,
			        autoclose: true,
		    	};
		    	date_input.datepicker(options);
		    })
		</script>

<?php
	include("includes/footer.php");
?>
