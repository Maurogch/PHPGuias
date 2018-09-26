<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'Config\Autoload.php';

use Config\Autoload as Autoload;
use Model\User as User;
use Model\Product as Product;
use Repository\ProductRepository as ProductRepository;

Autoload::Start();

//session_start();

$user = new User();

$user->setEmail("aa")->setPassword("dd");

//var_dump($user);

$product = new Product();
$product2 = new Product();
$product3 = new Product();

$product->setName("name")->setCost(12)->setPrice(32)->setStock(32)->setProductCode(123);
$product2->setName("name2")->setCost(122)->setPrice(322)->setStock(322)->setProductCode(1235);
$product3->setName("name2")->setCost(122)->setPrice(322)->setStock(322)->setProductCode(123);

//var_dump($product);

$productRepository = new ProductRepository();

$productRepository->Add($product);
$productRepository->Add($product2);
$productRepository->Add($product3);

var_dump($productRepository);