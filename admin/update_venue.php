<?php

require("../database.php");
$db = DB();
$id = "";

$msg = "";
	
	$id = $_GET['edit'];

	if (isset($id)) {


		$stmt = $db->prepare("SELECT * FROM tracking WHERE id = ?");
		$stmt->execute([$id]);
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $tracking_id = $row['id'];
			
		}
	}else {
		echo  "no";
	}


    if(isset($_POST['update'])){

        
        $venue = $_POST['venue'];
        $id = $_POST['id'];

        $stmt = $db->prepare("UPDATE tracking SET venue = ? WHERE id = ?");
		$stmt->execute([$venue,$id]);
		$row = $stmt->rowCount();
		if ($row>0) {
			$msg = '<div class="alert alert-success" role="alert">Venue Updated</div>';
		}else {
			$msg =  '<div class="alert alert-danger" role="alert">Failed to update venue</div>';
		}


    }


?>




<!DOCTYPE html>
<html>
<head>
	<title></title>
   <link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.css">

   <style type="text/css">
   	
   	*{
   		margin: 0;
   		padding: 0;
   		box-sizing: border-box;
   		font-family: 'Raleway', sans-serif;
   	}

   	

   	.edit-page{

   		background-color:#f2f2f2;
   		height: 800px;
   		display: flex;
   	   flex-direction: row;
   	   flex-wrap: wrap;
   	   justify-content: center;
   	   align-items: center;

   	}


   	.edit-form {
   		background-color: hsl(0, 0%, 100%);
   		height: 350px;
   		width: 50%;
   		padding-top: 3%;

   	}

   	.edit-form h3 {
   		padding-top: 7%;
   		padding-left: 30%;
   		padding-bottom: 1%;
   		font-weight: bolder;
   	}

   	 input[type=text] {
   		width: 100%;
   		/*margin-left: 30%;*/
   		font-size: 20px;
   	}

   	form label {
   		padding-left: 30%;
   		font-weight: bolder;
   	}


   	.btn-primary {
   		width: 100%;
   		height: 40px;
   		/*margin-left: 30%;*/
   		border: 2px solid ##e6e600;
   		font-weight: bolder;
   	}

   </style>

</head>
<body>

	<div class="container-fluid edit-page">

		<div class="container edit-form">
			<?php

			if (isset($msg)) {
				echo $msg;
			}

			?>
			<h3>Edit Location</h3>
			<form method="post" action="">

			 

  <div class="form-group">
    <label for="exampleInputEmail1">New Location</label>
    <input type="text" name="venue" class="form-control" required placeholder="New Location">
  </div>


			  

			 


			  <div class="form-group">
			  	<input type="hidden" name="id" value="<?php echo $tracking_id; ?>">
			  </div>


			  <button type="submit" name="update" class="btn btn-primary">Update</button>
			</form>
		</div>
		
	</div>

	




	 <!-- jQuery CDN  -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	
	 <!-- Bootstrap JS -->
	<script type="text/javascript" src="bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>