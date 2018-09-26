<?php 
namespace public_html;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "../Config/Autoload.php";

use Config\Autoload as Autoload;

session_start();

if(!isset($_SESSION["userLogged"])){
    header("location:../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agregar Empleado</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="wrapper">
        <section>
            <form action="ProcesarAgregarEmpleado.php" method="post">
                <div id="title">Carga de Empleado</div>
                <table>
                    <tr>
                        <td>Nombre: <input type="text" name="nombre" required></td>
                        <td>Apellido: <input type="text" name="apellido"></td>
                    </tr>
                    <tr>
                        <td>DNI: <input type="number" min="5000000" max="99999999" name="dni"></td>
                        <td>Legajo: <input type="number" name="legajo" min="1" max="9999"></td>
                    </tr>
                    <tr>
                        <td colspan="2">Fecha Inicio: <input type="date" name="fechaInicio"></td>
                    </tr>
                    <tr>
                        <td>Cantidad horas por dia: <input type="number" name="hrsTrabajoxDia"></td>
                        <td>Paga por hora: $<input type="number" name="pagaxHora"></td>
                    </tr>
                    <tr>
                        <td colspan="2">Tipo de empleado:</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Empleado:<input type="radio" name="tipoEmpleado" value="Empleado" checked> 
                            Encargado:<input type="radio" name="tipoEmpleado" value="Encargado"> 
                            Jefe:<input type="radio" name="tipoEmpleado" value="JefeDepartamento"> 
                        </td>
                    </tr>
                    <tr>
                        <td>Número de Area: <input type="number" name="numArea"></td>
                        <td>Número de Depto: <input type="number" name="numDepto"></td>
                    </tr>
                </table>
                <div><input type="submit" value="Agregar Empleado"></div>
            </form>
        </section>
    </div>
</body>
</html>