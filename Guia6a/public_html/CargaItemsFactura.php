<?php
require_once "../Config/autoload.php";

use Model\Bill as Bill;
use Model\Product as Product;

session_start();

if (!isset($_SESSION["userLogged"])) {
    session_destroy();
    header("location:../index.php?code=Error");
}

$bill = new Bill();

if (!isset($_SESSION["bill"])) {
    $bill->setFirstName(isset($_POST["nombre"]) ? $_POST["nombre"] : "");
    $bill->setLastName(isset($_POST["apellido"]) ? $_POST["apellido"] : "");
    $bill->setDni(isset($_POST["DNI"]) ? $_POST["DNI"] : "");
    $bill->setEmail(isset($_POST["email"]) ? $_POST["email"] : "");
    $bill->setDateBirth(isset($_POST["fechaNacimiento"]) ? $_POST["fechaNacimiento"] : "");
    $bill->setBillType(isset($_POST["tipoFactura"]) ? $_POST["tipoFactura"] : "");
    $bill->setBillNumber(count($_SESSION["billRepository"]->GetAll()) + 1);
} else {
    $bill = $_SESSION["bill"];
}

if (isset($_POST["nombreProducto"])) {
    $product = new Product();

    $product->setName(isset($_POST["nombreProducto"]) ? $_POST["nombreProducto"] : "");
    $product->setQuantity(isset($_POST["cantidadProducto"]) ? $_POST["cantidadProducto"] : "");
    $product->setPrice(isset($_POST["precioProducto"]) ? $_POST["precioProducto"] : "");

    $bill->AddProduct($product);
}

$_SESSION["bill"] = $bill;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carga de Items de Factura</title>
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
            <div id="cabecera-factura">Carga de Item</div>
            <form action="" method="post">
                <table>
                    <tr>
                        <td>Nombre: <input type="text" name="nombreProducto" required></td>
                        <td>Cantidad: <input type="number" name="cantidadProducto" required></td>
                        <td>Precio: <input type="number" name="precioProducto" required></td>
                    </tr>
                </table>
                <div><input type="submit" value="Cargar Item"></div>
            </form>
        </section>
        <section>
            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Subtotal</th>
                    <th>Total</th>
                </tr>
                <?php
for ($i = 0; $i < count($bill->getProductList()); $i++) {
    ?>
                    <tr>
                        <td><input type="text" value="<?=$bill->getProductList()[$i]->getName()?>" style="width:350px"></td>
                        <td><input type="number" value="<?=$bill->getProductList()[$i]->getQuantity()?>" style="width:60px"></td>
                        <td>$<input type="text" value="<?=$bill->getProductList()[$i]->getPrice()?>" style="width:60px" step="any"></td>
                        <td>$<input type="number" value="<?=$bill->getProductList()[$i]->getSubTotal()?>" style="width:60px" step="any"></td>
                        <td>$<input type="number" value="<?=$bill->getProductList()[$i]->getTotal()?>" style="width:60px" step="any"></td>
                    </tr>
                <?php
}
?>
            </table>
        </section>
        <section>
            <table>
                <td>SubTotal $<input type="number" name="subtotal" value="<?=$bill->SubTotalCost()?>" readonly></td>
                <td>Total $<input type="number" name="total" value="<?=$bill->TotalCost()?>" readonly></td>
            </table>
        </section>
        <section>
            <div>
                <input type="button" value="Cancelar" onclick="document.location.href='../main.php'">
                <input type="button" value="Guardar" onclick="document.location.href='ProcesamientoFactura.php'">
            </div>
        </section>
    </div>
</body>
</html>