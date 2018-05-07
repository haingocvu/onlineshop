<?php  

class DBConnect
{
	protected $conn = null;
	
	function __construct($servername = "localhost",$databasename = "myDBPDO", $username = "root", $password = "")
	{
		try {
			$this->conn = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
			$this->conn->exec("set names utf8");
		} catch (Exception $e) {
			echo "ERROR: ".$e->getMessage();
		}
	}

	protected function getStatement($query, $params = [])
	{
		$stmt = $this->conn->prepare($query);
		foreach ($params as $key => $value) {
			$stmt->bindValue($key + 1, $value);
		}

		return $stmt;
	}

	//INSERT, UPDATE, DELETE
	public function executeQuery($query, $params = []){
		$stmt = $this->getStatement($query, $params);
		return $stmt->execute();
	}

	//Load 1 row
	public function loadOneRow($query, $params = [])
	{
		$stmt = $this->getStatement($query, $params);
		$rs  = $stmt->execute();
		if($rs){
			return $stmt->fetch(PDO::FETCH_OBJ);
		}else {
			return false;
		}
	}

	//Load More Row
	public function loadMoreRow($query, $params = [])
	{
		$stmt = $this->getStatement($query, $params);
		$rs  = $stmt->execute();
		if($rs){
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}else {
			return false;
		}
	}
}

?>