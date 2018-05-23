<?php  

require_once "BaseController.php";
require_once "Model/CheckoutModel.php";
require_once "helper/Function.php";
require_once "helper/PHPMailer/mailer.php";

class CheckoutController extends BaseController{
	function showView(){
		return $this->loadView("checkout");
	}
	function postCheckout(){
		//we need a variable called isSuccess to detect this function return true or false
		//if false we rollback changes
		//otherwise we commit the transaction
		$isSuccess = true;
		//start transaction
		$model = new CheckoutModel();
		$model->conn->beginTransaction();
		try {
			//get cart session
			$cart = $_SESSION["cart"];
			//token and tokendate for bill
			$token = createToken();
			$token_date = date("Y-m-d H:i:s");
			//save customer
			$name = $_POST["fullname"];
			$gender = $_POST["gender"];
			$email = $_POST["email"];
			$address = $_POST["address"];
			$phone = $_POST["phone"];
			$id_customer = $model->saveCustomer($name, $gender, $email, $address, $phone);

			//check if customer is inserted successfully
			//then we save bill
			if($id_customer){
				//save bill
				$date_order = date("Y-m-d");
				$total = $cart->totalPrice;
				$promt_price = $cart->totalPromotionPrice;
				$payment_method = $_POST["payments"];
				$note = $_POST["note"];
				$id_bill = $model->saveBill($id_customer, $date_order, $total, $promt_price, $payment_method, $note, $token, $token_date);
				//check if bill is inserted successfully
				//then we save bill detail
				if($id_bill){
					//save bills detail
					foreach($cart->items as $id_product=>$product){
						$quantity = $product["qty"];
						$price = $product["promotionPrice"];
						$id_bill_detail = $model->saveBillDetail($id_bill, $id_product, $quantity, $price);
						if(!$id_bill_detail){
							$isSuccess = false;
							break;
						}
					}
				}else{
					$isSuccess = false;
				}
			}else{
				$isSuccess = false;
			}
			//when not success. we rollback
			//otherwise we commit the changes
			if($isSuccess == false){
				$model->conn->rollBack();
				$_SESSION["checkout_error"] = "Order failure, try it later! thanks";
			}else{
				$model->conn->commit();
				//send mail
				$subject = "ONLINESHOP - Xác Nhận Đơn Hàng";
				$tokenTime = strtotime($token_date);
				$link = "http://wwww.localhost/onlineshop/$token/$tokenTime";
				$body = "
					chào bạn, <h4 style='color: blue; '> $name </h4>
					<h5>Confirm this orders by clicking the following link</h5>
					<a href='$link'>Click here to confirm</a>
				";
				sendMail($email, $name, $subject, $body);
				//if success, unset session of cart
				//then add success session
				unset($_SESSION["cart"]);
				$_SESSION["checkout_success"] = "Order successful, please check your email to confirm the orders";
			}
			header("location:checkout.php");
		} catch (Exception $e) {
			//when error catched. we rollback also.
			$model->conn->rollBack();
			$_SESSION["checkout_error"] = "Order failure, try it later! thanks";
		}
	}
}

?>