<?php namespace Model;
/**
* Producto
*/
class Product{
	
//Atributes
	private	$name;
	private $quantity;
	private $price;

//Access Properties
	public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;   
	}

	public function getQuantity(){
		return $this->quantity;
	}

	public function setQuantity($quantity){
		$this->quantity = $quantity;   
	}

	public function getPrice(){
		return $this->price;
	}

	public function setPrice($price){
		$this->price = $price;
	}

//METHODSS 

	public function getSubTotal()
	{
		$subtotal = 0.0;
		$desc = 0.0;
		
		if($this->quantity > 0)
		{
			$subtotal = ($this->price * $this->quantity);

			if($this->quantity > 5 && $this->quantity <= 9)
			{
				$desc = $subtotal * 0.05;
				$subtotal = $subtotal - $desc;
			}
			else if($this->quantity > 9)
			{
				$desc = $subtotal * 0.15;
				$subtotal = $subtotal - $desc;
			}
		}
			
		return $subtotal;
	}

	public function getTotal()
	{
		$total = 0.0;
	
		if($this->quantity > 0)
		{
			$total = $this->price * $this->quantity;
		}
		
		return $total;
	}
}

?>