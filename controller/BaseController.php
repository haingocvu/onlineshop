<?php  

require_once "model/BaseModel.php";
require_once "helper/Cart.php";
session_start();

class BaseController
{
	function __construct(){
		date_default_timezone_set("Asia/Ho_Chi_Minh");
	}
	protected function loadView($view = "home", $data = []){
		//cart for display cart icon on layoutview
		$oCart = isset($_SESSION["cart"])?$_SESSION["cart"]:null;
		$shoppingcart = new Cart($oCart);
		//menu for layoutview
		$baseModel = new BaseModel();
		$menus = $baseModel->getMenu();
		//print_r($menus);die;
		include_once "view/layout.view.php";
	}

	protected function loadSortPriceView($view, $data = []){
		require_once "view/ajax/$view.view.php";
	}

	protected function loadViewNoLayout($view, $data = []){
		require_once "view/ajax/$view.view.php";
	}
}

?>