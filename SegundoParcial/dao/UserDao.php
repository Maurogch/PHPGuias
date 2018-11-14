<?php
namespace dao;

use DAO\Connection as Connection;
use DAO\IUserDao as IUserDao;
use Exception as Exception;
use Models\User as User;

class UserDao implements IUserDao
{
    private $connection;
    private $tableName;

    public function __construct()
    {
        $this->connection = Connection::GetInstance();
        $this->tableName = 'users';
    }

    public function getByEmail($email)
    {
        try{
            $user = null;
            $parameters["email"] = $email;

            $query = "SELECT * FROM ".$this->tableName." 
            WHERE email = :email";
            
            $resultSet = $this->connection->Execute($query, $parameters);

            if(sizeof($resultSet)>1){
                throw new Exception(__METHOD__." error: Query returned ".sizeof($resultSet)." result/s, expected 1");
            }

            foreach ($resultSet as $row) {
                $user = new User();

                $user->setUserId($row["userId"]);
                $user->setEmail($row["email"]);
                $user->setPassword($row["password"]);
            }

            return $user;
        }catch (Exception $ex){
            throw new Exception(__METHOD__.": ".$ex->getMessage());
        }
    }
}