<?php

include("../database.php");
$db = DB();

$json = array();

$stmt = $db->prepare("SELECT * FROM tracking");
$stmt->execute();
while($result = $stmt->fetch(PDO::FETCH_ASSOC)){

	$id = $result['id'];
	
	$trash = '<a href="delete_track.php?delete='.$id.'">
				<i class="fa fa-trash" deleteId="'.$id.'" aria-hidden="true"></i>
			  </a>';
	$edit = '<a href="update_venue.php?edit='.$id.'">
				<i class="fa fa-pencil" aria-hidden="true"></i>
			  </a>';



	

	$firstName = $result['firstName'];
	$lastName = $result['lastName'];
	$phone = $result['mobile'];
	$email = $result['email'];
	$track_number = $result['track_number'];
	$location = $result['venue'];

	$json[] = array(
		
		"first" => $firstName,
		"last" => $lastName,
		"phone" => $phone,
		"email" => $email,
		"track" => $track_number,
		"venue" => $location,
		"edit" => $edit,
		"delete" => $trash
		
	);
		
}

// Echoinh array in json format
echo json_encode($json);

?>







