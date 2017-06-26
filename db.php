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
function byefactory($id_factory)
{
	global $mysqli;
		$user = getUserByLogin($_SESSION["user"]["name"]);

		$query = "SELECT * FROM factory WHERE id=".$id_factory;
		$result = $mysqli->query($query); 
		$factory = null;
		while ($row = $result->fetch_assoc()) {
			$factory = $row;
			break;		    
		}

	if($user["gold"]>=$factory["gold"]) 
	{

		$query = "SELECT * FROM user_factory WHERE id_user=".$user["id"] . " AND id_factory=" . $id_factory ;
		$result = $mysqli->query($query); 
		$f = null;
		while ($row = $result->fetch_assoc()) {
			$f = $row;
			break;		    
		}
		if(count($f)!= 0)
			return;

		// требуеться проверка на уже купленную
		$query = "INSERT INTO `user_factory` (`id`, `id_user`, `id_factory`) VALUES (NULL, " . $user["id"] . ", " . $factory["id"] . ");"; 

		$result = $mysqli->query($query); 


		
		$query = "UPDATE `users` SET `gold` = gold - " . $factory["gold"] . " WHERE `users`.`id` = " . $user["id"]; 

		$result = $mysqli->query($query); 


		$_SESSION["user"] = getUserByLogin($_SESSION["user"]["name"]);
	}
	

}
function getCraftsFromFactory($id_factory)
{
	//SELECT items.id,items.name,items.discript,items.src,items.event_colus,items.drop_colus,craft.gold,(SELECT COUNT(*) FROM user_items WHERE user_items.id_items = items.id AND user_items.id_user = 1) as is_have ,(SELECT SUM(users.gold) >= craft.gold FROM users WHERE users.id = 1) as can_bye FROM craft INNER JOIN items ON items.id = craft.id_item WHERE id_factory = 1 ORDER BY is_have,can_bye ASC
	global $mysqli;
	$user_id = $_SESSION["user"]["id"];
		$query = "SELECT craft.id,items.name,items.discript,items.src,items.event_colus,items.drop_colus,craft.gold,(SELECT COUNT(*) FROM user_items WHERE user_items.id_items = items.id AND user_items.id_user = $user_id) as is_have ,(SELECT SUM(users.gold) >= craft.gold FROM users WHERE users.id = $user_id) as can_bye FROM craft INNER JOIN items ON items.id = craft.id_item WHERE id_factory = $id_factory ORDER BY is_have,can_bye ASC" ; 

		$result = $mysqli->query($query); 
		
	
		$mass;
		while ($row = $result->fetch_assoc()) {		
			$mass[] = $row;	    
		}
			return $mass;
}
 function upgraideItem($id_resp)
{
	global $mysqli;
	global $mysqli;
		$user = getUserByLogin($_SESSION["user"]["name"]);

		$query = "SELECT * FROM craft WHERE id=".$id_resp;
		$result = $mysqli->query($query); 
		$factory = null;
		while ($row = $result->fetch_assoc()) {
			$factory = $row;
			break;		    
		}

	if($user["gold"]>=$factory["gold"]) 
	{
		$query = "SELECT * FROM user_items WHERE id_items=" . $factory["id_item"] . " AND id_user=" . $user["id"];
		
		$result = $mysqli->query($query); 
		$item = null;
		while ($row = $result->fetch_assoc()) {
			$item = $row;
			break;		    
		}
		if($item != null)
		{
			$query = "UPDATE `user_items` SET lvl = lvl +1 WHERE id_items=" . $factory["id_item"] . " AND id_user=" . $user["id"]; 
			$result = $mysqli->query($query); 


			$query = "UPDATE `users` SET `gold` = gold - " . $factory["gold"] . "  WHERE  users.id = " . $user["id"]; 
			$result = $mysqli->query($query); 
			$_SESSION["user"] = getUserByLogin($_SESSION["user"]["name"]);
		}
	}
}
?>