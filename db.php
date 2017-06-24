<?php 

$mysqli = new mysqli("localhost", "root", "", "game");


function postcheck_authorization(){

	if(isset($_POST["login"])){

		$user = auth($_POST["login"]);	

		$_SESSION["user"] = $user;

		header("Location: menu.php");
	}
}



function auth($login){
	
	$user = getUserByLogin($login);
	
	
	$res = null;
	if($user==null)
		$res = addUser($login);	//Новый юзер
	else 
		$res = $user;// Старый юзер

	return $res;	
}

function addUser($login){
	global $mysqli;
		$query = "INSERT INTO `game`.`users` (`id`, `name`, `gold`, `hp`) VALUES (NULL, '".$login."', '0', '100');"; 

		$result = $mysqli->query($query); 
		

		$user = getUser($mysqli->insert_id);

		return $user;
}


function getUserByLogin($login){

		global $mysqli;
		$query = "SELECT * FROM users WHERE name='".$login."'"; 

		$result = $mysqli->query($query); 
		
		

		$user = null;
		while ($row = $result->fetch_assoc()) {
			

			$user = $row;
			break;		    
		}
		return $user;
	}	
function getUser($id){

		global $mysqli;
		$query = "SELECT * FROM users WHERE id=$id"; 

		$result = $mysqli->query($query); 
		
		

		$user = null;
		while ($row = $result->fetch_assoc()) {			

			$user = $row;
			break;		    
		}
		return $user;
	}

function getUserFactory($id)
{
	//
	global $mysqli;
		$query = "SELECT factory.id,factory.name,factory.text,factory.src,factory.gold, (select COUNT(*) from user_factory where user_factory.id_factory = factory.id AND user_factory.id_user = $id) as is_hew FROM `factory`"; 

		$result = $mysqli->query($query); 
		
	
		$mass;
		while ($row = $result->fetch_assoc()) {		
			$mass[] = $row;	    
		}
			return $mass;
}
?>