<?php  

require_once "BaseController.php";
require_once "model/TypeModel.php";
require_once "helper/Pager.php";

class TypeController extends BaseController
{
	function getProductByType(){
		$data = [];
		//get alias from url, if empty, set default iphone-x
		$alias = isset($_GET["alias"])?$_GET["alias"]:"iphone";
		$page  = (isset($_GET["page"]) && is_numeric($_GET["page"]) && abs($_GET["page"]) != 0)?abs($_GET["page"]):1;

		$typeModel = new TypeModel();
		$catgory = $typeModel->getCategory($alias);
		//check if user enter invalid alias
		if($catgory != '' && $catgory != false){
			$qty = 9;
			$position = ($page - 1) * $qty;
			if($catgory->id_parent != null){
				$totalProductsByType = $typeModel->getProductsByTypeLevel2($alias);
				$productsByType = $typeModel->getProductsByTypeLevel2($alias, $position, $qty);
			}else {
				$totalProductsByType = $typeModel->getProductsByTypeLevel1($alias);
				$productsByType = $typeModel->getProductsByTypeLevel1($alias, $position, $qty);
			}
			$coutTotalProductsByType = count($totalProductsByType);
			$pager = new Pager($coutTotalProductsByType, $page, $qty, 5);
			$pagination = $pager->showPagination();
			$data = [
			"productsByType"=>$productsByType,
			"catgory"=> $catgory,
			"pagination"=>$pagination
			];
		}
		return $this->loadView("type", $data);
	}
}

?>