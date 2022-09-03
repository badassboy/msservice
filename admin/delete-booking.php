<?php 

include("../functions.php");
$book = new Activities();

$booking_id = $_GET['trash'];

$deleted_booking = $book->deleteBooking($booking_id);
if ($deleted_booking) {
	echo '<div class="alert alert-success" role="alert">Deletion successful</div>';
}else {
	echo '<div class="alert alert-danger" role="alert">Deletion failed</div>';
}




?>