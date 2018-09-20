<?php
require_once("Config/autoload.php");

use Model\User as User;

session_start();

if(!isset($_SESSION["userLogged"])){
    session_destroy();
    header("location:index.php?code=Error");
}else{
    $user = $_SESSION["userLogged"];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
            *{
                text-align: center;
                box-sizing: border-box;
            }
            .wrapper{
                width: 400px;
                margin: 0 auto;
                border: 1px;
                border-style: solid;
            }
            section{
                border: 1px;
                border-style: solid;
                margin: 5px;
                padding: 10px;
            }
        </style>
</head>
<body>
    <div class="wrapper">
        <h1>Bienvenido <?= $user->getUserName() ?></h1>
        <section>
            <div><input type="button" onclick="document.location.href='CargarFactura.php'" value="Cargar Factura" />
        </section>
        <section>
            <div><input type="button" onclick="document.location.href='ListarFacturacion.php'" value="Listar Facutrción"></div>
        </section>
    </div>
</body>
</html>