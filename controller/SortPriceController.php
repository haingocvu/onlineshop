<?php
require_once "model/TypeModel.php";
require_once "model/SortPriceModel.php";
require_once "BaseController.php";

class SortPriceController extends BaseController{
	public function sort(){
		$price = $_GET["price"];
		$priceArr = explode("-", $price);
		$minprice = isset($priceArr[0])?$priceArr[0]:0;
		$maxprice = isset($priceArr[1])?$priceArr[1]:0;
		$alias = $_GET["alias"];

		$typeModel = new TypeModel();
		$sortPriceModel = new SortPriceModel();
		$catgory = $typeModel->getCategory($alias);
		//check if user enter invalid alias
		if($catgory != '' && $catgory != false){
			if($catgory->id_parent != null){
				//level2
				$productsByTypeByPrice = $sortPriceModel->getProductsByPriceByTypeLevel2($alias, $minprice, $maxprice);
			}else{
				$productsByTypeByPrice = $sortPriceModel->getProductsByPriceByTypeLevel1($alias, $minprice, $maxprice);
			}
			$data = [
				"products"=>$productsByTypeByPrice,
				"price"=>$price
			];
			return $this->loadSortPriceView("sort", $data);
		}
	}
}

?>