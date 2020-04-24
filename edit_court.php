<?php
	include("includes/config.php");
    session_start();
	if(!isset($_SESSION['email'])){
	   header("Location: index.php");
	}
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$sql = "SELECT * FROM courts WHERE id=$id;";
		$result = mysqli_query($conn, $sql);
		$resultcheck = mysqli_num_rows($result);
		if ($resultcheck > 0) {
			$row = mysqli_fetch_assoc($result);
			$court = $row['court_room'];
			$judges = $row['judges'];
		}
	}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Edit Court</title>
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

				<div class="bootstrap-iso case_form">

					<form action="includes/update.court.php" method="POST">

						<input type="hidden" name="id" value="<?php echo $id; ?>">

						<div class="form-group row">
						    <label for="court_room" class="col-sm-2 col-form-label form_label" style="color:black;">Court Room</label>
						    <div class="col-sm-8">
						    	<input type="text" name="court_room" class="form-control" required autofocus value="<?php echo $court; ?>">
						    </div>
						</div>
						<div class="form-group row">
					    	<label for="judges" class="col-sm-2 col-form-label form_label" style="color:black;">Judges</label>
						    <div class="col-sm-8">
						        <input type="text" name="judges" class="form-control"  value="<?php echo $judges; ?>">
						    </div>
						</div>
					  	<button name="submit" type="submit" class="btn btn-primary">Update</button>
					</form>
				</div>
			</div>

		</section>


<?php
	include("includes/footer.php");
?>
