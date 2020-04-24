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

                <h2>IN THE HIGH COURT OF JUSTICE OF NASARAWA STATE OF NIGERIA </br>HOLDING AT LAFIA </br> CAUSE LIST FOR <?php echo strtoupper($currentDateStr) ?></h2>

				<table width="100%" border="0" cellpadding="5" cellspacing="5" rules="all"style="border-color:LightGrey;border-style:Double;width:100%;">
					<tbody>
						<tr class="tables">
							<th style="width:28%; text-align:left;"><p class="table_th_p">SUIT NUMBER</p></th>
							<th style="width:31%; text-align:left;"><p class="table_th_p">PARTIES</p></th>
							<th style="width:25%; text-align:left;"><p class="table_th_p">NAME OF JUDGES</p></th>
							<th style="width:26%; text-align:left;"><p class="table_th_p">COURT_ROOM</p></th>
						</tr>
					</tbody>
				</table>
				<div id="display" onmouseover="pauseDiv()" onmouseout="resumeDiv()">
					<table width="100%" border="0" cellpadding="5" cellspacing="5" rules="all"style="border-color:LightGrey;border-style:Double;width:100%;">
						<?php
							$sql = "SELECT * FROM cases JOIN courts ON courts.court_room=cases.court_room  WHERE (`date`='$currentDate') ORDER BY cases.court_room;";

							$result = mysqli_query($conn, $sql);
							$resultcheck = mysqli_num_rows($result);
							if ($resultcheck > 0) {
								while ($row = mysqli_fetch_assoc($result)) {?>
									<tr class="table_row">
			                            <td style="width:28%; text-align:left;"; class="table_row_td"><p class="table_row_td_p"><?php echo $row['suit_number']; ?></p></td>
			                            <td style="width:31%; text-align:left;" class="table_row_td"><p class="table_row_td_p"><?php echo $row['parties']; ?></p></td>
			                            <td style="width:25%; text-align:left;" class="table_row_td"><p class="table_row_td_p"><?php echo $row['judges']; ?></p></td>
			                            <td style="width:25%; text-align:left;" class="table_row_td"><p class="table_row_td_p"><?php echo $row['court_room']; ?></p></td>
			                        </tr>
								<?php
							}
						} ?>
			        </table>
				</div>

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
