<?php  

require_once "model/BaseModel.php";
require_once "helper/Cart.php";
session_start();

class BaseController
{
	protected function loadView($view = "home", $data = []){
		$oCart = isset($_SESSION["cart"])?$_SESSION["cart"]:null;
		$shoppingcart = new Cart($oCart);
		$baseModel = new BaseModel();
		$menus = $baseModel->getMenu();
		include_once "view/layout.view.php";
	}

	protected function loadSortPriceView($view, $data = []){
		require_once "view/ajax/$view.view.php";
	}
}

?>