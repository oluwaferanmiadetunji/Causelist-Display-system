<?php
	include("includes/config.php");
?>
<html>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Cases</title>
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
        <section class="about" id="about">
            <div class="container text-center">
                <img src="img/n.png">
                <h2>NASARAWA STATE JUDICIARY</h2>
				<?php
					$currentDate = date('m/d/Y');
					$currentDateStr = date('l dS F, Y');
				?>

                <h2>NEWS</h2>

				<table class="table table-striped table-dark table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">S/N</th>
                            <th scope="col">TITLE</th>
                            <th scope="col">CONTENT</th>
                            <th scope="col">DATE</th>
                        </tr>
                    </thead>
                    <?php

                        if (isset($_GET['pageno'])) {
                            $pageno = $_GET['pageno'];
                        } else {
                            $pageno = 1;
                        }
                        $no_of_records_per_page = 10;
                        $offset = ($pageno-1) * $no_of_records_per_page;

                        // Check connection
                        if (mysqli_connect_errno()){
                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                            die();
                        }

                        $total_pages_sql = "SELECT COUNT(*) FROM news";
                        $result = mysqli_query($conn,$total_pages_sql);
                        $total_rows = mysqli_fetch_array($result)[0];
                        $total_pages = ceil($total_rows / $no_of_records_per_page);

                        $sql = "SELECT * FROM news ORDER BY date DESC LIMIT $offset, $no_of_records_per_page";
                        $res_data = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_array($res_data)){
                    ?>
                            <tbody>
                                <tr>
                                    <th scope="row"><?php echo $row['id']; ?></th>
                                    <td><?php echo $row['title']; ?></td>
                                    <td><?php echo $row['content']; ?></td>
                                    <td><?php echo $row['date']; ?></td>
                                    <td style="width:15px;">
                                        <a class="warning btn btn-secondary btn-outline-warning btn-sm" href="edit_news.php?edit=<?php echo $row['id']; ?>">Edit</a>
                                    </td>
                                    <td style="width:15px;">
                                        <a class="danger btn btn-secondary btn-outline-danger btn-sm" href="includes/delete.news.php?id=<?php echo $row['id']; ?>">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        <?php
                        }
                        mysqli_close($conn);
                    ?>
                    <ul class="pagination">
                        <li><a href="?pageno=1">First Page</a></li>
                        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev Page</a>
                        </li>
                        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next Page</a>
                        </li>
                        <li><a href="?pageno=<?php echo $total_pages; ?>">Last Page</a></li>
                    </ul>
                    </table>
                </div>
            </section>

            <?php include("includes/footer.php");?>

</body>
</html>
