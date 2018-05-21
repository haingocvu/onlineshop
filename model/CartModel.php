<?php  

require_once "DBConnect.php";

class CartModel extends DBConnect{
	function getProductByID($id){
		$sql = "SELECT * FROM products WHERE id=?";
		$params = [$id];
		return $this->loadOneRow($sql, $params);
	}
}

?>