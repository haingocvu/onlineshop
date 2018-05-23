<?php  

require_once "BaseController.php";
require_once "Model/CheckoutModel.php";

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
				$token = "dadagsgjsfgjsfsdfksdf";
				$token_date = date("Y-m-d H:i:s");
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
				echo "there are an error when processing your cart! check it later, thanks!";
			}else{
				$model->conn->commit();
				echo "Success";
			}
		} catch (Exception $e) {
			//when error catched. we rollback also.
			$model->conn->rollBack();
			echo "there are an error when processing your cart! check it later, thanks!";
		}
	}
}

?>