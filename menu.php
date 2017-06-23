<?php 
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html lang="en">
 <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
	<title>NEDO | Menu</title> 
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

	
	

	<div class="main-menu">
		<a href="journey.php">
			<div class="choice">
				<h2>JOURNEY</h2>
			</div>
		</a>
		<a href="craft.php">
			<div class="choice">
				<h2>CRAFT</h2>
			</div>
		</a>
		<a href="sale.php">
			<div class="choice">
				<h2>SALE</h2>
			</div>
		</a>
		<a href="inventory.php">
			<div class="choice">
				<h2>INVENTORY</h2>
			</div>
		</a>
	</div>



</body>
</html> 
