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
}

?>