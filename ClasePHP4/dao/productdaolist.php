<?php
    namespace DAO;
    
    use DAO\IProductDAO as IProductDAO; 
    use Models\Product as Product;

    class ProductDAOList implements IProductDAO
    {
        private $productList;

        public function __construct()
        {
            if(!isset($_SESSION["ProductList"]))
                $_SESSION["ProductList"] = array();
            
            $this->productList = &$_SESSION["ProductList"];
        }

        public function Add(Product $product)
        {
            array_push($this->productList, $product);            
        }

        public function GetAll()
        {
            return $this->productList;
        }

        public function GetByProductCode($productCode)
        {
            $product = null;

            foreach($this->productList as $aux)
            {
                if($aux->getProductCode() == $productCode)
                {
                    $product = $aux;
                    break;
                }
            }

            return $product;
        }

        public function Delete($productCode)
        {
            $i = 0;

            foreach($this->productList as $product)
            {
                if($product->getProductCode() == $productCode)
                {
                    unset($this->productList[$i]);
                    break;
                }

                $i++;
            }

            $this->productList = array_values($this->productList);
        }
    }
?>