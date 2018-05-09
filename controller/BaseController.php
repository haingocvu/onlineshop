<?php  

require_once "model/BaseModel.php";

class BaseController
{
	protected function loadView($view = "home", $data = []){
		$baseModel = new BaseModel();
		$menus = $baseModel->getMenu();
		include_once "view/layout.view.php";
	}
}

?>