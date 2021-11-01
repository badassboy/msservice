<?php

include("header.php");

include("functions.php");

$activity = new Activities();

if (isset($_POST['search'])) {

    $item = $_POST['user_input'];

    $display = $activity->user_search($item);

    if (count($display)>0) {
    	
    	foreach ($display as $value) {
    		$item_name = $value['item'];
    		$item_depositor = $value['depositor'];
    		$item_next_of_kin = $value['next_of_kin'];
    		$item_serial_number = $value['serial_number'];
    		$item_weight = $value['weight'];
    		$tracking_date = $value['tracked_date'];
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
	

    
   		<ul class="list-group">
  <li class="list-group-item">Item Deposited: <?php echo $item_name; ?></li>
  <li class="list-group-item">Depositor: <?php echo $item_depositor; ?></li>
  <li class="list-group-item">Next of Kin: <?php echo $item_next_of_kin; ?></li>
  <li class="list-group-item">Serial Number:<?php echo $item_serial_number; ?></li>
  <li class="list-group-item">Weight:<?php echo $item_weight; ?></li>
  <li class="list-group-item">Date:<?php echo $tracking_date; ?></li>
</ul>
    
    
  

	

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
	





	







