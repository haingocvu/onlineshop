<?php  

require_once "BaseController.php";
require_once "model/TypeModel.php";
require_once "helper/Pager.php";

class TypeController extends BaseController
{
	function showView(){
		return $this->loadView("type");
	}
	function getProducts(){
		$pager = new Pager();
		$model = new TypeModel();
		$alias = isset($_GET["alias"])?$_GET["alias"]:"iphone";
		$page = isset($_GET["page"])?$_GET["page"]:1;
		if(isset($_GET["rowcount"]) && !empty($_GET["rowcount"])){
			$rowcount = $_GET["rowcount"];
		}else{
			$rowcount = count($model->getProductsByType($alias));
		}
		$position = ($page - 1) * $pager->perpage;
		$products = $model->getProductsByType($alias, $position, $pager->perpage);
		$pagination = $pager->getAllPageLinks($rowcount, "type.php?page=");
		$data = [
			"products"=>$products,
			"pagination"=>$pagination,
			"rowcount"=>$rowcount,
			"alias"=>$alias
		];
		return $this->loadViewNoLayout("type", $data);
	}
}

?>