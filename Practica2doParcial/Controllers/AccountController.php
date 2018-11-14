<?php
namespace Controllers;

use Models\User as User;

class AccountController
{
    public function __construct()
    {

    }

    public function index()
    {
        require VIEWS_PATH."login.php";
    }

    public function login($userName, $password)
    {
        //check if username exists
        //check password
        $user = new User();

        //this is a register, to simplify
        $user->setUser($userName);
        $user->setPassword($password);

        $_SESSION["userLogged"] = $user;

        header("location:".FRONT_ROOT."Home/index");
        exit;
    }
}