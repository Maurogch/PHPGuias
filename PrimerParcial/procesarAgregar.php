<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'Config\Autoload.php';

use Config\Autoload as Autoload;
use Model\Product as Product;

Autoload::Start();

//There should be a userLogged check here

if ($_POST) {
    session_start();

    $productRepository = $_SESSION["productRepository"];

    $productCode = isset($_POST["productCode"]) ? $_POST["productCode"] : "";
    $name = isset($_POST["name"]) ? $_POST["name"] : "";
    $cost = isset($_POST["cost"]) ? $_POST["cost"] : "";
    $price = isset($_POST["price"]) ? $_POST["price"] : "";
    $stock = isset($_POST["stock"]) ? $_POST["stock"] : "";

    $product = new Product();

    $product->setProductCode($productCode)->setName($name)->setCost($cost)->setPrice($price)->setStock($stock);

    if ($productRepository->Add($product)) {
        echo "<script> alert('Producto agregado exitosamente!');
            window.location = 'product-add.php'; </script>";
    } else {
        echo "<script> alert('Codigo de producto ya existe!');
            window.location = 'product-add.php'; </script>";
    }
} else {
    header("location:product-list.php");
}
