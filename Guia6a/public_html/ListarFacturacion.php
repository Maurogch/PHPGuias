<?php
require_once "../Config/autoload.php";

session_start();

if (!isset($_SESSION["userLogged"])) {
    session_destroy;
    header("location:../index.php?code=Error");
}

//var_dump( $_SESSION["billRepository"]);

$billRepository = $_SESSION["billRepository"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de Facturación</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="wrapper">
        <section>

                <?php
for ($i = 0; count($billRepository->GetAll()) > $i; $i++) {
    ?>
                        <table>
                            <tr>
                                <td>Factura Número: <?=$billRepository->GetAll()[$i]->getBillNumber()?></td>
                                <td>Tipo: <?=$billRepository->GetAll()[$i]->getBillType()?></td>
                            </tr>
                            <tr>
                                <td>Nombre: <?=$billRepository->GetAll()[$i]->getFirstName()?> </td>
                                <td>Apellido: <?=$billRepository->GetAll()[$i]->getLastName()?> </td>
                            </tr>
                            <tr>
                                <td>Dni: <?=$billRepository->GetAll()[$i]->getDni()?> </td>
                                <td>Email: <?=$billRepository->GetAll()[$i]->getEmail()?> </td>
                            </tr>
                            <tr>
                                <td>SubTotal: $<?=$billRepository->GetAll()[$i]->SubTotalCost()?> </td>
                                <td>Total: $<?=$billRepository->GetAll()[$i]->TotalCost()?> </td>
                            </tr>
                        </table>
                        <hr>
                <?php
}
?>
        </section>
        <section>
            <div><input type="button" value="Volver al Menú Principal" onclick="document.location.href='../main.php'"></div>
        </section>
    </div>
</body>
</html>