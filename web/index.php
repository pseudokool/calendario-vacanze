<?php
	ini_set('display_errors', 0);
?>
<html>
<head>   
	<title>The Weekend Rescuer 2015</title>
	<link href="css/style.css" type="text/css" rel="stylesheet" />
	<link rel="stylesheet" media="print" href="css/style.print.css" />
	<script src="js/jquery-1.11.2.min.js"></script>
	<script src="js/script.js" ></script>

</head>
<body>
		

	<!-- container-wrap -->
	<div id="container-wrap">
		
		<center>
			<div class="mastheader"></div>
			<!--img class="masthead" src="images/header.jpg" height="80px" /-->
		</center>	

		<div id="container">
			<div class="title-container">
				
				<!--span class="title-first">T</span><span class="title">he</span> 
				<span class="title-first">O</span><span class="title">nly</span> 
				<span class="title-first"><?php echo date('Y', time()); ?></span><span class="title"></span> 
				<span class="title-first">C</span><span class="title">alendar ...</span>
				<span class="title"> <i>you'll ever need</i></span><span class="title"></span-->
			</div>
			<?php include 'class.calendar.php';

				for($aMonthCtr=3;$aMonthCtr<=12;$aMonthCtr++){
					$aMonth = new Month();
					echo $aMonth->show(date('Y', time()), $aMonthCtr);
					
					//if($aMonthCtr==6) echo '<div class="clear"></div><br/>';
				}

				for($aMonthCtr=1;$aMonthCtr<=2;$aMonthCtr++){
					$aMonth = new Month();
					echo $aMonth->show(date('2016'), $aMonthCtr);
					
					//if($aMonthCtr==6) echo '<div class="clear"></div><br/>';
				}


			?>
		</div>	
	</div> <!-- /container-wrap -->
		
	<div class="copy">
		
		<h3>How to use this calendar</h3>
		<?php
			include('how-to-use.php');
		?>	

		<br/>

		<h3>Holidays 2015</h3>
		<div class="div_holiday_listing">
			<table class="tbl_holiday_listing" cellpadding="5" cellspacing="5">
				<?php
					$singleMonth = new Month();
					$alltheHolidays = $singleMonth->GetHolidays();
					
					foreach ($alltheHolidays as $date => $event) {
				?>		
				<tr>
					<td>
						<?php echo date('j\<\s\u\p\>S\<\/\s\u\p\> F, Y', strtotime($date)); ?>
					</td>
					<td>
						<strong><?php echo $event; ?></strong>
					</td>
				</tr>
				<?php

						$halfWayCtr++;
					}
				?>
			</table>

			<table class="tbl_holiday_listing" cellpadding="5" cellspacing="5">
				<?php
					$singleMonth = new Month();
					$alltheHolidays = $singleMonth->GetHolidays();
					$halfWay = count($alltheHolidays)/2;
					$halfWayCtr = 0;
					foreach ($alltheHolidays as $date => $event) {
						if($halfWayCtr<$halfWay) {
							$halfWayCtr++;
							continue;
						}		
				?>		
				<tr>
					<td>
						<?php echo date('j\<\s\u\p\>S\<\/\s\u\p\> F, Y', strtotime($date)); ?>
					</td>
					<td>
						<strong><?php echo $event; ?></strong>
					</td>
				</tr>
				<?php
						
					}
				?>
			</table>
		</div>

		<div class="clear"></div>
		<!-- div class="footer-container">
			<a href="#" class="social_links">
				<img src="images/ico-tw.png" width="48" align="absmiddle" />
			</a>
			<a href="#" class="social_links">
				<img src="images/ico-fb.png" width="48" align="absmiddle" />
			</a>
			<a href="#" class="social_links">
				<img src="images/ico-g+.png" width="48" align="absmiddle" />
			</a>
		</div-->
	

	</div>

	<div class="footer">
		<center>
			&copy; The Weekend Rescuer, 2015
		</center>
	</div>	

					
</body>
</html> 