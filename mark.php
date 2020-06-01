<?php 

require_once 'init.php';

if (isset($_GET['as'], $_GET['item'])) {

	$as = $_GET['as'];
	$item = $_GET['item'];


		switch ($as) {
			case 'done':
				$doneQuery = $db->prepare("
					UPDATE item
					SET isdone=1
					WHERE Id= :item
					");

				$doneQuery->execute([
					'item' => $item
				]);
				break;
		}
}
header('Location: index.php');

?>