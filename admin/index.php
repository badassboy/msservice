<?php

// include("../header.php");

include("../functions.php");

$msg = "";
$message = "";

$activity = new Activities();

if (isset($_POST['add'])) {
	
	$item = $_POST['item'];
	$depositor = $_POST['depositor'];
	$next_of_kin = $_POST['next_of_kin'];
	$tracking_id = $_POST['tracking_id'];
	$serial_number = $_POST['serial_number'];
	$weight = $_POST['weight'];
	$deposit_date = $_POST['deposit_date'];

	$gold_info = $activity->insertData($item,$depositor,$next_of_kin,$tracking_id,$serial_number,$weight,$deposit_date);
	if ($gold_info) {
		$msg = '<div class="alert alert-success" role="alert">Information sent</div>';
			
	}else {
		$msg = '<div class="alert alert-danger" role="alert">Error occured</div>';
			
	}
	
}


if (isset($_POST['shipping'])) {
	$shippingID = $_POST["shipping_id"];
	$shippingDate = $_POST["shipping_date"];
	$currentDestination = $_POST["location"];
	$shippingAddress = $_POST["address"];

	$send_details = $activity->shipping_details($shippingDate,$shippingID,$currentDestination,$shippingAddress);
	if ($send_details) {
		$message = '<div class="alert alert-success" role="alert">Information Sent</div>';
	}else {
		$message = '<div class="alert alert-danger" role="alert">Error occured</div>';
	}
}



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

	<!-- Customized Bootstrap Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">

    <style type="text/css">
    	.myForm{
    		/*background-color: yellow;*/
    		height: 500px;

    	}
    </style>
</head>
<body>

	<!-- Header Start -->
    <div class="jumbotron jumbotron-fluid mb-5">
        <div class="container text-center py-5">
            <h1 class="text-white display-3">ADMINISTRATION</h1>
           <!--  <div class="d-inline-flex align-items-center text-white">
               <p class="m-0"><a class="text-white" href="">ADMIN</a></p>
                <i class="fa fa-circle px-3"></i>
                <p class="m-0">ADMIN SECTION</p>
            </div> -->
        </div>
    </div>
    <!-- Header End -->

    <div class="container-fluid">

    	<div class="row">

  <div class="col-6 first">
  	<h5>Tracking Gold</h5>
  	    	<div class="myForm">

  	    		<?php

  	    		if (isset($msg)) {
  	    			echo $msg;
  	    		}


  	    		?>
  	    		<form method="post">

  				<div class="form-group">
  				<label>Item</label>
  				<select class="form-control" name="item" id="exampleFormControlSelect1" required>
  				      <option>Gold</option>
  				      <option>Diamond</option>
  				     
  				   </select>
  				</div>

  				<div class="form-group">
  				<label>Depositor</label>
  				<input type="text" name="depositor" class="form-control"  placeholder="depositor" required>
  				</div>

  				<div class="form-group">
  				<label>Next of kin</label>
  				<input type="text" name="next_of_kin" class="form-control"  placeholder="Next of kin" required>
  				</div>

  				<div class="form-group">
  				<label>Tracking ID</label>
  				<input type="text" name="tracking_id" class="form-control"  placeholder="Tracking ID" required>
  				</div>

  				<div class="form-group">
  				<label>Destination</label>
  				<input type="text" name="serial_number" class="form-control"  placeholder="Serial Number" required>
  				</div>

  				<div class="form-group">
  				<label>Location</label>
  				<input type="text" name="weight" class="form-control"  placeholder="Weight" required>
  				</div>

  				<div class="form-group">
  				<label>Shipping Date</label>
  				<input type="date" name="deposit_date" class="form-control"  placeholder="Date of deposit" required>
  				</div>


  				<button type="submit" name="add" class="btn btn-primary">Submit</button>

  		</form>
  	    	</div>
  </div>

  <div class="col-6 second">
  	<h5>Tracking Shipping</h5>
  	<div class="myForm">

    		<?php

    		if (isset($message)) {
    			echo $message;
    		}


    		?>
    		<form method="post">

			
    			<div class="form-group">
			<label>Shipping Date</label>
			<input type="date" name="shipping_date" class="form-control"  placeholder="Date of deposit" required>
			</div>
			

			<div class="form-group">
			<label>Shipping ID</label>
			<input type="text" name="shipping_id" class="form-control"  placeholder="Tracking ID" required>
			</div>

			<div class="form-group">
			<label>Current Location</label>
			<input type="text" name="location" class="form-control"  placeholder="Current Location" required>
			</div>

			<div class="form-group">
			<label>Destination Address</label>
			<input type="text" name="address" class="form-control"  placeholder="Destination Address" required>
			</div>

			


			<button type="submit" name="shipping" class="btn btn-primary">Send</button>

	</form>
    	</div>
  </div>

</div>

    	
			

			


    	<!-- end -->
    	
    </div>



      <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

</body>
</html>

 

   
  
    




