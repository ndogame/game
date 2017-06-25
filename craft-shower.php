<?php 
session_start();
include_once("db.php");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html lang="en">
 <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
	<title>NEDO | Craft</title> 
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
	
	<h2>CRAFT</h2>
	<p>Choose factory:</p>

	<div class="main-menu">
	<?php
	$value = getCraftsFromFactory($_GET["show"]);
	 for ($i=count($value)-1; $i >= 0; $i--): ?>
				<div class="choice" style="display: inline-block; width: 300px; height: 300px; float: none;margin: 5px">


				<img style="width: 200px; height: 100px;" src="<?php echo $value[$i]['src']; ?>" />
			
				<h2><?php echo $value[$i]['name']; ?></h2>
				<p><?php echo $value[$i]['string']; ?></p>
				<?php 
				if($value[$i]['is_have'] != 0 && $value[$i]['can_bye'] != 0 )
				{
					echo  "<h2>Improve for :" . $value[$i]['gold'] . "</h2>";
				}
				elseif ($value[$i]['is_have'] != 0 && $value[$i]['can_bye'] == 0 )
				{
					echo  "<h2>Need more gold</h2>";
				}
				else
				{
					echo  "<h2>Need an item</h2>";
				}
				?>
			</div>
	<?php endfor; ?>
	</div>



</body>
</html> 
