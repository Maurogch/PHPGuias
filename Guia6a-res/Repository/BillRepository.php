<?php namespace Repository;

use Model\Bill as Bill;
use Repository\IActionRepository as IActionRepository;

/**
* Repositorio de facturas
*/
class BillRepository implements IActionRepository
{

	private $repositoryList = array();

	public function __construct(){
		$this->repositoryList = array();
	} 

	public function GetAll()
	{
		return $this->repositoryList;
	}

  	public function Add(Bill $newBill)
  	{
  		if ($newBill != null) 
  		{
  			array_push($this->repositoryList, $newBill);
  		}
	}
}
?>