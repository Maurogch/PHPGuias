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
    echo "<script> alert('Debe logearse primero');
        window.location = '../index.php' </script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menu</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="wrapper">
        <section>
            <table>
                <tr><td><div><input type="button" value="Agregar Empleado" onclick="window.location='AgregarEmpleado.php'"></div></td></tr>
                <tr><td><div><input type="button" value="Eliminar Empleado" onclick="window.location='EliminarEmpleado.php'"></div></td></tr>
                <tr><td><div><input type="button" value="Listar Personal" onclick="window.location='ListarPersonal.php'"></div></td></tr>
            </table>
        </section>
    </div>
    
</body>
</html>