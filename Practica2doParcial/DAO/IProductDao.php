<?php
namespace DAO;

use Models\Product as Product;

interface IProductDao
{
    public function add(Product $product);
    public function getById($idProduct);
    public function getByName($productName);
    public function getAll();
    public function delete($idProduct);
}