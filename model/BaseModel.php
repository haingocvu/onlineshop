<?php  

require_once "DBConnect.php";

class BaseModel extends DBConnect
{
	public function getMenu(){
		$sql = "SELECT menu.name, menu.icon, menu.url, GROUP_CONCAT(sub.name, ':', sub.url) as submenu
					FROM (SELECT categories.*, page_url.url FROM categories INNER JOIN page_url ON categories.id_url = page_url.id WHERE id_parent IS NULL) as menu
					LEFT JOIN (SELECT categories.*, page_url.url FROM categories INNER JOIN page_url ON page_url.id = categories.id_url WHERE id_parent IS NOT NULL) as sub
					ON menu.id = sub.id_parent
					GROUP BY menu.id
					ORDER BY submenu DESC";
		return $this->loadMoreRow($sql);
	}
}

?>