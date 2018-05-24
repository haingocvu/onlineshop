<?php  
require_once "controller/SearchController.php";

$sc = new SearchController();

if(isset($_GET['action']) && $_GET['action'] == 'ajax'){
	return $sc->ViewMore();
}

return $sc->showView();

?>