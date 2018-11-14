<?php
namespace dao;

use DAO\Connection as Connection;
use DAO\ICategoryDao as ICategoryDao;
use Exception as Exception;
use Models\Category as Category;

class CategoryDao
{
    private $connection;
    private $tableName;

    public function __construct()
    {
        $this->connection = Connection::GetInstance();
        $this->tableName = 'Categories';
    }

    public function getById($categoryId)
    {
        try{
            $category = null;
            $parameters["categoryId"] = $categoryId;

            $query = "SELECT * FROM ".$this->tableName." 
            WHERE categoryId = :categoryId
            AND isActive = 1";
            
            $resultSet = $this->connection->Execute($query, $parameters);

            if(sizeof($resultSet)>1){
                throw new Exception(__METHOD__." error: Query returned ".sizeof($resultSet)." result/s, expected 1");
            }

            foreach ($resultSet as $row) {
                $category = new Category();

                $category->setCategoryId($row["categoryId"]);
                $category->setDescription($row["description"]);
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
            
            $query = "SELECT * FROM ".$this->tableName." 
            WHERE isActive = 1";
            
            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row) {
                $category = new Category();

                $category->setCategoryId($row["categoryId"]);
                $category->setDescription($row["description"]);
                
                $categoryList[] = $category;
            }

            return $categoryList;
        }catch (Exception $ex){
            throw new Exception(__METHOD__.": ".$ex->getMessage());
        }
    }
}