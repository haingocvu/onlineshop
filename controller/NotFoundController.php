<?php  

require_once "BaseController.php";

class NotFoundController extends  BaseController{
	public function getview(){
		return $this->loadView("404");
	}
}

?>