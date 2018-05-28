<?php  

require_once "controller/TypeController.php";

$type = new TypeController();
if(isset($_GET["method"]) && $_GET["method"] == "getproduct"){
	return $type->getProducts();
}
return $type->showView();

?>