 <?php
require_once 'init.php';


$position = $_POST['position'];


$i=1;
foreach($position as $k=>$v){
	$itemsQuery = $db->prepare("
  	UPDATE item
  	SET itemPosition = $i
  	WHERE Id = $v
  	");

	$itemsQuery->execute([

    'user' => $_SESSION['user_id']
	]);
  


	$i++;
}


?>

	// $list = $_POST['list'];

	// $output = array();
	// $list =parse_str($list, $output);

	// $a = implode(',', $output['item']);
	
	// echo $a;
	
// foreach ($_POST["value"] as $key => $value) {
// 	$data["itemPosition"]=$key+1;
// 	updatePosition($data, $value);

// }
// echo "Sorting Done";

// function updatePosition($data,$id){

//     $con=  mysqli_connect("localhost", "root", "root", "todo");
//     if(array_key_exists("Name", $data)){
//         $data["Name"]=$this->real_escape_string($data["Name"]);
//     }
//     foreach ($data['value'] as $order => $id) {
//         $value="'$value'";
//         $updates="$order";
//     }
//     $imploadAray=  implode(",", $updates);
//     $query="Update item Set itemPosition = $updates Where Id=$id";
//     $result=  mysqli_query($con,$query) or die(mysqli_error($con));
//         if($result){
//             return "Category is position";
//         }
//         else
//         {
//             return "Error while updating position";
//         }
// }
