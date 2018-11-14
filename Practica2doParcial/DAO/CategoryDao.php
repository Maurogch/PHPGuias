<?php
namespace DAO;

use DAO\Connection as Connection;
use DAO\ICategoryDao as ICategoryDao;
use Exception as Exception;
use Models\Category as Category;

class CategoryDao implements ICategoryDao
{
    private $connection;
    private $tableName;

    public function __construct()
    {
        $this->connection = Connection::GetInstance();
        $this->tableName = 'Categories';
    }

    public function add(Category $category)
    {
        try{
            $parameters["categoryName"] = $category->getCategoryName();

            $query = "INSERT INTO ".$this->tableName." (categoryName) 
            VALUES (:categoryName)";

            $addedRows = $this->connection->executeNonQuery($query, $parameters);
            if($addedRows!=1){
                throw new Exception("Number of rows added ".$addedRows.", expected 1");
            }
        }catch (Exception $ex){
            throw new Exception(__METHOD__.": ".$ex->getMessage());
        }
    }

    public function getById($idCategory)
    {
        try{
            $category = null;
            $parameters["idCategory"] = $idCategory;

            $query = "SELECT * FROM ".$this->tableName." 
            WHERE idCategory = :idCategory";
            
            $resultSet = $this->connection->Execute($query, $parameters);

            if(sizeof($resultSet)!=1){
                throw new Exception(__METHOD__." error: Query returned ".sizeof($resultSet)." result/s, expected 1");
            }

            foreach ($resultSet as $row) {
                $category = new Category();

                $category->setIdCategory($row["idCategory"]);
                $category->setCategoryName($row["categoryName"]);
            }

            return $category;
        }catch (Exception $ex){
            throw new Exception(__METHOD__.": ".$ex->getMessage());
        }
    }

    public function getByName($categoryName)
    {
        try{
            $category = null;
            $parameters["categoryName"] = $categoryName;

            $query = "SELECT * FROM ".$this->tableName." 
            WHERE categoryName = :categoryName";
            
            $resultSet = $this->connection->Execute($query, $parameters);

            if(sizeof($resultSet)>1){
                throw new Exception(__METHOD__." error: Query returned ".sizeof($resultSet)." result/s, expected 1");
            }

            foreach ($resultSet as $row) {
                $category = new Category();

                $category->setIdCategory($row["idCategory"]);
                $category->setCategoryName($row["categoryName"]);
            }

            return $category;
        }catch (Exception $ex){
            throw new Exception(__METHOD__.": ".$ex->getMessage());
        }
    }

    public function getAll()
    {
        try{
            $categoryList= array();

            $query = "SELECT * FROM ".$this->tableName;
            
            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row) {
                $category = new Category();

                $category->setIdCategory($row["idCategory"]);
                $category->setCategoryName($row["categoryName"]);

                $categoryList[] = $category;
            }

            return $categoryList;
        }catch (Exception $ex){
            throw new Exception(__METHOD__.": ".$ex->getMessage());
        }
    }

    public function delete($idCategory)
    {
        try{
            $parameters["idCategory"] = $idCategory;

            $query = "DELETE FROM ".$this->tableName. "
            WHERE idCategory = :idCategory";

            $this->connection->executeNonQuery($query,$parameters);
        }catch (Exception $ex){
            throw new Exception(__METHOD__.": ".$ex->getMessage());
        }
    }
}