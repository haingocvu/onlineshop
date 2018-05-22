<?php  

require_once "controller/CartController.php";

$cc = new CartController();
if(isset($_POST['data'])){
	$data_obj = json_decode($_POST['data']);
	if($data_obj->action == 'update'){
		return $cc->updateItem();
	}elseif($data_obj->action == 'delete'){
		return $cc->deleteItem();
	}
}
return $cc->addToCart();

?>