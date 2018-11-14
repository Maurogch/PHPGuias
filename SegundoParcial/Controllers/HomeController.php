<?php
namespace Controllers;

use dao\UserDao as UserDao;
use Exception as Exception;

class HomeController
{
    private $userDao;

    public function __construct()
    {
        $this->userDao = new UserDao;
    }

    public function index()
    {
        require VIEWS_PATH."login.php";
    }

    public function login($email, $password)
    {
        try{
            $user = $this->userDao->getByEmail($email);
            
            if($user->getPassword() == $password){
                $_SESSION["userLogged"] = $user;
                echo "<script>window.location.replace('".FRONT_ROOT."Client/index')</script>";
                exit;
            }else{     
                echo "<script>alert('Usuario no registrado, o contraseña invalida')</script>";
                $this->index();
                exit;
            }
        }catch(Exception $ex){
            echo "<script> alert('" . str_replace(array("\r","\n","'"), "", $ex->getMessage()) . "');</script>";
            $this->index();
        }
    }

    public function logout()
    {
        require VIEWS_PATH."logout.php"; 
    }
}