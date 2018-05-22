<?php  
require_once "model/CartModel.php";
require_once "helper/Cart.php";
require_once "BaseController.php";
//alway remember using session start after require and include
//we added session start in basecontroller. so no need to session start again
class CartController extends BaseController{
	function showView(){
		$oldCart = isset($_SESSION["cart"])?$_SESSION["cart"]:null;
		$cart = new Cart($oldCart);
		$data = [
			"cart"=>$cart
		];
		return $this->loadView("cart", $data);
	}
	function addToCart(){
		//get product by id
		$productID =  isset($_POST["productID"])?$_POST["productID"]:0;
		if($productID == 0){
			echo "error";
			return;
		}
		$qty = isset($_POST["qty"])?$_POST["qty"]:1;
		$cartModel = new CartModel();
		$item = $cartModel->getProductByID($productID);
		//get cart from session
		$oldCart = isset($_SESSION["cart"])?$_SESSION["cart"]:null;
		//print_r($oldCart);die;
		//new Cart and add item to Cart
		$cart = new Cart($oldCart);
		$cart->addItemToCart($item, $qty);
		$_SESSION["cart"] = $cart;
		print_r($item->name);
	}
}

?>