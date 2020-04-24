<?php
	include("includes/config.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Home</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script src="js/jquery.min.js" type="text/javascript"></script>
		<link rel="stylesheet" href="css/bootstrap-iso.css">
		<script src="js/date-picker.min.js" type="text/javascript"></script>
		<link rel="stylesheet" href="css/date-picker.css">

		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/custom.css">
    </head>
    <body onload="scrollDiv_init()">
        <div>
            <div class="container text-center">
                <img style="margin-top:5px;" src="img/n.png">
				<?php
					$currentDate = date('m/d/Y');
					$currentDateStr = date('l, dS F, Y');
				?>
                <h2>NEWS FOR  <?php echo strtoupper($currentDateStr) ?></h2>
				<section class="about" id="about" style="border: 1px;overflow:scroll;">
                    <div class="container text-center">
                        <div id="display">
                            <?php
    							$sql = "SELECT * FROM news WHERE `date`='$currentDate' ORDER BY title;";

    							$result = mysqli_query($conn, $sql);
    							$resultcheck = mysqli_num_rows($result);
    							if ($resultcheck > 0) {
    								while ($row = mysqli_fetch_assoc($result)) {?>
                                        <div class="">
                                            <h3><?php echo $row['title']; ?></h3>
                                            <p style="width:90%;text-align:justify"><?php echo $row['content']; ?></p>
                                        </div>
    								<?php
    							}
    						} ?>
                        </div>
                    </div>
                </section>

            </div>
        </div>
        <script type="text/javascript">
			ScrollRate = 200;
            function scrollDiv_init () {
                DivElmnt = document.getElementById('display');
                ReachedMaxScroll = false;

                DivElmnt.scrollTop = 0;
                PreviousScrollTop = 0;
                ScrollInterval = setInterval('scrollDiv()', ScrollRate);
            }
            function scrollDiv() {
                if (!ReachedMaxScroll) {
                    DivElmnt.scrollTop = PreviousScrollTop;
                    PreviousScrollTop++;

                    ReachedMaxScroll = DivElmnt.scrollTop >= (DivElmnt.scrollHeight - DivElmnt.offsetHeight);
                }
                else {
                    ReachedMaxScroll = (DivElmnt.scrollTop == 0)?false:true;

                    DivElmnt.scrollTop = PreviousScrollTop;
                    PreviousScrollTop--;
                }
            }
            function pauseDiv(){
                clearInterval(ScrollInterval);
            }
            function resumeDiv(){
                PreviousScrollTop = DivElmnt.scrollTop;
                ScrollInterval = setInterval('scrollDiv()', ScrollRate);
            }
		</script>

        <?php include("includes/footer.php");?>
