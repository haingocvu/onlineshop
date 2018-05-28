<?php  

require_once "DBConnect.php";

class TypeModel extends DBConnect{

	public function getCategory($alias){
		$sql = "SELECT categories.*, page_url.url 
				FROM categories INNER JOIN page_url on page_url.id = categories.id_url
				WHERE page_url.url = '$alias'";
		return $this->loadOneRow($sql);
	}

	//in fact, we just need getProductsByTypeLevel1 to get all products by type. but for performance, we need both 2 methods.
	public function getProductsByType($alias, $position = 0, $qty = 0){
		$sql = "SELECT products.*, page_url.url
				FROM (SELECT parent.*
				FROM (SELECT categories.* FROM categories INNER JOIN page_url on page_url.id = categories.id_url
				WHERE page_url.url = '$alias') as parent
				LEFT JOIN (SELECT categories.* FROM categories WHERE categories.id_parent IS NOT NULL) as child
				ON parent.id = child.id_parent
				UNION
				SELECT child.*
				FROM (SELECT categories.* FROM categories INNER JOIN page_url on page_url.id = categories.id_url
				WHERE page_url.url = '$alias') as parent
				INNER JOIN (SELECT categories.* FROM categories WHERE categories.id_parent IS NOT NULL) as child
				ON parent.id = child.id_parent) as cat
				INNER JOIN products ON cat.id = products.id_type
				INNER JOIN page_url ON page_url.id = products.id_url";
				if ($qty != 0){
					$sql .= " LIMIT $position, $qty";
				}
		return $this->loadMoreRow($sql);
	}

	public function countProductsByType($alias, $minPrice = 0, $maxPrice = 0){
		$sql = "SELECT count(prod.id) as qty FROM (SELECT products.*
				FROM (SELECT categories.id
				FROM categories INNER JOIN page_url ON categories.id_url = page_url.id
				WHERE page_url.url = '$alias') AS cat INNER JOIN products ON products.id_type = cat.id) as prod INNER JOIN page_url as url
				ON prod.id_url = url.id";
				if (($minPrice != 0) && ($maxPrice != 0)){
					$sql .= " WHERE prod.price BETWEEN $minPrice AND $maxPrice";
				}elseif (($minPrice != 0) && ($maxPrice == 0)){
					$sql .= " WHERE prod.price > $minPrice";
				}
		return $this->loadOneRow($sql);
	}
}

?>