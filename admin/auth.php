<?php 

ini_set('display_errors', 1);
error_reporting(E_ALL);
require("db.php");
class Auth {


	public function registerAdmin($username,$email, $password)
			
	{
		$dbh = DB();
		$stmt = $dbh->prepare("INSERT INTO admin(username,email,password) VALUES(?,?,?)");
		$stmt->execute([$username,$email,$password]);
		return $stmt->rowCount();
		



	}


	public function loginAdmin($email,$password)
	{
		$dbh = DB();
		$stmt = $dbh->prepare("SELECT email,password FROM admin WHERE email = ?");
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