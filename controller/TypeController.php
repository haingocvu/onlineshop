<?php  

require_once "BaseController.php";
require_once "model/TypeModel.php";

class TypeController extends BaseController
{
	function getProductByType(){
		$data = [];
		//get alias from url, if empty, set default iphone-x
		$alias = isset($_GET["alias"])?$_GET["alias"]:"iphone";
		$typeModel = new TypeModel();
		$catgory = $typeModel->getCategory($alias);
		//check if user enter invalid alias
		if($catgory != '' && $catgory != false){
			if($catgory->id_parent != null){
				$productsByType = $typeModel->getProductsByTypeLevel2($alias);
			}else {
				$productsByType = $typeModel->getProductsByTypeLevel1($alias);
			}
			$data = [
			"productsByType"=>$productsByType,
			"catgory"=> $catgory
			];
		}
		return $this->loadView("type", $data);
	}
}

?>