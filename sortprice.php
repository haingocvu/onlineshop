<?php  

require_once "controller/SortPriceController.php";

$sc = new SortPriceController();
return $sc->sort();

?>