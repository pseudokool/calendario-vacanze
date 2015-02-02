<?php
	ini_set('display_errors', 0);
?>
<html>
<head>   
	<title>The Only Calendar You'll Ever Need</title>
	<link href="css/style.css" type="text/css" rel="stylesheet" />
	<link rel="stylesheet" media="print" href="css/style.print.css" />
	<script src="js/jquery-1.11.2.min.js"></script>
	<script src="js/script.js" ></script>

</head>
<body>
	<div id="container">
		<div class="title-container">
			<span class="title-first">T</span><span class="title">he</span> 
			<span class="title-first">O</span><span class="title">nly</span> 
			<span class="title-first">2015</span><span class="title"></span> 
			<span class="title-first">C</span><span class="title">alendar ...</span>
			<span class="title"> <i>you'll ever need</i></span><span class="title"></span>
		</div>
	<?php include 'class.calendar.php';

		for($aMonthCtr=1;$aMonthCtr<=12;$aMonthCtr++){
			$aMonth = new Month();
			echo $aMonth->show(2015, $aMonthCtr);
			
			//if($aMonthCtr==6) echo '<div class="clear"></div><br/>';
		}


	?>
	</div>	

	<div class="copy">
		
		<br/><br/>
		<h3>How to use this calendar</h3>
		<ol>
			<li>Our lives has shrunk down to weekends. That's when we get time to pursue what we really would like to spend time on (assuming that your favorite pastime is not doing something that just makes money for you). Hence this calendar puts your time in the right perspective. Weekend should be how you start.</li>
			<li>The calendar is made for you to customise :
				<ol type="i">
					<li>you can unselect any day that is not a holiday for you or is not important for you. Like Saturdays. If you don't have a 5-day week, unselect the Saturdays.</li>
					<li>highlight and select any days</li> 
				</ol>
			</li>
		</ol>	

		<br/>

		<h3>Holidays 2015</h3>
		<div class="">
			<table>
				<?php
					$singleMonth = new Month();
					$alltheHolidays = $singleMonth->GetHolidays();
					
					foreach ($alltheHolidays as $date => $event) {
				?>		
				<tr>
					<td>
						<?php echo $date; ?>
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
					
</body>
</html> 