<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require("database.php");

class Activities {

	public function testInput($data)
	{
		$data = trim($data);
		$data = htmlspecialchars($data);
		 $data = stripslashes($data);
		 return $data;

	}

	public function registerAdmin($username,$email,$password,$password2)
	{
		$db = DB();
		$hashed = password_hash($password, PASSWORD_DEFAULT);
		$stmt = $db->prepare("INSERT INTO admin(username,email,password) VALUES(?,?,?)");
		$stmt->execute([$username,$email,$hashed]);
		$data = $stmt->rowCount();
		if ($data>0) {
			return true;
		}else {
			return false;
		}
	}

	public function loginAdmin($username,$password)
{
		$dbh = DB();
		$stmt = $dbh->prepare("SELECT * FROM admin WHERE username = ?");

		$stmt->execute([$username]);
		$data = $stmt->fetch(PDO::FETCH_ASSOC);

		$count = $stmt->rowCount();
		if ($count == 1) {
			
			if (password_verify($password, $data['password'])) {
				return $data;
			}else{
				return false;
			}
			
		}else{
			return false;
		}
	}

	public function tracking($track_number,$firstName,$lastName,$email,$product,$mobile,$location)
	{
		$dbh = DB();
		$stmt = $dbh->prepare("INSERT INTO tracking(track_number,firstName,lastName,email,product,mobile,venue) VALUES(?,?,?,?,?,?,?)");
		$stmt->execute([$track_number,$firstName,$lastName,$email,$product,$mobile,$location]);
		$data = $stmt->rowCount();
		if ($data>0) {
			return true;
		}else {
			return false;
		}

	}

	public function deleteTrackingData($id){
		$dbh = DB();
		$stmt = $dbh->prepare("DELETE FROM tracking WHERE id = ?");
		$stmt->execute([$id]);
		$data = $stmt->rowCount();
		if ($data>0) {
			return true;
		}else {
			return false;
		}
	}


	public function insertData($item,$depositor,$next_of_kin,$tracking_id,$serial_number,$weight,$deposited_date){
		$dbh = DB();

		

$stmt = $dbh->prepare("INSERT INTO details(item,depositor,next_of_kin,tracking_id,serial_number,weight,tracked_date) VALUES(?,?,?,?,?,?,?)");
		$stmt->execute([$item,$depositor,$next_of_kin,$tracking_id,$serial_number,$weight,$deposited_date]);
		$inserted = $stmt->rowCount();
		if ($inserted>0) {
			return true;
		}else {
			return false;
		}
		
		}

		public function user_search($input){

			$db = DB();
			$stmt = $db->prepare("SELECT * FROM details WHERE  `tracking_id` LIKE '%$input%'");
			$stmt->execute();
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

			foreach($data as $gold_data){
				// print_r($gold_data);
				$tracking_id = $gold_data['tracking_id'];

			if ($tracking_id == $input) {
				return $data;
			}
		}

		}
		// end of function




		public function shipping_details($hipping_date,$shipping_id,$location,$address){
			$dbh = DB();
			$stmt = $dbh->prepare("INSERT INTO shippers(shipping_date,shipping_id, current_location,destination_address) VALUES(?,?,?,?)");
		$stmt->execute([$hipping_date,$shipping_id,$location,$address]);
		$inserted = $stmt->rowCount();
		if ($inserted>0) {
			return true;
		}else {
			return false;
		}
		
	}
	// end of function

	public function shipping_seach($user_input)
	{

		$db = DB();
			$stmt = $db->prepare("SELECT * FROM shippers WHERE  `shipping_id` LIKE '%$user_input%'");
			$stmt->execute();
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

			foreach($data as $gold_data){
				// print_r($gold_data);
				$shipping_id = $gold_data['shipping_id'];

			if ($shipping_id == $user_input) {
				return $data;
			}
		}
	}

	

	public function itemTracking($user_input)
	{
		$db = DB();
		$stmt = $db->prepare("SELECT * FROM tracking WHERE  `track_number` LIKE '%$user_input%'");
		$stmt->execute();
		while($row = $stmt->fetchAll()){
			return $row;
		}
			
	}







		
}



?>

		

		

			
				

			

