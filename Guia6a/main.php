<?php
require_once "Config/autoload.php";

use Model\User as User;

session_start();

if (!isset($_SESSION["userLogged"])) {
    session_destroy();
    header("location:index.php?code=Error");
} else {
    $user = $_SESSION["userLogged"];
}

if (isset($_SESSION["bill"])) //set bill to null if there's data in it from previous bill load
{
    $_SESSION["bill"] = null;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menú</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">
        <h1>Bienvenido <?=$user->getUserName()?></h1>
        <section>
            <div><input type="button" onclick="document.location.href='public_html/CargarFactura.php'" value="Cargar Factura" />
        </section>
        <section>
            <div><input type="button" onclick="document.location.href='public_html/ListarFacturacion.php'" value="Listar Facutrción"></div>
        </section>
        <section>
            <div><input type="button" value="Logout" onclick="document.location.href='logout.php'"></div>
        </section>
    </div>
</body>
</html>