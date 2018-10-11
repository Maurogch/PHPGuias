<?php
    namespace DAO;

    use Models\Product as Product;

    interface IProductDAO
    {
        function Add(Product $product);
        function GetAll();
        function GetByProductCode($productCode);
        function Delete($productCode);
    }
?>