<?php namespace Repository;

use Model\Bill as Bill;
/**
* Contrato de acciones para los Repositorios
*/
interface IActionRepository
{
	public function Add(Bill $newBill);
	public function GetAll();
}
?>