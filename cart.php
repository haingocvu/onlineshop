<?php  

require_once "controller/CartController.php";

$cc = new CartController();
return $cc->addToCart();

?>