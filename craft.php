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

	 foreach (getUserFactory($_SESSION["user"]["id"]) as $key => $value): ?>
				<?php
				
				if($value['is_hew'] == 0)
				{
				 echo '<a href="http://ndogame/game/craft.php?bye='. $value['id'] . '">';
				}
				else {
				 echo '<a href="http://ndogame/game/craft.php?show='. $value['id'] . '">';
				}
				?>
			<div class="choice" style="display: inline-block; width: 300px; height: 300px; float: none;margin: 5px">


				<img style="width: 200px; height: 100px;" src="<?php echo $value['src']; ?>" />
			
				<h2><?php echo $value['name']; ?></h2>
				<p><?php echo $value['text']; ?></p>
				<h2>
				<?php
				
				if($value['is_hew'] == 0)
				{
				 echo 'Buy for :' . $value['gold'];
				}
				else {
				 echo 'Show crafts';
				}
				?>
				</h2>
				
			</div>
			</a>
	<?php endforeach; ?>
	</div>



</body>
</html> 
