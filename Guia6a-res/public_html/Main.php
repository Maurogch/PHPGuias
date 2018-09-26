<?php namespace public_html;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('..\Config\Autoload.php');

use Config\Autoload as Autoload;
use Model\User as User;
use Repository\BillRepository as BillRepository;

Autoload::Start();

session_start();

if(!$_POST)
{
    if(isset($_SESSION['userLogged']) && !empty($_SESSION['userLogged']))
    {
        $userLogged = $_SESSION['userLogged'];
    }
    else
    {
        echo "<script> if(confirm('Debes iniciar session. Adios!'));";  
        echo "window.location = '../index.php'; </script>";
    }
}
else
{
    session_destroy();

    echo "<script> if(confirm('Acaba de Cerrar Sesion. Adios!'));";  
    echo "window.location = '../index.php'; </script>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Menu Principal</title>
    <link rel="stylesheet" type="text/css" media="screen" href="../Styles/style.css" />
</head>
<body>
<div align="center" style="margin-top: 10%;">
        <label class="labelTitle">Menu Principal</label>
        <p>
            <div class="divMain">
                <button name="btnAddBill" style="background-color: indianred;" onclick="window.location.href='NewBillHeader.php'">
                AGREGAR NUEVA FACTURA</button>
                <br>
                <button name="btnAddBill" style="background-color: indianred;" onclick="window.location.href='BillList.php'" >
                LISTAR FACTURAS</button>
                <p>
                <form action="" method="post" style="max-width: 70%;">
                    <button type="submit" name="btnAddBill" value="Close">CERRAR SESION</button>
                </form>
                </p>
            </div>
        </p>
    </div>
</body>
</html>