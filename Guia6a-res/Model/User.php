<?php namespace Model;

class User{
	
	//Atributes
	private	$name;
	private $email;
	private $password;

	//Access Properties
	public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;   
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;   
	}

	public function getPassword(){
		return $this->password;
	}

	public function setPassword($password){
		$this->password = $password;
	}
}

?>