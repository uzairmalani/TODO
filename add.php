<?php 

require_once 'init.php';

if (isset($_GET['n'])){

 	$n = $_GET['n'];

 
}

if(isset($_POST['name'])){
	$name = trim($_POST['name']);
	
	if (!empty($name)) {
		$addedQuery = $db->prepare("
			INSERT INTO item (description, isdone, createdt, itemPosition)
			VALUES (:name, 0, NOW(), $n)
			");

		$addedQuery->execute([

			'name' => $name,		
		]);
	}
}





header('Location: index.php');


?>