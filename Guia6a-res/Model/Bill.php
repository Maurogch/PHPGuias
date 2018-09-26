<?php namespace Model;

	use Model\Product as Product;
	
/**
* Cabecera de FActura y Datos del Cliente
*/
class Bill
{
	
	//Atributes
	private $firstName;
	private $lastName;
	private $dni;
	private $email;
	private $dateBirth;
	private $billNumber;
	private $billType;
	private $productList = array();

	//Access Properties

	public function getFirstName(){
		return $this->firstName;
	}

	public function setFirstName($firstName){
		$this->firstName = $firstName;   
	}

	public function getLastName(){
		return $this->lastName;
	}

	public function setLastName($lastName){
		$this->lastName = $lastName;   
	}

	public function getDni(){
		return $this->dni;
	}

	public function setDni($dni){
		$this->dni = $dni;   
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;   
	}

	public function getDateBirth(){
		return $this->dateBirth;
	}

	public function setDateBirth($dateBirth){
		$this->dateBirth = $dateBirth;   
	}

	public function getBillNumber(){
		return $this->billNumber;
	}

	public function setBillNumber($billNum){
		$this->billNumber = $billNum;
	}

	public function getBillType(){
		return $this->billType;
	}

	public function setBillType($billType){
		$this->billType = $billType;   
	}

	public function getProductList(){
		return $this->productList;
	}

	public function AddProduct(Product $prod)
	{
		if($prod != null)
		{
			array_push($this->productList, $prod);
		}
	}

	public function subTotalCost()
	{
		$subTotal = 0.0;
		
		foreach ($this->getProductList() as $prod) 
		{
			$subTotal += $prod->getSubTotal();
		}

		return $subTotal;
	}

	public function totalCost()
	{
		$total = 0.0;
	
		foreach ($this->getProductList() as $prod) 
		{
			$total += $prod->getTotal();
		}
	
		return $total;
	}
}

?>