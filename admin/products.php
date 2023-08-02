<?php 

ini_set('display_errors', 1);
error_reporting(E_ALL);
require("db.php");

class Products {


	public function ProductUpload($file_name,$title,$price,$brand,$description)
	{
		$dbh = DB();

			 $path = "img/";
			 $errors = array();
		      $file_name = $_FILES["photo"]['name'];
		     
		      $file_size = $_FILES['photo']['size'];

		      $file_tmp = $_FILES['photo']['tmp_name'];
		      $file_type = $_FILES['photo']['type'];
		     

		      $test_file = $path.basename($_FILES["photo"]["name"]);
		      $file_ext = pathinfo($test_file, PATHINFO_EXTENSION);

		      $extensions= array("jpeg","jpg","png","gif");

		      if(in_array($file_ext,$extensions) === false){
		         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
		      }

		      if($file_size > 4097152) {
		         $errors[]='File size must be exactly 2MB';
		      }



		      if(empty($errors)==true) {

		    if (move_uploaded_file($file_tmp, "img/".$file_name)) {
		  

				// update user's profile details
 		try{

	        $stmt = $dbh->prepare("INSERT INTO products(title,price,brand,picture,description) VALUES(?,?,?,?,?)");
	        $stmt->execute([$title,$price,$brand,"img/".$file_name, $description]);
	        if ($stmt->rowCount()>0) {
	        	return true;
	        }else {
	        	return false;
	        }
	      

 		}catch(PDOException  $ex){
 			echo $ex->getMessage();
 		}

		     	
		     }else {
		    	return false;
		    }

		     }
	}

	
}




?>