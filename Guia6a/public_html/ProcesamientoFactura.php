<?php
require_once "../Config/autoload.php";

use Model\Bill as Bill;

session_start();

if (!isset($_SESSION["userLogged"])) {
    session_destroy();
    header("location:../index.php?code=Error");
}

$bill = new Bill();

$bill = $_SESSION["bill"];

$_SESSION["billRepository"]->Add($_SESSION["bill"]);

//var_dump($_SESSION["billRepository"]->GetAll());

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Procesamiento de Factura</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="wrapper">
    <section>
            <div id="cabecera-factura">Factura</div>
            <table>
                <tr>
                    <td>Nombre: <input type="text" name="nombre" value=" <?=$bill->getFirstName()?>" disabled></td>
                    <td>Apellido: <input type="text" name="apellido" value=" <?=$bill->getLastName()?>" disabled></td>
                </tr>
                <tr>
                    <td>DNI: <input type="text" name="DNI" value=" <?=$bill->getDni()?>" disabled></td>
                    <td>Email: <input type="text" name="email" value="<?=$bill->getEmail()?>" disabled></td>
                </tr>
                <tr>
                    <td>Fecha de Nacimiento: <input type="text" name="fechaNacimiento" value=" <?=$bill->getDateBirth()?>" disabled></td>
                    <td>Numero de factura: <input type="text" name="numeroFactura" value=" <?=$bill->getBillNumber()?>" disabled></td>
                </tr>
                <tr>
                    <td>Factura A <input type="radio" name="tipoFactura" <?php if ($bill->getBillType() == "a") {
    echo "checked";
}
?> disabled></td>
                    <td>Factura B <input type="radio" name="tipoFactura" <?php if ($bill->getBillType() == "b") {
    echo "checked";
}
?> disabled></td>
                </tr>
            </table>
        </section>
        <section>
            <table>
                <td>SubTotal $<input type="number" name="subtotal" value="<?=$bill->SubTotalCost()?>" readonly></td>
                <td>Total $<input type="number" name="total" value="<?=$bill->TotalCost()?>" readonly></td>
            </table>
        </section>
        <section>
            <h1>Factura agregada exitosamente</h1>
        </section>
        <section>
            <div><input type="button" value="Volver al menú principal" onclick="document.location.href='../main.php'"></div>
        </section>
    </div>
</body>
</html>