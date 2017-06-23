<?php 
session_start();
include_once("db.php");

postcheck_authorization();

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html lang="en">
 <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
	<title>Title Goes Here</title> 
	<link href="https://fonts.googleapis.com/css?family=Pangolin" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="css/style.css">
 </head>
<body class="myfont"> 

<div class="back"></div>
	<h1>NEDO GAME</h1>

	<form method="POST" >
		<label>Введите своё имя:</label><br>
		<input type="login" name="login" required>
		<input type="submit" value="START">
	</form>



</body>
</html> 
