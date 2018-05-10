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
		$sql = "SELECT products.*, page_url.url FROM products INNER JOIN page_url ON page_url.id = products.id_url
				WHERE status = ?";
		$params = [1];
		return $this->loadMoreRow($sql, $params);
	}

	public function getTopSellerProducts($limit = 10){
		$sql = "SELECT p.*, page_url.url
				FROM (SELECT products.*, SUM(bill_detail.quantity) as soluong
				FROM bill_detail INNER JOIN products ON products.id = bill_detail.id_product
				GROUP BY bill_detail.id_product
				ORDER BY soluong DESC
				LIMIT 0, $limit) as p INNER JOIN page_url ON page_url.id = p.id_url";
		return $this->loadMoreRow($sql);
	}

	public function getOnSaleProducts($limit = 0){
		$sql = "SELECT products.*, page_url.url FROM products INNER JOIN page_url ON page_url.id = products.id_url
				WHERE products.promotion_price != 0";
		if ($limit != 0) $sql.= " LIMIT 0, $limit";
		return $this->loadMoreRow($sql);
	}
}

?>