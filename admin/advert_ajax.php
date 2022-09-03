<?php

include("../database.php");
$db = DB();

$json = array();

$stmt = $db->prepare("SELECT * FROM booking");
$stmt->execute();
while($result = $stmt->fetch(PDO::FETCH_ASSOC)){

	$id = $result['id'];
	
	$trash = '<a href="delete-booking.php?trash='.$id.'">
				<i class="fa fa-trash" aria-hidden="true"></i>
			  </a>';
	$edit = '<a href="edit-latest.php?edit='.$id.'">
				<i class="fa fa-pencil" aria-hidden="true"></i>
			  </a>';



	

	$artiste_name = $result['artiste_name'];
	$mobile = $result['mobile'];
	$genre = $result['genre'];
	$title = $result['song_title'];
	$cost = $result['cost'];
	$track = $result['tracks'];
	$booking_date = $result['booking_date'];
	

	$json[] = array(
		
		"artiste" => $artiste_name,
		"mobile" => $mobile,
		"genre" => $genre,
		"title" => $title,
		"cost" => $cost,
		"track" => $track,
		"book_date" => $booking_date,
		"edit" => $edit,
		"delete" => $trash
		
	);
		
}

// Echoinh array in json format
echo json_encode($json);

?>







