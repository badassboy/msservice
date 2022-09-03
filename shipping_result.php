<?php

include("header.php");

include("functions.php");

$location = "";

$activity = new Activities();

if (isset($_POST['search'])) {

    $item = $_POST['user_input'];
    // $item = "288";
    // echo $item;

    $display = $activity->itemTracking($item);
    

   


	
	
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
            <h1 class="text-white display-3">SHIPPING DETAILS</h1>
            <div class="d-inline-flex align-items-center text-white">
                <!-- <p class="m-0"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-circle px-3"></i>
                <p class="m-0">Service</p> -->
            </div>
        </div>
    </div>
    <!-- Header End -->
	

   
   		<ul class="list-group">

            <?php  

                if (is_array($display)) {
        
        foreach ($display as $value) {
            
                $location = $value['venue'];
            echo '<li class="list-group-item">Current item location: '.$location.'</li>';
            
           
        }
    }else {
        echo '<li class="list-group-item">No result found</li>';
    }
             

        ?>
  
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
	





	







