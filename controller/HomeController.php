<?php  

require_once "BaseController.php";
require_once "model/HomeModel.php";

class HomeController extends BaseController
{
	function getHome(){
		$homeModel = new HomeModel();
		$slides = $homeModel->getSlides();
		$featuredProducts = $homeModel->getFeaturedProducts();
		$data = [
			"slides"=>$slides,
			"featuredProducts"=>$featuredProducts
		];
		return $this->loadView("home", $data);
	}
}

?>