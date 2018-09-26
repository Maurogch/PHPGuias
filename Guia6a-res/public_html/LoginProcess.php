<?php namespace public_html;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('..\Config\Autoload.php');

use Config\Autoload as Autoload;
use Model\User as User;
use Repository\UserRepository as UserRepository;
use Repository\BillRepository as BillRepository;

Autoload::Start();

session_start();

if($_POST)
{
    
    $userEmail = isset($_POST['userEmail']) ? $_POST['userEmail'] : "";
    $userPassword = isset($_POST['psw']) ? $_POST['psw'] : "";

    if(!empty($userEmail) && !empty($userPassword))
    {
        $userRepositoryList = $_SESSION['userRepository'];

        foreach($userRepositoryList->GetAll() as $userItem)
		{
			if($userItem->getEmail() == $userEmail && $userItem->getPassword() == $userPassword)
			{
                $userLogged = $userItem;
			}
        }
        
        if(isset($userLogged) && $userLogged != null)
        {
            $_SESSION['userLogged'] = $userLogged;

            $_SESSION['billRepositoryList'] = new BillRepository();

            echo "<script> alert('Acceso exitoso !');";
            echo "window.location = 'Main.php'; </script>";
        }
        else
        {
            echo "<script> if(confirm('Datos incorrectos, vuelva a intentarlo. Adios!'));";
            echo "window.location = '../index.php'; </script>";
        }
    }
    else
    {
        echo "<script> if(confirm('Datos incorrectos, vuelva a intentarlo. Adios!'));";  
        echo "window.location = '../index.php'; </script>";
    }    
}
else
{
    if(isset($_SESSION['userLogged']) && !empty($_SESSION['userLogged']))
    {
        echo "<script> window.location = 'Main.php'; </script>";
    }
    else
    {
        echo "<script> window.location = '../index.php'; </script>";
    }
}

?>