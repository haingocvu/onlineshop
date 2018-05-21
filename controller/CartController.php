<?php  
require_once "model/CartModel.php";
require_once "helper/Cart.php";
//alway remember using session start after require and include
session_start();
class CartController{
	function addToCart(){

		//get product by id
		$productID =  $_POST["productID"];
		$cartModel = new CartModel();
		$item = $cartModel->getProductByID($productID);
		//get cart from session
		$oldCart = isset($_SESSION["cart"])?$_SESSION["cart"]:null;
		//print_r($oldCart);die;
		//new Cart and add item to Cart
		$cart = new Cart($oldCart);
		$cart->addItemToCart($item);
		$_SESSION["cart"] = $cart;
		print_r($item->name);
	}
}

?>