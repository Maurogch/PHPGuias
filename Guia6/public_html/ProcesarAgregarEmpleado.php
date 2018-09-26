<?php
namespace public_html;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "../Config/Autoload.php";

use Config\Autoload as Autoload;
use Model\Empleado as Empleado;
use Model\Encargado as Encargado;
use Model\JefeDepartamento as JefeDepartamento;
use Repository\RepositorioPersonal as RepositorioPersonal;

Autoload::Start();

if($_POST){
    session_start();

    $tipoEmpleado = isset($_POST["tipoEmpleado"]) ? $_POST["tipoEmpleado"] : "Empleado";

    $empleado = new Empleado();

    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
    $apellido = isset($_POST["apellido"]) ? $_POST["apellido"] : "";
    $dni = isset($_POST["dni"]) ? $_POST["dni"] : "";
    $legajo = isset($_POST["legajo"]) ? $_POST["legajo"] : "";
    $fechaInicio = isset($_POST["fechaInicio"]) ? $_POST["fechaInicio"] : "";
    $hrsTrabajoxDia = isset($_POST["hrsTrabajoxDia"]) ? $_POST["hrsTrabajoxDia"] : "";
    $pagaxHora = isset($_POST["pagaxHora"]) ? $_POST["pagaxHora"] : "";

    if($tipoEmpleado=="Encargado"){
        $empleado = new Encargado();

        $numArea = isset($_POST["numArea"]) ? $_POST["numArea"] : "";
        $empleado->setNumArea($numArea);
    }elseif ($tipoEmpleado=="JefeDepartamento") {
        $empleado = new JefeDepartamento();

        $numDepto = isset($_POST["numDepto"]) ? $_POST["numDepto"] : "";
        $empleado->setNumDepto($numDepto);
    }

    $empleado->setNombre($nombre);
    $empleado->setApellido($apellido);
    $empleado->setDni($dni);
    $empleado->setLegajo($legajo);
    $empleado->setFechaInicio($fechaInicio);
    $empleado->setHrsTrabajoxDia($hrsTrabajoxDia);
    $empleado->setPagaxHora($pagaxHora);

    if(isset($_SESSION["repositorioPersonal"])){
        $repositorioPersonal = $_SESSION["repositorioPersonal"];

        $repositorioPersonal->Agregar($empleado);

        $_SESSION["repositorioPersonal"] = $repositorioPersonal;

        echo "<script> alert('Empleado agreagado exitosamente');
            window.location = 'Main.php'; </script>";
    }else{
        session_destroy();
        echo "<script> alert('Hubo un problema al cargar los datos');
            window.location = '../index.php'; </script>";
    }

}else{
    header("location:../index.php");
}