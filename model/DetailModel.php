<?php  

require_once "DBConnect.php";

class DetailModel extends DBConnect{
	public  function getProductDetail($alias){
		$sql = "SELECT products.* FROM products INNER JOIN page_url ON page_url.id = products.id_url
				WHERE page_url.url = '$alias'";
		return $this->loadOneRow($sql);
	}

	public function getRelatedProducts($alias){
		$sql = "SELECT p.*, u.url as url FROM (SELECT * FROM products
				WHERE products.id_type = (SELECT products.id_type
				FROM products INNER JOIN page_url ON page_url.id = products.id_url
				WHERE page_url.url = '$alias')) as p INNER JOIN page_url as u ON u.id = p.id_url
				WHERE url != '$alias'";
		return $this->loadMoreRow($sql);
	}
}

?>