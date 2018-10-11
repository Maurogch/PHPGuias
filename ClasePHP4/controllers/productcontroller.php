<?php
    namespace Controllers;

    use DAO\ProductDAOList as ProductDAOList;
    use Models\Product as Product;

    class ProductController
    {
        private $productDAO;
        
        public function __construct()
        { 
            $this->productDAO = new ProductDAOList();
        }

        public function ShowAddView($message = "")
        {
            require_once(VIEWS_PATH."product-add.php");
        }

        public function ShowListView()
        {
            $productList = $this->productDAO->GetAll();
            
            require_once(VIEWS_PATH."product-list.php");
        }

        public function Add($productCode, $name, $cost, $price, $stock)
        {
            $product = new Product();
            $product->setProductCode($productCode);
            $product->setName($name);
            $product->setCost($cost);
            $product->setPrice($price);
            $product->setStock($stock);

            if($this->productDAO->GetByProductCode($product->getProductCode()) == null)
            {
                $this->productDAO->Add($product);
                $message = "Producto agregado con éxito";
            }
            else
                $message = "Ya existe el Producto";

            $this->ShowAddView($message);            
        }

        public function Delete($productCode)
        {
            $this->productDAO->Delete($productCode);

            $this->ShowListView();
        }
    }
?>