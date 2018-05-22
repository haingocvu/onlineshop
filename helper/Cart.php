<?php  

class Cart{
	public $totalQty = 0;
	public $totalPrice = 0;
	public $totalPromotionPrice = 0;
	public $items = [];
	function __construct($oldCart = null){
		if($oldCart){
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
			$this->totalPromotionPrice = $oldCart->totalPromotionPrice;
			$this->items = $oldCart->items;
		}
	}
	//add item to card
	public function addItemToCart($item, $qty = 1){
		//innit item
		$currentItem = [
			"qty"=>0,
			"price"=>$item->price,
			"promotionPrice"=>$item->promotion_price,
			"item"=>$item
		];
		//check if item is exists in items array
		//if existsing, assign existsed item to current item
		if($this->items){
			if(array_key_exists($item->id, $this->items)){
				$currentItem = $this->items[$item->id];
			}
		}
		//eval new value of current item
		$currentItem["qty"] += $qty;
		$currentItem["price"] = $currentItem["qty"] * $currentItem["item"]->price;
		$currentItem["promotionPrice"] = ($currentItem["item"]->promotion_price == 0)?($currentItem["item"]->price * $currentItem["qty"]):($currentItem["item"]->promotion_price * $currentItem["qty"])  ;

		//assign new value of current item to items array
		$this->items[$item->id] = $currentItem;

		//update total qty and total price
		$this->totalQty += $currentItem["qty"];
		$this->totalPrice += $currentItem["qty"] * $currentItem["item"]->price;
		$this->totalPromotionPrice += ($currentItem["item"]->promotion_price == 0)?($currentItem["item"]->price * $currentItem["qty"]):($currentItem["item"]->promotion_price * $currentItem["qty"]);
	}
	//update quantity of a item
	public function updateItem($item, $qty){
		//create current item
		$currentItem = [
			"qty"=>$qty,
			"price"=>$item->price,
			"promotionPrice"=>$item->promotion_price,
			"item"=>$item
		];
		//check if item is existed
		if($this->items){
			if(array_key_exists($item->id, $this->items)){
				$this->totalQty -= $this->items[$item->id]["qty"];
				$this->totalPrice -= $this->items[$item->id]["price"];
				$this->totalPromotionPrice -= $this->items[$item->id]["promotionPrice"];
			}
		}
		//update current item
		$currentItem["price"] = $currentItem["qty"] * $currentItem["item"]->price;
		$currentItem["promotionPrice"] = ($currentItem["item"]->promotion_price == 0)?($currentItem["item"]->price * $currentItem["qty"]):($currentItem["item"]->promotion_price * $currentItem["qty"]);
		//assign item to items array
		$this->items[$item->id] = $currentItem;
		//update total qty and total price
		$this->totalQty += $currentItem["qty"];
		$this->totalPrice += $currentItem["price"];
		$this->totalPromotionPrice += $currentItem["promotionPrice"];
	}
	//reduce quantity of the item by 1
	public function reduceByOne($id){
		//update qty and price of current item
		$this->items[$id]["qty"]--;
		$this->items[$id]["price"] -= $this->items[$id]["item"]->price;
		$unitPromtPrice = ($this->items[$id]["item"]->promotion_price == 0)?($this->items[$id]["item"]->price):($this->items[$id]["item"]->promotion_price);
		$this->items[$id]["promotionPrice"] -= $unitPromtPrice;
		//update total price and total qty
		$this->totalQty--;
		$this->totalPrice -= $this->items[$id][["item"]->price];
		$this->totalPromotionPrice -= $unitPromtPrice;
		//check if qty of current item is 0
		//remove current item
		if($this->items[$id]["qty"] <= 0){
			unset($this->items[$id]);
		}
	}
	//remove item
	public function removeItem($id){
		//update total qty and total price
		//remove item
		$this->totalQty -= $this->items[$id]["qty"];
		$this->totalPrice -= $this->items[$id]["price"];
		$this->totalPromotionPrice -= $this->items[$id]["promotionPrice"];
		unset($this->items[$id]);
	}
}

?>