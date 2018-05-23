<?php  

require_once "DBConnect.php";

class CheckoutModel extends DBConnect{
	public function saveCustomer($name, $gender, $email, $address, $phone){
		$sql = "INSERT INTO customers(name, gender, email, address, phone)
		VALUES(?, ?, ?, ?, ?)";
		$params = [$name, $gender, $email, $address, $phone];
		$rs = $this->executeQuery($sql, $params);
		return $rs?$this->getLastID():false;
	}
	public function saveBill($id_customer, $date_order, $total, $promt_price, $payment_method, $note, $token, $token_date){
		$sql = "INSERT INTO bills(id_customer, date_order, total, promt_price, payment_method, note, token, token_date)
		VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
		$params = [$id_customer, $date_order, $total, $promt_price, $payment_method, $note, $token, $token_date];
		$rs = $this->executeQuery($sql, $params);
		return $rs?$this->getLastID():false;
	}
	public function saveBillDetail($id_bill, $id_product, $quantity, $price){
		$sql = "INSERT INTO bill_detail(id_bill, id_product, quantity, price)
		VALUES(?, ?, ?, ?)";
		$params = [$id_bill, $id_product, $quantity, $price];
		$rs = $this->executeQuery($sql, $params);
		return $rs?$this->getLastID():false;
	}
}

?>