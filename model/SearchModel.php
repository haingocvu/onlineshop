<?php  

require_once "DBConnect.php";

class SearchModel extends DBConnect{
	function getProductsByTypeByname($alias, $name, $position = 0, $qty = 0){
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
				INNER JOIN page_url ON page_url.id = products.id_url
				WHERE products.name LIKE '%$name%'";
				if ($qty != 0){
					$sql .= " LIMIT $position, $qty";
				}
		return $this->loadMoreRow($sql);
	}
	function getProductsByName($name, $position = 0, $qty = 0){
		$sql = "SELECT products.*, page_url.url FROM products 
		INNER JOIN page_url ON page_url.id = products.id_url
		WHERE name LIKE '%$name%'";
		if ($qty != 0){
			$sql .= " LIMIT $position, $qty";
		}
		return $this->loadMoreRow($sql);
	}
}

?>