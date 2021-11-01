<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require("database.php");

class Activities {

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

	public function shipping_seach($user_input){

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





		
}



?>

		

		

			
				

			

