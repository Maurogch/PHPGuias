<?php
namespace DAO;

use DAO\Connection as Connection;
use DAO\IProductDao as IProductDao;
use Models\Product as Product;
use Models\Category as Category;
use Exception as Exception;

class ProductDao implements IProductDao
{
    private $connection;
    private $tableName;
    private $tableNameCat;

    public function __construct()
    {
        $this->connection = Connection::GetInstance();
        $this->tableName = 'Products';
        $this->tableNameCat = 'Categories';
    }

    public function add(Product $product)
    {
        try{
            $parameters["productName"] = $product->getProductName();
            $parameters["stock"] = $product->getStock();
            $parameters["price"] = $product->getPrice();
            $parameters["idCategory"] = $product->getCategory()->getIdCategory();

            $query = "INSERT INTO ".$this->tableName." (productName,stock,price,idCategory) 
            VALUES (:productName,:stock,:price,:idCategory)";

            $addedRows = $this->connection->executeNonQuery($query,$parameters);

            if($addedRows!=1){
                throw new Exception ("Number of rows added ".$addedRows.", expected 1");
            }
        }catch(Exception $ex){
            throw new Exception(__METHOD__.": ".$ex->getMessage());
        }
    }

    public function getById($idProduct)
    {
        try{
            $parameters["idProduct"] = $idProduct;
            $product = null;

            $query = "SELECT * FROM ".$this->tableName." P
            INNER JOIN ".$this->tableNameCat." C
            ON P.idCategory = C.idCategory 
            WHERE idProduct = :idProduct";

            $resultSet = $this->connection->Execute($query);

            if(sizeof($resultSet)!=1){
                throw new Exception(__METHOD__." error: Query returned ".sizeof($resultSet)." result/s, expected 1");
            }

            foreach ($resultSet as $row) {
                $product = new Product();

                $product->setIdProduct($row["idProduct"]);
                $product->setProductName($row["productName"]);
                $product->setStock($row["stock"]);
                $product->setPrice($row["price"]);

                $category = new Category();

                $category->setIdCategory($row["idCategory"]);
                $category->setCategoryName($row["categoryName"]);

                $product->setCategory($category);
            }

            return $product;
        }catch(Exception $ex){
            throw new Exception(__METHOD__.": ".$ex->getMessage());
        }
    }

    public function getByName($productName)
    {
        try{
            $parameters["productName"] = $productName;
            $product = null;

            $query = "SELECT * FROM ".$this->tableName." P
            INNER JOIN ".$this->tableNameCat." C
            ON P.idCategory = C.idCategory 
            WHERE productName = :productName";

            $resultSet = $this->connection->Execute($query,$parameters);

            if(sizeof($resultSet)>1){
                throw new Exception(__METHOD__." error: Query returned ".sizeof($resultSet)." result/s, expected 1");
            }

            foreach ($resultSet as $row) {
                $product = new Product();

                $product->setIdProduct($row["idProduct"]);
                $product->setProductName($row["productName"]);
                $product->setStock($row["stock"]);
                $product->setPrice($row["price"]);

                $category = new Category();

                $category->setIdCategory($row["idCategory"]);
                $category->setCategoryName($row["categoryName"]);

                $product->setCategory($category);
            }

            return $product;
        }catch(Exception $ex){
            throw new Exception(__METHOD__.": ".$ex->getMessage());
        }
    }

    public function getAll()
    {
        try{
            $productList = array();

            $query = "SELECT * FROM ".$this->tableName." P
            INNER JOIN ".$this->tableNameCat." C
            ON P.idCategory = C.idCategory";

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row) {
                $product = new Product();

                $product->setIdProduct($row["idProduct"]);
                $product->setProductName($row["productName"]);
                $product->setStock($row["stock"]);
                $product->setPrice($row["price"]);

                $category = new Category();

                $category->setIdCategory($row["idCategory"]);
                $category->setCategoryName($row["categoryName"]);

                $product->setCategory($category);

                $productList[] = $product;
            }

            return $productList;
        }catch(Exception $ex){
            throw new Exception(__METHOD__.": ".$ex->getMessage());
        }
    }

    public function delete($idProduct)
    {
        try{
            $parameters["idProduct"] = $idProduct;

            $query = "DELETE FROM ".$this->tableName." 
            WHERE idProduct = :idProduct";

            $this->connection->executeNonQuery($query,$parameters);
        }catch(Exception $ex){
            throw new Exception(__METHOD__.": ".$ex->getMessage());
        }
    }
}