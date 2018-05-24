<?php  
require_once "BaseController.php";
require_once "model/SearchModel.php";

class SearchController extends BaseController{
	function showView(){
		$alias = isset($_GET['category'])?$_GET['category']:'iphone';
		$name = isset($_GET['name'])?$_GET['name']:'iphone x';
		$model = new SearchModel();
		if($alias == 'all'){
			$products = $model->getProductsByName($name, 0, 3);
			//print_r($products);die;
		}else{
			$products = $model->getProductsByTypeByname($alias, $name, 0, 3);
		}
		$data = [
			"products"=>$products
		];
		return $this->loadView("search", $data);
	}
	function ViewMore(){
		// Bước này dùng để kiểm tra thôi chứ ko có tác dụng gì
		// Mục đích là ngưng xử lý 3 giây để mình xem dòng chữ loadding 
		// Sau khi test xong bạn xóa đi nhé
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
		    sleep(1);
		}
 
		$alias = isset($_GET['alias'])?$_GET['alias']:'iphone';
		$name = isset($_GET['name'])?$_GET['name']:'iphone x';
		$page = isset($_GET['page'])?$_GET['page']:'2';
		// Kiểm tra trang hiện tại có bé hơn 1 hay không
		if ($page < 1) {
		    $page = 1;
		}
		// Số record trên một trang
		$limit = 3;
		// Tìm position
		$position = ($limit * $page) - $limit;
		// Câu truy vấn
		// Trong câu truy vấn này chúng ta sẽ lấy limit tăng lên 1
		// Lý do là vì ta không có viết code đếm record nên dựa vào tổng số kết quả trả về để:
		// - Nếu kết quả trả về bằng $limit + 1 thì còn phân trang
		// - Nếu kết quả trả về bé hơn $limit + 1 thì nghĩa là hết dữ liệu nên ngưng phân trang
		$model = new SearchModel();
		if($alias == 'all'){
			$products = $model->getProductsByName($name, $position, $limit + 1);
		}else{
			$products = $model->getProductsByTypeByname($alias, $name, $position, $limit + 1);
		}
		$total = count($products);
		//we need to pass both total and limit to check paging
		$data = [
			"products"=>$products,
			"total"=>$total,
			"limit"=>$limit
		];
		return $this->loadViewNoLayout("search", $data);
	}
}

?>