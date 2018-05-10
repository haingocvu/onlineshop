<?php  

require_once "BaseController.php";
require_once "model/HomeModel.php";

class HomeController extends BaseController
{
	function getHome(){
		$homeModel = new HomeModel();
		$slides = $homeModel->getSlides();
		$featuredProducts = $homeModel->getFeaturedProducts();
		$topSellerProducts = $homeModel->getTopSellerProducts();
		$onSaleProducts = $homeModel->getOnSaleProducts(3);
		$data = [
			"slides"=>$slides,
			"featuredProducts"=>$featuredProducts,
			"topSellerProducts"=>$topSellerProducts,
			"onSaleProducts"=>$onSaleProducts
		];
		return $this->loadView("home", $data);
	}
}

?>