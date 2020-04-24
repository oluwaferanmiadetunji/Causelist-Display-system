<?php
	include("includes/config.php");
    session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Add Courts</title>
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

				<div class="">
					<form action="includes/add.court.inc.php" method="POST">
						<div class="form-group row">
						    <label for="court" class="col-sm-2 col-form-label" style="color:black;">Court Room</label>
						    <div class="col-sm-8">
						    	<select id="inputState" name="court_room" class="form-control">
		                            <option style="display:none" disabled selected value>Choose court room...</option>
		                            <option>1</option>
		                            <option>2</option>
		                            <option>3</option>
		                            <option>4</option>
									<option>5</option>
		                            <option>6</option>
		                            <option>7</option>
		                            <option>8</option>
									<option>9</option>
		                            <option>10</option>
		                            <option>11</option>
		                            <option>12</option>
									<option>13</option>
		                            <option>14</option>
		                            <option>15</option>
		                            <option>16</option>
									<option>17</option>
		                            <option>18</option>
									<option>19</option>
		                            <option>20</option>
		                        </select>
						    </div>
						</div>
						<div class="form-group row">
					    	<label for="judges" class="col-sm-2 col-form-label" style="color:black;">Judges</label>
						    <div class="col-sm-8">
						      <input name="judges" type="judges" class="form-control" placeholder="Enter name(s) of Judge(s) for the court, seperated by commas" id="judges">
						    </div>
						</div>
					  	<button name="submit" type="submit" class="btn btn-primary">Add</button>
					</form>
				</div>
			</div>

		</section>

		<?php
			include("includes/footer.php");
		?>
