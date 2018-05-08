<?php  

class BaseController
{
	protected function loadView($view = "home", $data = []){
		include_once "view/layout.view.php";
	}
}

?>