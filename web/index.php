<?php
	ini_set('display_errors', 1);
?>
<html>
<head>   
	<title>The Only Calendar You'll Ever Need</title>
	<link href="css/style.css" type="text/css" rel="stylesheet" />
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
			
			if($aMonthCtr==6) echo '<div class="clear"></div><br/>';
		}


	?>
		<div class="clear"></div>
		<div class="footer-container">
			<a href="#" class="social_links">
				<img src="images/ico-tw.png" width="48" align="absmiddle" />
			</a>
			<a href="#" class="social_links">
				<img src="images/ico-fb.png" width="48" align="absmiddle" />
			</a>
			<a href="#" class="social_links">
				<img src="images/ico-g+.png" width="48" align="absmiddle" />
			</a>
		</div>
	</div>	
</body>
</html> 