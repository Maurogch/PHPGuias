<?php namespace Repository;

use Model\User as User;
use Repository\IActionRepository as IActionRepository;

class UserRepository
{
	private $repositoryList;

	public function __construct()
	{
		$this->repositoryList = array();
		
		// Add Unique User
		$user = new User();
		$user->setName("Cosme Fulanito");
		$user->setEmail("cosme@fulanito.com");
		$user->setPassword("cosme1234");

		array_push($this->repositoryList, $user);
	} 

	public function GetAll()
	{
		return $this->repositoryList;
	}
}
?>