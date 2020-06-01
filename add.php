<?php 

require_once 'init.php';

if(isset($_POST['name'])){
	$name = trim($_POST['name']);

	if (!empty($name)) {
		$addedQuery = $db->prepare("
			INSERT INTO item (description, isdone, createdt)
			VALUES (:name, 0, NOW())
			");

		$addedQuery->execute([

			'name' => $name,		
		]);
	}
}





header('Location: index.php');

?>