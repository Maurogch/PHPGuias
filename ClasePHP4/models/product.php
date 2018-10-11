<?php
    namespace Models;

    class Product
    {
        private $productCode;
        private $name;
        private $cost;
        private $price;
        private $stock;

        public function getProductCode()
        {
            return $this->productCode;
        }

        public function setProductCode($productCode)
        {
            $this->productCode = $productCode;
        }

        public function getName()
        {
            return $this->name;
        }

        public function setName($name)
        {
            $this->name = $name;
        }

        public function getCost()
        {
            return $this->cost;
        }

        public function setCost($cost)
        {
            $this->cost = $cost;
        }

        public function getPrice()
        {
            return $this->price;
        }

        public function setPrice($price)
        {
            $this->price = $price;
        }

        public function getStock()
        {
            return $this->stock;
        }

        public function setStock($stock)
        {
            $this->stock = $stock;
        }
    }
?>