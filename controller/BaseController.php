<?php  

class BaseController
{
	protected function loadView($view, $data){
		include_once "layout.view.php";
	}
}

?>