<?php 

include("header.php");
include("functions.php");
$book = new Activities();

$artiste_name = $mobile =$email = $genre = "";

if (isset($_POST['book'])) {
	

	$artiste_name = $book->testInput($_POST['artiste_name']);
	$mobile = $book->testInput($_POST['phone']);
	$email = $book->testInput($_POST['email']);
	$genre = $book->testInput($_POST['genre']);
	$title = $book->testInput($_POST['title']);
	$tracks = $book->testInput($_POST['tracks']);
	$cost = $book->testInput($_POST['cost']);
	$booking_date = $book->testInput($_POST['booking_date']);

	$user_booking = $book->studioBooking($artiste_name,$mobile,$email,$genre,$title,$tracks,$cost,$booking_date);
	if ($user_booking) {
		echo "<script>alert('booking successful')</script>";
        // clear form data


	


		


	}else{
		echo "<script>alert('booking failed')</script>";

	}
	
}





?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
    <link rel="stylesheet" type="text/css" href="css/booking.css">

	
</head>
<body>

	 <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid mb-5">
        <div class="container text-center py-5">
            <h1 class="text-primary mb-4">MS SERVICE & TRADE CONSULT</h1>
            <h5 class="text-white display-5 mb-4">IT Solution,Music Production & General Trading</h5>
           
            <div class="mx-auto" style="width: 100%; max-width: 600px;">

                <form method="post" action="shipping_result.php">
                    <div class="input-group">
    <input type="text" class="form-control border-light" style="padding: 30px;" placeholder="Tracking Number" name="user_input" required>
                    <div class="input-group-append">
    <button type="submit" class="btn btn-primary px-3" name="search">Track & Trace</button>
                    </div>
                </div> 
                </form>

            </div>
               

        </div>
    </div>
    <!-- Header End -->

    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-center">

            <div class="col-lg-12 pb-4 pb-lg-0">
                <h4>Fill below form to book your studio section</h4>
           <form method="post" id="myform">
  <div class="form-group">
    <label class="control-label">Artiste Name</label>
    <input type="text" class="form-control" name="artiste_name" id="artiste" placeholder="Artiste Name" required>
  </div>

  <div class="form-group">
    <label class="control-label">Mobile Number</label>
    <input type="text" class="form-control" name="phone" placeholder="Mobile Number" required>
  </div>

  <div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" name="email" placeholder="Email" required>
  </div>

  <div class="form-group">
    <label class="control-label">Genre</label>
     <select class="form-control" name="genre">
      <option value="hiplife">HipLife</option>
      <option value="hilife">HiLife</option>
      <option value="gospel">Gospel</option>
      <option value="dancehall">Dancehall</option>
      <option value="reggae">Reggae</option>
    </select>
  </div>

   <div class="form-group">
    <label class="control-label">Song Title</label>
    <input type="text" class="form-control" name="title" placeholder="Song title" required>
  </div>

   <div class="form-group">
    <label class="control-label">Number of tracks</label>
    <input type="text" class="form-control" name="tracks" placeholder="Number of tracks" required>
  </div>

   <div class="form-group">
    <label class="control-label">Cost</label>
     <select class="form-control" name="cost">
      <option value="30mins-">30mins-</option>
      <option value="1hr-">1hr-</option>
      <option value="2hrs-">2hrs-</option>
     
    </select>
  </div>

   <div class="form-group">
    <label class="control-label">Booking Date</label>
    <input type="date" class="form-control" name="booking_date">
  </div>

 <button type="submit" class="btn btn-primary" name="book">Submit</button>
</form>
                </div>

               


            </div>
        </div>
        
    </div>
    <!-- About End -->

 <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
             $('#myform').submit(function(){
            $('#myform')[0].reset();
        });
    });
       
       
    </script>



</body>
</html>