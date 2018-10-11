<?php
    namespace DAO;
    
    use DAO\IProductDAO as IProductDAO;
    use Models\Product as Product;
    use \Exception as Exception;
    use DAO\Connection as Connection;

    class ProductDAOPDO implements IProductDAO
    {
        private $connection;
        private $tableName = "products";

        public function Add(Product $product)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (productCode, name, cost, price, stock) VALUES (:productCode, :name, :cost, :price, :stock);";
                
                $parameters["productCode"] = $product->getProductCode();
                $parameters["name"] = $product->getName();
                $parameters["cost"] = $product->getCost();
                $parameters["price"] = $product->getPrice();
                $parameters["stock"] = $product->getStock();

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetAll()
        {
            try
            {
                $productList = array();

                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $product = new Product();
                    $product->setProductCode($row["productCode"]);
                    $product->setName($row["name"]);
                    $product->setCost($row["cost"]);
                    $product->setPrice($row["price"]);
                    $product->setStock($row["stock"]);

                    array_push($productList, $product);
                }

                return $productList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetByProductCode($productCode)
        {
            try
            {
                $product = null;

                $query = "SELECT * FROM ".$this->tableName." WHERE productCode = :productCode";

                $parameters["productCode"] = $productCode;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query, $parameters);
                
                foreach ($resultSet as $row)
                {
                    $product = new Product();
                    $product->setProductCode($row["productCode"]);
                    $product->setName($row["name"]);
                    $product->setCost($row["cost"]);
                    $product->setPrice($row["price"]);
                    $product->setStock($row["stock"]);
                }
                            
                return $product;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function Delete($productCode)
        {
            try
            {
                $query = "DELETE FROM ".$this->tableName." WHERE productCode = :productCode";
            
                $parameters["productCode"] = $productCode;

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);   
            }
            catch(Exception $ex)
            {
                throw $ex;
            }            
        }
    }
?>