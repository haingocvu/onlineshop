<?php  

require_once "BaseController.php";
require_once "model/DetailModel.php";

class DetailController extends BaseController
{
	function getDetail(){
		$detailModel = new DetailModel();
		$data = [];
		$alias = isset($_GET['alias'])?$_GET['alias']:null;
		if ($alias == null) header('Location: 404.html');
		$detail = $detailModel->getProductDetail($alias);
		$relatedProducts = $detailModel->getRelatedProducts($alias);
		if($detail != '' && $detail != false){
			$data = [
				'detail'=>$detail,
				'relatedProducts'=>$relatedProducts
			];
		}else {
			header('Location: 404.html');
			return;
		}
		return $this->loadView("detail", $data);
	}
}

?>