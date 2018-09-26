<?php

session_start();

if (!isset($_SESSION["userLogged"])) {
    session_destroy();
    header("location:../index.php?code=Error");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carga de Factura</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="wrapper">
        <section>
            <div id="cabecera-factura">Carga de Factura</div>
            <form action="CargaItemsFactura.php" method="post">
                <table>
                    <tr>
                        <td>Nombre: <input type="text" name="nombre" required></td>
                        <td>Apellido: <input type="text" name="apellido" required></td>
                    </tr>
                    <tr>
                        <td>DNI: <input type="number" min="5000000" max="99999999" name="DNI" required></td>
                        <td>Email: <input type="email" name="email" required></td>
                    </tr>
                    <tr>
                        <td colspan="2">Fecha de Nacimiento: <input type="date" name="fechaNacimiento" required></td>
                    </tr>
                    <tr>
                        <td>Factura A <input type="radio" name="tipoFactura" value="a" checked> </td>
                        <td>Factura B <input type="radio" name="tipoFactura" value="b" ></td>
                    </tr>
                </table>
                <div><input type="submit" value="Cargar Datos"></div>
            </form>
        </section>
    </div>
</body>
</html>
