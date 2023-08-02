<?php 

ini_set('display_errors', 1);
error_reporting(E_ALL);
require("db.php");
class Auth {


	public function registerAdmin($email, $password)
			
	{
		$dbh = DB();
		$stmt = $dbh->prepare("INSERT INTO admin(username,email,password) VALUES(?,?)");
		$stmt->execute([$email,$password]);
		$data = $stmt->rowCount();
		if ($data>0) {
			return true;
		}else{
			return false;
		}



	}


	public function loginAdmin($email,$password)
	{
		$dbh = DB();
		$stmt = $db->prepare("SELECT email,password FROM admin WHERE email = ?");
		$stmt->execute([$email]);
		$data = $stmt->fetch(PDO::FETCH_ASSOC);
		
		
		if($stmt->rowCount()>0){
			if (password_verify($password, $data['password'])) {
				return true;
			}else {
				return false;
			}
			//return password_verify($password, $data['password']);
		}else {
			return false;
		}

	}
}



?>