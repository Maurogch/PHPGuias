<?php
namespace Repository;

use Model\User as User;

class UserRepository
{
    private $repositoryList;

    public function __construct(){
        $this->repositoryList = array();

        $user = new User();
        $user->setUserName("user")->setPassword("a");
        array_push($this->repositoryList, $user);
    }

    public function GetAll(){
        return $this->repositoryList;
    }
}
?>