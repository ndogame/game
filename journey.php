<?php 
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html lang="en">
 <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
	<title>NEDO | Journey</title> 
	<link href="https://fonts.googleapis.com/css?family=Pangolin" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/info-style.css">
 </head>
<body class="myfont"> 

<div class="back"></div>
	<a href="menu.php">
		<h1>NEDO GAME</h1>
	</a>

	<?php 
	include("user-info.php");
	?>
	
	<h2>JOURNEY</h2>
	<p>Choose zone:</p>

	<div class="main-menu">
		<a href="journey.php">
			<div class="choice">
				<h2>EASY</h2>
				<p>zoneid: 1</p>
			</div>
		</a>
		<a href="craft.php">
			<div class="choice">
				<h2>MEDIUM</h2>
				<p>zoneid: 2</p>
			</div>
		</a>
		<a href="sale.php">
			<div class="choice">
				<h2>HARD</h2>
				<p>zoneid: 3</p>
			</div>
		</a>
		
	</div>



</body>
</html> 
