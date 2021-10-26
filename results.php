<?php

include("header.php");

if (isset($_POST['search'])) {

    $item = $_POST['user_input'];
	
	// get the content of the json data
	$json_data = file_get_contents("data.json");

	$jsonObject = json_decode($json_data,true);

	$ids = getTrackingIds($jsonObject, $item);

	if (count($ids)>0) {
		$name = $ids['name'];
		$designate = $ids['designation'];
	}else {
		echo "empty array";
	}
}
	
	
	
	
	



function getTrackingIds(Array $myArr, $user_input){

	if (is_array($myArr)) {
		foreach($myArr as $arr){
			foreach($arr as $i){
				if ($i["tracking_id"] == $user_input) {
					

					return $i;

				}

			}
			

		}
	}

	
}


				
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>


<!-- Header Start -->
    <div class="jumbotron jumbotron-fluid mb-5">
        <div class="container text-center py-5">
            <h1 class="text-white display-3">Service</h1>
            <div class="d-inline-flex align-items-center text-white">
                <p class="m-0"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-circle px-3"></i>
                <p class="m-0">Service</p>
            </div>
        </div>
    </div>
    <!-- Header End -->
	
<div class="card" style="width: 18rem;">
  <img src="img/gold.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $name; ?></h5>
    <p class="card-text">
    <?php echo $designate; ?>
    </p>
    
  </div>
</div>

	

<!-- Footer Start -->
    <?php include("footer.php"); ?>
       <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>


</body>
</html>
	





	







