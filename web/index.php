<html>
<head>   
<link href="css/style.css" type="text/css" rel="stylesheet" />
<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/script.js" ></script>

</head>
<body>
	<div id="container">
		<div>
			<span class="title-first">T</span><span class="title">he</span> 
			<span class="title-first">U</span><span class="title">ltimate</span> 
			<span class="title-first">W</span><span class="title">eekend</span> 
			<span class="title-first">C</span><span class="title">alendar</span>
		</div>
	<?php include 'class.calendar.php';

		for($aMonthCtr=1;$aMonthCtr<=12;$aMonthCtr++){
			$aMonth = new Month();
			echo $aMonth->show(2015, $aMonthCtr);
			//echo '<div class="clear"></div><br/>';

		}


	?>
	</div>	
</body>
</html> 