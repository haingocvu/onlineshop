<?php  

require_once "controller/CheckoutController.php";

$ckc = new CheckoutController();

return isset($_POST["btnCheckoutSubmit"])?$ckc->postCheckout():$ckc->showView();

?>