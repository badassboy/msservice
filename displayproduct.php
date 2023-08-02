<?php

include("database.php");


class ProductUI{

	public function DisplayProduct()
	{

		$dbh = DB();
		$stmt = $dbh->prepare("SELECT * FROM products");
		$stmt->execute();
		$data = $stmt->fetchAll();
		return $data;

	}

	public function SingleProduct($id)
	{

		$dbh = DB();
		$stmt = $dbh->prepare("SELECT * FROM products WHERE id=?");
		$stmt->execute([$id]);
		$data = $stmt->fetchAll();
		return $data;

	}
}


?>