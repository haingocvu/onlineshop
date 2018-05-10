<?php  

require_once "DBConnect.php";

class HomeModel extends DBConnect
{
	public function getSlides(){
		$sql = "SELECT * FROM slide WHERE status = 1";
		$params = [1];
		$rs = $this->loadMoreRow($sql, $params);
		return $rs;
	}

	public function getFeaturedProducts(){
		$sql = "SELECT * FROM products WHERE status = ?";
		$params = [1];
		return $this->loadMoreRow($sql, $params);
	}

	public function getTopSellerProducts(){
		$sql = "SELECT products.*, SUM(bill_detail.quantity) as soluong
				FROM bill_detail INNER JOIN products ON products.id = bill_detail.id_product
				GROUP BY bill_detail.id_product
				ORDER BY soluong DESC
				LIMIT 0,10";
		return $this->loadMoreRow($sql);
	}
}

?>