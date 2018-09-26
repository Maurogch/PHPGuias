<?php
namespace public_html;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "../Config/Autoload.php";

use Config\Autoload as Autoload;

Autoload::Start();

session_start();

if(!isset($_SESSION["userLogged"])){
    header("location:../index.php");
}else {
    var_dump($_SESSION["repositorioPersonal"]->GetAll());
}

