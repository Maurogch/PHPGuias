<?php
namespace dao;

use DAO\Connection as Connection;
use DAO\IClientDao as IClientDao;
use Exception as Exception;
use Models\Client as Client;
use Models\Category as Category;
use dao\querytype as querytype;

class ClientDao implements IClientDao
{
    private $connection;
    private $tableName;
    private $tableNameCat;

    public function __construct()
    {
        $this->connection = Connection::GetInstance();
        $this->tableName = 'clients';
        $this->tableNameCat = 'categories';
    }

    public function add(Client $client)
    {
        try{
            $parameters["categoryId"] = $client->getCategory()->getCategoryId();
            $parameters["lastName"] = $client->getLastName();
            $parameters["firstName"] = $client->getFirstName();
            $parameters["dni"] = $client->getDni();
            $parameters["email"] = $client->getEmail();
            $parameters["address"] = $client->getAddress();

            $query = "CALL Clients_Add(?,?,?,?,?,?)";

            $addedRows = $this->connection->executeNonQuery($query,$parameters, querytype::StoredProcedure);

            if($addedRows!=1){
                throw new Exception ("Number of rows added ".$addedRows.", expected 1");
            }
        }catch(Exception $ex){
            throw new Exception(__METHOD__.": ".$ex->getMessage());
        }
    }

    public function getByDni($dni)
    {
        try{
            $client = null;
            $parameters["dni"] = $dni;

            $query = "SELECT * FROM ".$this->tableName." CL
            INNER JOIN ".$this->tableNameCat." CA
            ON CL.categoryId = CA.categoryId
            WHERE CL.dni = :dni";
            
            $resultSet = $this->connection->Execute($query, $parameters);

            if(sizeof($resultSet)>1){
                throw new Exception(__METHOD__." error: Query returned ".sizeof($resultSet)." result/s, expected 1");
            }

            foreach ($resultSet as $row) {
                $client = new Client();

                $client->setClientId($row["clientId"]);
                $client->setLastName($row["lastName"]);
                $client->setFirstName($row["firstName"]);
                $client->setDni($row["dni"]);
                $client->setEmail($row["email"]);
                $client->setAddress($row["address"]);
                
                $category = new Category();

                $category->setCategoryId($row["categoryId"]);
                $category->setDescription($row["description"]);
                
                $client->setCategory($category);
            }

            return $client;
        }catch (Exception $ex){
            throw new Exception(__METHOD__.": ".$ex->getMessage());
        }
    }

    public function getAll()
    {
        try{
            $clientList = array();;

            $query = "SELECT * FROM ".$this->tableName." CL
            INNER JOIN ".$this->tableNameCat." CA
            ON CL.categoryId = CA.categoryId";
            
            $resultSet = $this->connection->Execute($query);
            
            foreach ($resultSet as $row) {
                $client = new Client();

                $client->setClientId($row["clientId"]);
                $client->setLastName($row["lastName"]);
                $client->setFirstName($row["firstName"]);
                $client->setDni($row["dni"]);
                $client->setEmail($row["email"]);
                $client->setAddress($row["address"]);
                
                $category = new Category();

                $category->setCategoryId($row["categoryId"]);
                $category->setDescription($row["description"]);
                
                $client->setCategory($category);
                
                $clientList[] = $client;
            }

            return $clientList;
        }catch (Exception $ex){
            throw new Exception(__METHOD__.": ".$ex->getMessage());
        }
    }

    public function delete($dni)
    {
        try{
            $parameters["dni"] = $dni;

            $query = "DELETE FROM ".$this->tableName. "
            WHERE dni = :dni";

            $deletedRows = $this->connection->executeNonQuery($query,$parameters);

            if($deletedRows>1)
            {
                throw new Exception(__METHOD__." error: Query deleted ".deletedRows." rows, expected 1 or 0");
            }

            return $deletedRows;
        }catch (Exception $ex){
            throw new Exception(__METHOD__.": ".$ex->getMessage());
        }
    }
}