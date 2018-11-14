<?php
namespace Controllers;

use Controllers\Helper\Session as Session;

class HomeController
{
    public function __construct()
    {
        Session::userLogged();
    }

    public function index()
    {
        require VIEWS_PATH."home.php";
    }
}