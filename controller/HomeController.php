<?php  

require_once "BaseController.php";
require_once "model/HomeModel.php";

class HomeController extends BaseController
{
	function getHome(){
		$homeModel = new HomeModel();
		$slides = $homeModel->getSlides();
		$data = [
			"slides"=>$slides
		];
		return $this->loadView("home", $data);
	}
}

?>