<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'Config\Autoload.php';

use Config\Autoload as Autoload;

Autoload::Start();

//There should be a userLogged check here

if ($_POST) {
    session_start();

    $productRepository = $_SESSION["productRepository"];
    $productCode = isset($_POST["productCode"]) ? $_POST["productCode"] : "";

    if ($productRepository->Delete($productCode)) {
        echo "<script> alert('Producto borrado exitosamente!');
            window.location = 'product-list.php'; </script>";
    } else {
        echo "<script> alert('Codigo de producto no encontrado!');
            window.location = 'product-list.php'; </script>";
    }
} else {
    header("location:product-list.php");
}
