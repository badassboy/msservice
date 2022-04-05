<?php  

include("../functions.php");
$ch = new Activities();

if (isset($_GET['delete'])) {
	
	$id = $_GET['delete'];
	$deleteInfo = $ch->deleteTrackingData($id);
	if ($deleteInfo) {
		echo '<div class="alert alert-success" role="alert">Info Deleted</div>';
	}else {
		echo '<div class="alert alert-danger" role="alert">Info deletion failed/div>';
	}
}




?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
   <link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.css">

</head>
<body>


<!-- jQuery CDN  -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	
	 <!-- Bootstrap JS -->
	<script type="text/javascript" src="bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>