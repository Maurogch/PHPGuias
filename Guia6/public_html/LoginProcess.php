<?php
namespace public_html;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "../Config/Autoload.php";

use Config\Autoload as Autoload;
use Repository\UserRepository as UserRepository;
use Repository\RepositorioPersonal as RepositorioPersonal;

Autoload::Start();

session_start();

if ($_POST) {
    $userName = isset($_POST["usuario"]) ? $_POST["usuario"] : "";
    $userPassword = isset($_POST["password"]) ? $_POST["password"] : "";

    if (!empty($userName) && !empty($userPassword)) {
        $userRepository = $_SESSION["userRepository"];

        foreach ($userRepository->GetAll() as $userItem) {
            if ($userItem->getUserName() == $userName && $userItem->getPassword() == $userPassword) {
                $userLogged = $userItem;
            }
        }

        if (isset($userLogged)) {
            $_SESSION["userLogged"] = $userLogged;
            $_SESSION["repositorioPersonal"] = new RepositorioPersonal();

            echo "<script> alert('Acceso exitoso');
                window.location = 'Main.php'; </script>";
        } else {
            echo "<script> alert('Datos Incorectos');
                window.location = '../index.php'; </script>";
        }
    } else {
        echo "<script> alert('Datos Incorectos');
            window.location = '../index.php'; </script>";
    }
} else {
    if (isset($_SESSION["userlogged"])) {
        header("location:Main.php");
    } else {
        header("location:../index.php");
    }
}
