<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('Config\Autoload.php');

use Config\Autoload as Autoload;
//use Model\User as User;
use Repository\UserRepository as UserRepository;

Autoload::Start(); 

session_start();

if(!isset($_SESSION['userLogged']) && empty($_SESSION['userLogged']))
{
    if(!isset($_SESSION['userRepository']) && empty($_SESSION['userRepository']))
    {
        $_SESSION['userRepository'] = new UserRepository();
    }
}
else{
    echo "<script> alert('Ya se encuentra logueado. Gracias!');";  
    echo "window.location = 'public_html/Main.php'; </script>";
}
?>
<!DOCTYPE html>
<html>
    <head>       
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="Styles/style.css" media="screen" />
        <title>Login</title>
    </head>
<body>
    <div align="center" style="margin-top: 10%;">
        <label class="labelTitle">INICIO DE SESSION</label><p>
        <form action="public_html\LoginProcess.php" method="post">
            <div class="container">
                <label for="userEmail"><b>Nombre de Usuario</b></label>
                <input type="email" placeholder="Ingrese aqui su Email" name="userEmail" required>

                <label for="psw"><b>Contraseña</b></label>
                <input type="password" placeholder="Ingrese aqui su Contraseña" name="psw" required>

                <button type="submit">INGRESAR</button>
            </div>
        </form></p>
    </div>
</body>
</html>