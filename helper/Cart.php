<?php  

class Cart{
	public $totalQty = 0;
	public $totalPrice = 0;
	public $items = [];
	function __construct($oldCart = null){
		if($oldCart){
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
			$this->items = $oldCart->items;
		}
	}
	//add item to card
	public function addItemToCart($item, $qty = 1){
		//innit item
		$currentItem = [
			"qty"=>0,
			"price"=>$item->price,
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

		//assign new value of current item to items array
		$this->items[$item->id] = $currentItem;

		//update total qty and total price
		$this->totalQty += $qty;
		$this->totalPrice += $qty * $item->price;
	}
	//update quantity of a item
	public function updateItem($item, $qty){
		//create current item
		$currentItem = [
			"qty"=>$qty,
			"price"=>$item->price,
			"item"=>$item
		];
		//check if item is existed
		if($this->items){
			if(array_key_exists($item->id, $this->items)){
				$this->totalQty -= $this->items[$item->id]["qty"];
				$this->totalPrice -= $this->items[$item->id]["price"];
			}
		}
		//update current item
		$currentItem["price"] = $qty * $item->price;
		//assign item to items array
		$this->items[$item->id] = $currentItem;
		//update total qty and total price
		$this->totalQty += $qty;
		$this->totalPrice += $currentItem["price"];
	}
	//reduce quantity of the item by 1
	public function reduceByOne($id){
		//update qty and price of current item
		$this->items[$id]["qty"]--;
		$this->items[$id]["price"] -= $this->items[$id]["item"]->price;
		//update total price and total qty
		$this->totalQty--;
		$this->totalPrice -= $this->items[$id]["item"]->price;
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
		unset($this->items[$id]);
	}
}

?>